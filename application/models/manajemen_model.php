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
		$this->db->where('booking.status', 2);
		$this->db->join('lapangan', 'lapangan.id_lapangan = booking.id_lapangan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getSortedLaporanByTahun($id_member)
	{
		$year = $this->getYearLaporan($id_member);
		$i = 0;
		foreach($year as $th)
		{
			$this->db->select('sum(durasi) hasil');
			$this->db->where('id_member', $id_member);
			$this->db->where('year(jadwal)', $th);
			$query = $this->db->get('booking');
			$yaxis[$i] = intval($query->row('hasil'));
			$xaxis[$i] = $th;
			$i++;
		}

		$result_table = $this->getJadwalHarian($id_member);
		return array($xaxis, $yaxis, $result_table);
	}

	public function getSortedLaporanByBulan($tahun, $id_member)
	{
		$j = 0;
		for($i = 1; $i < 13; $i++)
		{
			$this->db->select('sum(durasi) hasil');
			$this->db->where('id_member', $id_member);
			$this->db->where('year(jadwal)', $tahun);
			$this->db->where('month(jadwal)', $i);
			$query = $this->db->get('booking');
			$yaxis[$j] = intval($query->row('hasil'));
			$j++;
		}
		$result_table = $this->getJadwalHarian($id_member);
		$xaxis = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des');
		return array($xaxis, $yaxis, $result_table);
	}

	public function getYearLaporan($id_member)
	{
		$query = $this->db->query('select distinct year(jadwal) as annual from booking where id_member = '.$id_member.';');
        $dt = $query->result_array();
        $i = 0; $year = array();
        foreach($dt as $data)
        {
            $year[$i] = $data['annual'];
            $i++;
        }
        return $year;
	}
}

/* End of file booking_model.php */
/* Location: ./application/models/booking_model.php */