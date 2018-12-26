<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class riwayatKelahiran_model extends CI_Model {

	public function insert($data)
	{
		$this->db->insert('riwayatKelahiran', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function remove($id)
	{
		$this->db->where('idSiswa', $id);
		$this->db->delete('riwayatKelahiran');
	}

	public function getWhere($where)
	{
		$this->db->where($where);
		return $this->db->get('riwayatKelahiran');
	}
	public function getAll()
	{
		return $this->db->get('riwayatKelahiran');
	}
	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('riwayatKelahiran', $data);
	}

}