<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakonsultasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!isAuthenticated()) {
			redirect('login');
		}
	}

	public function index()
	{
		$konsultasi = $this->Konsultasi->all();

		$data = [
			'nomor' => 1,
			'konsultasi' => $konsultasi
		];

		$this->main_lib->getTemplate("konsultasi/index", $data);
	}

	public function delete($id_konsultasi)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_konsultasi && $data_type === 'konsultasi') {
				$delete = $this->Solusi->delete(['id_konsultasi' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'data konsultasi');
				} else {
					$messages = setArrayMessage('error', 'delete', 'data konsultasi');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'data konsultasi');
				$this->session->set_flashdata('message', $messages);
			}

			redirect(base_url('data-konsultasi'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}
}

/* End of file Datakonsultasi.php */
