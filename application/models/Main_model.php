<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function insert($table, $data, $batch = false)
	{
		return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
	}

	public function delete($table, $pk, $id)
	{
		return $this->db->delete($table, [$pk => $id]);
	}

	
    function getsiswa($id, $searchTerm = "")
    {

        // Fetch siswa
        $data_kelas = $this->db->get_where('data_kelas', ['id_peng' => $id])->result_array();
        $data_kar = $this->db->get_where('karyawan', ['id' => $id])->row_array();

        $id_kelas = array_column($data_kelas, "id");
        if ($data_kar['role_id'] !== '1') {
            $this->db->where_in('id_kelas', $id_kelas);
        } else {
            $this->db->select('*');
        }

        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $fetched_records = $this->db->get('siswa');
        $siswa = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($siswa as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['nis'] . ' | ' . $user['nama']);
        }
        return $data;
    }
    public function getAktif()
    {
        $data = "SELECT *FROM ta WHERE status_ta = 1";
        return $this->db->query($data);
    }
    // Fetch Karyawan
    function getKaryawan($searchTerm = "")
    {

        // Fetch karyawan
        $this->db->select('*');
        $this->db->where("nama like '%" . $searchTerm . "%' ");

        $fetched_records = $this->db->get('karyawan');
        $siswa = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($siswa as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['nama']);
        }
        return $data;
    }

    // Fetch siswa
    function getsiswa_pendidikan($pendidikan, $searchTerm = "")
    {
        // Fetch siswa
        $this->db->select('*');
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $fetched_records = $this->db->get_where('siswa', ['id_pend' => $pendidikan]);
        $siswa = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($siswa as $user) {
            $data[] = array("id" => $user['nama'], "text" => $user['nis'] . ' | ' . $user['nama']);
        }
        return $data;
    }

    // Fetch siswa
    function getsiswa_kelas($kelas, $searchTerm = "")
    {
        // Fetch siswa
        $this->db->select('*');
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $fetched_records = $this->db->get_where('siswa', ['id_kelas' => $kelas]);
        $siswa = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($siswa as $user) {
            $data[] = array("id" => $user['nama'], "text" => $user['nis'] . ' | ' . $user['nama']);
        }
        return $data;
    }

    // Fetch Takzir
    function getTakzir($searchTerm = "")
    {

        // Fetch Takzir
        $this->db->select('*');
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $fetched_records = $this->db->get('data_pelanggaran');
        $takzir = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($takzir as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['kode'] . ' | ' . $user['nama']);
        }
        return $data;
    }
    public function getKusioner()
    {
		$this->db->select('*');
		$this->db->join('data_kusioner t', 'p.id_kusioner = d.id');
		$this->db->order_by('user_id', 'DESC');
		return $this->db->get('pmb p')->result_array();
    }
    public function getData($table, $data = null, $where = null)
	{
		if ($data != null) {
			return $this->db->get_where($table, $data)->row_array();
		} else {
			return $this->db->get_where($table, $where)->result_array();
		}
	}
    public function update($table, $pk, $id, $data)
	{
		$this->db->where($pk, $id);
		return $this->db->update($table, $data);
	}

    public function mhs_farmasi_b()
	{

		$this->db->where('id_majors', '10');
		$query = $this->db->get('pmb');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
     public function mhs_farmasi_a()
	{

		$this->db->where('id_majors', '9');
		$query = $this->db->get('pmb');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
     public function mhs_bidan()
	{

		$this->db->where('id_majors', '11');
		$query = $this->db->get('pmb');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
     public function mhs_gizi()
	{

		$this->db->where('id_majors', '12');
		$query = $this->db->get('pmb');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

    public function getDataPMB(){

        $this->db->select('*');
		$this->db->from('pmb');
		$this->db->join('ta', 'ta.id_ta = pmb.id_ta', 'left');
		$this->db->where('pmb.email', $this->session->userdata('email'));
		$query = $this->db->get()->row_array();
		return $query;

    }
    
}
