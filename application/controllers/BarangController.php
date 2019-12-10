<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarangController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$models = array(
			'BarangModel' => 'BarangModel',
		);
		$this->load->model($models);
	}

	public function getAllBarang()
	{
		$response = array(
			'list_barang' => $this->BarangModel->getAllBarang()
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function insertBarang(){
		$barang = json_decode(file_get_contents('php://input'), true);
		$this->BarangModel->insertBarang($barang);
		$response = array(
			'message' => 'Sukses menambahkan barang'
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function deleteBarang($id)
	{
		$this->BarangModel->deleteBarang($id);
		$response = array(
			'message' => 'Sukses menghapus barang'
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function updateBarang()
	{
		$barang = json_decode(file_get_contents('php://input'), true);
		$this->BarangModel->updateBarang($barang);
		$response = array(
			'message' => 'Sukses mengupdate barang barang'
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
}
