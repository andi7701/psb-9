<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function insert($data)
	{
		$this->db->insert('guru', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function getWhere($where)
	{
		$this->db->where($where);
		return $this->db->get('guru');
	}
	public function getAll()
	{
		return $this->db->get('guru');
	}
	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('guru', $data);
	}
}