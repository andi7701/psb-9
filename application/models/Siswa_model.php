<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function insert($data)
	{
		$this->db->insert('calonSiswa', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function getWhere($where)
	{
		$this->db->where($where);
		return $this->db->get('calonSiswa');
	}
	public function getAll()
	{
		return $this->db->get('calonSiswa');
	}

	public function getWherein($array)
	{
		$this->db->where_in('id', $array);
		return $this->db->get('calonSiswa');
	}

	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('calonSiswa', $data);
	}
	public function getSiswa($id)
	{
		$this->db->select('*');
		$this->db->join('riwayatPenyakit', 'riwayatPenyakit.idSiswa = calonSiswa.id', 'RIGHT');
		return $this->db->get('calonSiswa');
	}
}