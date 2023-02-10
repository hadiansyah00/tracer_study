<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_payment');
        $this->load->model('Main_model');
    }

    public function index()
    {
        $data['title'] = 'PMB | STIKes Bogor Husada';
        $data['menu'] = 'Daftar PMB';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $this->db->order_by('nama', 'asc');
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pmb.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'required' => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth');
            $this->load->view('frontend/ppdb/ppdb', $data);
        } else {
            $tgl = date('Y-m-d');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            //Buat ID DAFTAR
            $query = $this->db->order_by('id', 'DESC')->limit(1)->get('pmb');
            if ($query->num_rows() !== 0) {
                $data1 = $query->row_array();
                $nodaftar = $data1['id'] + 1;
            } else {
                $nodaftar = 1;
            }
            $nodaftarmax = str_pad($nodaftar, 5, "0", STR_PAD_LEFT);
            $nodaftarjadi = 'MHS' . $nodaftarmax;

            $ta = $this->Main_model->getAktif()->result();
            foreach ($ta as $t) :
                $a = $t->id_ta;
            endforeach;

            $data = [
                'no_daftar' => $nodaftarjadi,
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $this->input->post('no_hp'),
                'id_ta' => $a,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date_created' => $tgl,
                'status' => '0',
                'is_active' => '0'
            ];
            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $query = $this->_sendEmail($token, 'verify');
            $query = $this->db->insert('siswa_token', $user_token);
            $query =  $this->db->insert('pmb', $data);
            $sess = [
                'email' => $email,
                // 'nik' => $this->input->post('nik')
            ];
            $this->session->set_userdata($sess);
            if ($query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cek Emaill!</strong> Data pendaftaran kamu berhasil dikirim!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pmb/login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Gagal Simpan Data!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pmb');
            }
            redirect('pmb/login');
        }
    }
    private function _sendEmail($token, $type)
    {
        $nama = $this->input->post('nama');
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
            'smtp_user' => 'admin_workspace@sbh.ac.id',  // Email gmail admin aplikasi
            'smtp_pass'   => 'pbiksimkrbtwwhfe',  // Password Gmail atau Sandi Aplikasi Gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"

        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('admin_workspace@sbh.ac.id', 'STIKes Bogor Husada');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verfikasi Akun');
            $this->email->message(' Konfirmasi Aktivasi Akun anda ' 
             . $nama . ': <a href="' . base_url() . 'pmb/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktivasi AKun </a> 
            <br> ');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password  ' . $nama . ': <a href="' . base_url() . 'pmb/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('pmb', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('siswa_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('pmb');
                    $this->db->delete('siswa_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah Sukses ! Silahkan login.</div>');
                    redirect('pmb/login');
                } else {
                    $this->db->delete('pmb', ['email' => $email]);
                    $this->db->delete('siswa_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal! Token Kadaluarsa.</div>');
                    redirect('pmb');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal!  Tokden salah</div>');
                redirect('pmb');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal!  Email salah.</div>');
            redirect('pmb');
        }
    }

    public function login()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('ppdb/login');
        // }
        $this->load->model('Auth_model', 'auth');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['menu'] = 'home';
            $data['web'] =  $this->db->get('website')->row_array();
            $data['home'] =  $this->db->get('home')->row_array();
            $this->load->view('template/auth');
            $this->load->view('frontend/ppdb/ppdb_login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $is_aktif = $this->input->post('is_active');
        $user = $this->db->get_where('pmb', ['email' => $email])->row_array();
        // jika usernya ada
        if ($user) {

            // cek password
            if ($user['is_active'] != 1) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Akun Anda belum Terverfikasi!</strong> Silahkan Cek Email Anda! :)
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>',
                    false
                );
                redirect('pmb/login');
            }

            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'nik' => $user['nik']
                ];
                $this->session->set_userdata($data);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Susccess!</strong> Anda berhasil login! :)
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('pmb/dashboard');
            } else {

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Email tidak terdaftar!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>'
                );
                redirect('pmb/login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Password salah!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 </div>'
            );
            redirect('pmb/login');
        }
    }
    public function register()
    {
        $users = $this->session->userdata('email');
        $user = $this->db->get_where('pmb', ['email' => $users])->num_rows();
        if (!empty($user)) {
            redirect('pmb/dashboard');
        }
        $data['menu'] = 'home';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $this->db->order_by('nama', 'asc');
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();


        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[pmb.nik]', [
            'is_unique' => 'Nik ini sudah terdaftar!',
            'required' => 'Nik tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[pmb.nis]', [
            'is_unique' => 'Nis ini sudah terdaftar!',
            'required' => 'Nis tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pmb.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'required' => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        $this->form_validation->set_rules('kab', 'Kota', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kel', 'Kelurahan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama ibu', 'required');
        $this->form_validation->set_rules('pek_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('pek_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('peng_ortu', 'Penghasilan Ortu', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('thn_msk', 'Tahun Masuk', 'required');
        $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('thn_lls', 'Tahun Lulus', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/header', $data);
            $this->load->view('frontend/ppdb/ppdb', $data);
            $this->load->view('frontend/footer', $data);
        } else {

            $tgl = date('Y-m-d');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $id_prov = $this->input->post('prov');
            $id_pend = $this->input->post('pendidikan');

            $provinsi =  $data['prov'] = $this->db->get_where('provinsi', ['id_prov' => $id_prov])->row_array();
            $pend = $this->db->get_where('data_pendidikan', ['id' => $id_pend])->row_array();

            $majrs = $this->input->post('jurusan');
            if (isset($majrs)) {
                if ($pend['majors'] == 1) {
                    $majors = $this->input->post('jurusan');
                } elseif ($pend['majors'] == 0) {
                    $majors = '';
                }
            } else {
                $majors = '';
            }


            //Buat ID DAFTAR
            $query = $this->db->order_by('id', 'DESC')->limit(1)->get('pmb');
            if ($query->num_rows() !== 0) {
                $data1 = $query->row_array();
                $nodaftar = $data1['id'] + 1;
            } else {
                $nodaftar = 1;
            }
            $nodaftarmax = str_pad($nodaftar, 5, "0", STR_PAD_LEFT);
            $nodaftarjadi = 'SIS' . $nodaftarmax;

            //GAMBAR
            $config['upload_path'] = './assets/img/data/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8048';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_siswa')) {
                $img_siswa  = $this->upload->data('file_name');
            } else {
                $img_siswa  = '';
            }
            if ($this->upload->do_upload('img_kk')) {
                $img_kk  = $this->upload->data('file_name');
            } else {
                $img_kk  = '';
            }
            if ($this->upload->do_upload('img_ijazah')) {
                $img_ijazah  = $this->upload->data('file_name');
            } else {
                $img_ijazah  = '';
            }
            if ($this->upload->do_upload('img_ktp')) {
                $img_ktp  = $this->upload->data('file_name');
            } else {
                $img_ktp  = '';
            }
            $kab = $this->db->get_where('kabupaten', ['id_kab' => $this->input->post('kab')])->row_array();
            $kec = $this->db->get_where('kecamatan', ['id_kec' => $this->input->post('kec')])->row_array();
            $kel = $this->db->get_where('kelurahan', ['id_kel' => $this->input->post('kel')])->row_array();

            $data = [
                'no_daftar' => $nodaftarjadi,
                'nik' => $this->input->post('nik'),
                'nis' => $this->input->post('nis'),
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $this->input->post('no_hp'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jk' => $this->input->post('jk'),
                'ttl' => $this->input->post('ttl'),
                'prov' => $provinsi['nama'],
                'kab' => $kab['nama_kab'],
                'kec' => $kec['nama'],
                'kel' => $kel['nama'],
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pek_ayah' => $this->input->post('pek_ayah'),
                'pek_ibu' => $this->input->post('pek_ibu'),
                'nama_wali' => $this->input->post('nama_wali'),
                'pek_wali' => $this->input->post('pek_wali'),
                'peng_ortu' => $this->input->post('peng_ortu'),
                'no_telp' => $this->input->post('no_telp'),
                'thn_msk'       => $this->input->post('thn_msk'),
                'sekolah_asal'  => $this->input->post('sekolah_asal'),
                'kelas'         => $this->input->post('kelas'),
                'thn_lls'         => $this->input->post('thn_lls'),
                'id_pend'       => $id_pend,
                'id_majors'     => $majors,
                'img_siswa' => $img_siswa,
                'img_kk' => $img_kk,
                'img_ijazah' => $img_ijazah,
                'img_ktp' => $img_ktp,
                'date_created' => $tgl,
                'kode_reff' => $this->input->post('reff'),
                'status' => '0'
            ];

            $this->db->insert('pmb', $data);

            $sess = [
                'email' => $email,
                'nik' => $this->input->post('nik')
            ];
            $this->session->set_userdata($sess);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data pendaftaran kamu berhasil dikirim!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('pmb/dashboard');
        }
    }
    public function biodata()
    {
       
        $users = $this->session->userdata('email');

        $user = $this->db->get_where('pmb', ['email' => $users])->num_rows();

        if (empty($user)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('pmb/login');
        }
        $data['title'] = 'Biodata';
        $data['biodata'] = 'biodata';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $data['user'] = $this->db->get_where('pmb', ['email' => $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->db->get('data_pembayaran')->result_array();
        $this->db->order_by('nama', 'asc');
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['kusioner'] = $this->db->get('data_kusioner')->result_array();
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('nik', 'NIK', 'required');
        // $this->form_validation->set_rules('nis', 'NISN', 'required');
        // $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        // $this->form_validation->set_rules('ttl', 'Tempat Lahir', 'required');
        // $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        // $this->form_validation->set_rules('kab', 'Alamat', 'required');
        // $this->form_validation->set_rules('kec', 'Alamat', 'required');
        // $this->form_validation->set_rules('kel', 'Alamat', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('nama_ayah', 'Namah Ayah', 'required');
        // $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        // $this->form_validation->set_rules('pek_ayah', 'Pekerjeaan Ayah', 'required');
        // $this->form_validation->set_rules('pek_ibu', 'Pekerjaan Ibu', 'required');
        // $this->form_validation->set_rules('peng_ortu', 'Penghasilan Ortu', 'required');
        // $this->form_validation->set_rules('no_telp', 'No Telp Ortu', 'required');
        // $this->form_validation->set_rules('thn_masuk', 'Tahun Masuk', 'required');
        // $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required');
        // // $this->form_validation->set_rules('kelas', 'kelas', 'required');
        // $this->form_validation->set_rules('thn_lls', 'Tahun Lulus', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header_siswa', $data);
            $this->load->view('template/sidebar_siswa', $data);
            $this->load->view('template/topbar_siswa', $data);
            $this->load->view('frontend/ppdb/biodata', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $id_prov = $this->input->post('prov');
            $id_pend = $this->input->post('pendidikan');
            $id_kusioner = $this->input->post('id_kusioner');

            $pend = $this->db->get_where('data_pendidikan', ['id' => $id_pend])->row_array();
            if ($pend['majors'] == 1) {
                $majors = $this->input->post('jurusan');
            } elseif ($pend['majors'] == 0) {
                $majors = '';
            }
            $provinsi =  $data['prov'] = $this->db->get_where('provinsi', ['id_prov' => $id_prov])->row_array();

            //GAMBAR
            $config['upload_path'] = './assets/img/data/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8048';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            $this->db->where('id', $id);
            $g =  $this->db->get('pmb')->row_array();

            if ($this->upload->do_upload('img_siswa')) {
                $img_siswa  = $this->upload->data('file_name');
                unlink("./assets/img/gallery/" . $g['img_siswa']);
            } else {
                $img_siswa  = $g['img_siswa'];
            }
            if ($this->upload->do_upload('img_kk')) {
                $img_kk  = $this->upload->data('file_name');
                unlink("./assets/img/gallery/" . $g['img_kk']);
            } else {
                $img_kk  = $g['img_kk'];
            }
            if ($this->upload->do_upload('img_ijazah')) {
                $img_ijazah  = $this->upload->data('file_name');
                unlink("./assets/img/gallery/" . $g['img_ijazah']);
            } else {
                $img_ijazah  = $g['img_ijazah'];
            }
            if ($this->upload->do_upload('img_ktp')) {
                $img_ktp  = $this->upload->data('file_name');
                unlink("./assets/img/gallery/" . $g['img_ktp']);
            } else {
                $img_ktp  = $g['img_ktp'];
            }

            $pass = $this->input->post('password');
            if (empty($pass)) {
                $password = $data['user']['password'];
            } else {
                $password = password_hash($pass, PASSWORD_DEFAULT);
            }
            $kab = $this->db->get_where('kabupaten', ['id_kab' => $this->input->post('kab')])->row_array();
            $kec = $this->db->get_where('kecamatan', ['id_kec' => $this->input->post('kec')])->row_array();
            $kel = $this->db->get_where('kelurahan', ['id_kel' => $this->input->post('kel')])->row_array();

            $data = [
                'nik' => $this->input->post('nik'),
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'password' => $password,
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'ttl' => $this->input->post('ttl'),
                'prov' => $provinsi['nama'],
                'kab' => $kab['nama_kab'],
                'kec' => $kec['nama'],
                'kel' => $kel['nama'],
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pek_ayah' => $this->input->post('pek_ayah'),
                'pek_ibu' => $this->input->post('pek_ibu'),
                'nama_wali' => $this->input->post('nama_wali'),
                'pek_wali' => $this->input->post('pek_wali'),
                'peng_ortu' => $this->input->post('peng_ortu'),
                'no_telp' => $this->input->post('no_telp'),
                'thn_msk'       => $this->input->post('thn_msk'),
                'sekolah_asal'  => $this->input->post('sekolah_asal'),
                'kelas'         => $this->input->post('kelas'),
                'thn_lls'         => $this->input->post('thn_lls'),
                'id_pend'       => $id_pend,
                'id_majors'     => $majors,
                'img_siswa' => $img_siswa,
                'img_kk' => $img_kk,
                'img_ijazah' => $img_ijazah,
                'img_ktp' => $img_ktp,
                'id_kusioner' => $id_kusioner
            ];

            $this->db->where('id', $id);
            $this->db->update('pmb', $data);

            if ($status == 2) {
                $this->db->set('status', 0);
                $this->db->where('id', $id);
                $this->db->update('pmb');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data pendaftaran kamu berhasil di update.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pmb/biodata');
        }
    }
    public function status_ppdb()
    {
        $users = $this->session->userdata('email');

        $user = $this->db->get_where('pmb', ['email' => $users])->num_rows();

        if (empty($user)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('pmb/login');
        }
        $data['title'] = 'pendaftaran';
        $data['menu'] = 'pendafataran';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $data['user'] = $this->db->get_where('pmb', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['pembayaran'] = $this->db->get_where('data_pembayaran', ['jenis' => 'pmb'])->result_array();
        $this->db->order_by('nama', 'asc');
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $data['kusioner'] = $this->db->get('data_kusioner')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();


        $this->load->view('template/header_siswa', $data);
        $this->load->view('template/sidebar_siswa', $data);
        $this->load->view('template/topbar_siswa', $data);
        $this->load->view('frontend/ppdb/status_pendaftaran', $data);
        $this->load->view('template/footer');
    }
    public function pmb()
    {

        $id = $this->input->post('id');
        // $status = $this->input->post('status_pmb');
        //GAMBAR
        $config['upload_path'] = './assets/img/data/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '8048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        $this->db->where('id', $id);
        $g =  $this->db->get('pmb')->row_array();

        if ($this->upload->do_upload('img_bukti')) {
            $img_bukti  = $this->upload->data('file_name');
            unlink("./assets/img/gallery/" . $g['img_bukti']);
        } else {
            $img_bukti  = $g['img_bukti'];
        }
        $data = [
            'img_bukti' => $img_bukti,
            'sts_pmb' => "1",
            'tgl_insert' => date('y-m-d')
        ];

        $this->db->where('id', $id);
        $this->db->update('pmb', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data pendaftaran kamu berhasil di update.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('pmb/dashboard');
    }


    public function dashboard()
    {
        $users = $this->session->userdata('email');

        $user = $this->db->get_where('pmb', ['email' => $users])->num_rows();

        if (empty($user)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('pmb/login');
        }

        $data['menu'] = 'home';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $data['user'] = $this->db->get_where('pmb', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['pembayaran'] = $this->db->get('data_pembayaran')->result_array();
        $data['pemb'] = $this->db->get_where('data_pembayaran', ['jenis' => 'pmb'])->result_array();
        $data['siswa'] = $this->db->get_where('ta', ['id_ta' => 'pmb'])->result_array();
        $this->db->order_by('nama', 'asc');
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();
        $data['verfikasi'] = $this->Main_model->getDataPMB();
        $data['tes'] = $this->db->get('ta')->result_array();

        $this->load->view('template/header_siswa', $data);
        $this->load->view('template/sidebar_siswa', $data);
        $this->load->view('template/topbar_siswa', $data);
        $this->load->view('frontend/ppdb/dashboard', $data);
        $this->load->view('template/footer');
    }
  
    public function payment()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('ppdb/login');
        }

        $user = $this->db->get_where('ppdb', ['email' => $this->session->userdata('email')])->row_array();



        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            redirect('ppdb/dashboard');
        } else {

            $kode    = $user['no_daftar'];
            $metode    = $this->input->post('pay');
            $jumlah    = $this->input->post('jumlah');

            $chanel = $this->M_payment->req_payment($user['id'], $kode, $jumlah, $metode);
            // var_dump($chanel);die;
            $datainv = [
                'url_inv' => $chanel['checkout_url'],
                'inv' => 2
            ];
            $this->db->where('id', $user['id']);
            $this->db->update('ppdb', $datainv);

            redirect($chanel['checkout_url']);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Anda berhasil Keluar :)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>'
        );
        redirect('pmb/login');
    }
    
    public function kusioner()
    {
        $users = $this->session->userdata('email');
        $user = $this->db->get_where('pmb', ['email' => $users])->num_rows();

        if (empty($user)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan masuk terlebih dahulu!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>');
            redirect('pmb/login');
        }

        $data['menu'] = 'home';
        $data['web'] =  $this->db->get('website')->row_array();
        $data['home'] =  $this->db->get('home')->row_array();
        $data['user'] = $this->db->get_where('pmb', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['pembayaran'] = $this->db->get('data_pembayaran')->result_array();
        $data['pemb'] = $this->db->get_where('data_pembayaran', ['jenis' => 'pmb'])->result_array();

        $data['kusioner'] = $this->Main_model->getData('data_kusioner');
        $data['pendidikan'] = $this->db->get('data_pendidikan')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        $this->db->where('period_status', 1);
        $data['thn_msk'] = $this->db->get('period')->result_array();


           if ($this->form_validation->run() == true) {
            $this->load->view('template/header_siswa', $data);
            $this->load->view('template/sidebar_siswa', $data);
            $this->load->view('template/topbar_siswa', $data);
            $this->load->view('frontend/ppdb/v_kusioner', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                     'medsos' => $this->input->post('medsos')
            ];  

            $this->db->where('id', $id);
            $this->db->update('pmb', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data pendaftaran kamu berhasil di update.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pmb/kusioner');
        }
    }

}
