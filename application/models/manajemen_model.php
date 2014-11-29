<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getJadwalHarian($id_member)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('booking.id_member', $id_member);
		$this->db->join('lapangan', 'lapangan.id_lapangan = booking.id_lapangan');
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file booking_model.php */
/* Location: ./application/models/booking_model.php */