<?php

class User extends CI_Model
{

	// var $db;
	// var $table = "tbl_user";

	public function buat_kode()
	{

		$this->db->select('RIGHT(tbl_user.id_user,3) as kode', FALSE);
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_user');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "AD" . $kodemax;

		return $kodejadi;
	}
}
