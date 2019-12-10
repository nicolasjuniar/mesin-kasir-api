<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarangModel extends CI_Model
{

	public function getAllBarang()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		return $this->db->get('')->row_array();
	}

	public function insertBarang($barang)
	{
		$this->db->insert('tbl_barang', $barang);
	}

	public function deleteBarang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_barang');
	}

	public function updateBarang($barang)
	{
		$this->db->where('id', $barang['id']);
		$this->db->update('tbl_barang', $barang);
	}
}
