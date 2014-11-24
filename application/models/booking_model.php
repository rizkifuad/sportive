<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}


	/**
	 * get booking by id booking dan id_member
	 */
	public function getBooking($id_booking, $id_member){
		$this->db->select('token, type,jadwal,jumlah_uang,status,id_lapangan');
		$this->db->from('booking');
		$this->db->where('id_booking', $id_booking);
		$this->db->where('id_member', $id_member);

		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}

	/**
	 * update data booking
	 */

	public function updateBooking($id,$data){
		$this->db->where('id_booking', $id);
		$this->db->update('booking', $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}

	/**
	 * simpan data booking
	 */
	public function saveBooking($data){
		$this->db->insert("booking",$data);

		$insert_id = $this->db->insert_id();

        return $insert_id;
	}
}

/* End of file booking_model.php */
/* Location: ./application/models/booking_model.php */