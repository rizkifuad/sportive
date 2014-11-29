<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_member_by_meta($meta,$value){
		$this->db->select("id_member, nama_pemilik, username, email, status");
		$this->db->from("members");
		$this->db->where($meta,$value);
		$this->db->limit(1);

		$query 	= $this->db->get();
		
		$result	= $query->result();
		return $result[0];
	}

	public function channel_exist($code){
		$this->db->select("id_member");
		$this->db->from("members");
		$this->db->where("channel_id", $code);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return true;
		}

		return false;
	}

	public function check_login($username, $password){
		$this->db->select("id_member, nama_pemilik, username, email, status");
		$this->db->from("members");
		$this->db->where("password", $password);
		$this->db->where("username", $username);
		$this->db->or_where("email", $username);
		

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}

		return false;

	}

	public function check_same_user($meta, $data){
		$this->db->select($meta);
		$this->db->from("members");
		$this->db->where('LOWER('.$meta.')',strtolower($data));
		
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}

		return false;

	}

	public function register($data){
		$this->db->insert('members', $data);
        $insert_id = $this->db->insert_id();
        for($i=0;$i<7;$i++){
        	$jadwal = array();
        	$jadwal['hari']      = $i;
        	$jadwal['jam_buka']  = "08:00:00";
        	$jadwal['jam_tutup ']= "20:00:00";
        	$jadwal['status']    = 0;
        	$jadwal['id_member'] = $insert_id;
        	$this->db->insert('jadwal', $jadwal);
        }
        return $insert_id;
	}

	public function getMemberById($field, $id)
	{
		$this->db->where('id_member', $id);
		$this->db->select($field);
		$query = $this->db->get('members');
		return $query->row_array();
	}

	public function updateMember($data, $id)
	{
		$this->db->where('id_member', $id);
    	$this->db->update('members', $data);
	}

	public function find_sportcenter($arr,$nama=NULL){
		$this->db->select("*");
		$this->db->from("members m");
		$this->db->join("provinsi p","m.provinsi=p.id_provinsi");
		$this->db->join("kota k","m.kota=k.id_kota");
		$this->db->where($arr);

		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}
}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */