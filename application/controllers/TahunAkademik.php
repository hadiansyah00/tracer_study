   parent::__construct();
   //sess_expired();
   $users = $this->session->userdata('email');
   $this->load->model(['Main_model', 'Export_model', 'Import_model']);
   $this->load->helper(['tgl_indo', 'string']);
   $this->load->library('email');

   $user = $this->db->get_where('karyawan', ['email' => $users])->row_array();
   if ($user['role_id'] < '1' ) { redirect('auth/blocked'); }elseif($user['role_id']> '6'){
       redirect('auth/blocked');
       }

       if (!$users) {
       $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Silahkan masuk terlebih dahulu!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>');
       redirect('auth/admin');
       }
       }