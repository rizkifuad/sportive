<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}


	

	/*
		Token : itu digenerate random automatically
		Type: Booking offline atau booking online
		Status : 	0. Wes booking durung bayar
					1. Wes booking bayar DP
					2. Wes booking lunas

	*/

	/**
	 * get booking by id booking dan id_member
	 */
	public function getBooking($id_booking, $id_member){
		$this->db->select('nama,telp,token,type,jadwal,durasi,jml_uang,status,id_lapangan');
		$this->db->from('booking');
		$this->db->where('id_booking', $id_booking);
		$this->db->where('id_member', $id_member);

		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}

	public function getBookingByToken($token){
		$this->db->select('nama,telp,token,b.type,jadwal,durasi,jml_uang,b.status,nama_lapangan,nama_tempat');
		$this->db->from('booking b');
		$this->db->join('members m','m.id_member=b.id_member');
		$this->db->join('lapangan l','l.id_lapangan=b.id_lapangan');
		
		$this->db->where('token', $token);
		
		$query = $this->db->get();
		$result = $query->result();
		if($result)
			return $result[0];
		return false;
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

	/**
	 * Bayar Booking model
	 */
	public function getBookingTodayById($id_member){
		$date = date("Y-m-d");
		$this->db->select("id_booking, nama, telp, jadwal, durasi, jml_uang, status, booking.id_lapangan, nama_lapangan");
		$this->db->from("booking");
		$this->db->where("booking.id_member", $id_member);
		$this->db->where("status !=", 3);
		$this->db->like("jadwal", $date);
		$this->db->join("lapangan", "booking.id_lapangan = lapangan.id_lapangan", "left");
		$this->db->order_by("jadwal","asc"); 

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	/**
	 * Model Pelunasan booking
	 */
	public function pelunasan($data,$id_booking,$id_member,$kekurangan){
		$this->db->set("jml_uang", "jml_uang+".$kekurangan, false);
		$this->db->where("id_booking", $id_booking);
		$this->db->where("id_member", $id_member);
		$this->db->update("booking", $data);

		if ($this->db->affected_rows() == '1')
		{
			return 1;
		}
		  	return 0;
	}
	/**
	 * Model Check Jadwal
	 */
	public function checkJadwal($tanggal,$id_member){
		$this->db->select("jadwal,id_lapangan");
		$this->db->from("booking");
		$this->db->like("jadwal", $tanggal);
		$this->db->where("id_member", $id_member);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}
}

/* End of file booking_model.php */
/* Location: ./application/models/booking_model.php */