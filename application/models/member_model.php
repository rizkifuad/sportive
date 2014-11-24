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
		$this->db->where("username", $username);
		$this->db->or_where("email", $username);
		$this->db->where("password", $password);
		

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

        return $insert_id;
	}

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */