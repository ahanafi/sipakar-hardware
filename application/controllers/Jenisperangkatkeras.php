<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisperangkatkeras extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!isAuthenticated()) {
			redirect('login');
		}
	}

	public function index()
	{
		$perangkatKeras = $this->JenisPerangkatKeras->all();
		$data = [
			'perangkat_keras' => $perangkatKeras,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("perangkat-keras/index", $data);
	}

	public function create()
	{
		$data = [
			'id_perangkat_keras' => generateID('jenis_perangkat_keras', 'id_perangkat_keras', 'HW')
		];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('perangkat-keras/form-create', $data);
			} else {
				//get user submit form data
				$getPostData = $this->getPostData();

				$insert = $this->JenisPerangkatKeras->insert($getPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'perangkat keras');
				} else {
					$messages = setArrayMessage('error', 'insert', 'perangkat keras');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('jenis-perangkat-keras'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("perangkat-keras/form-create", $data);
		}
	}

	public function edit($id_perangkat_keras)
	{
		$data = [
			'perangkat' => $this->JenisPerangkatKeras->findById(['id_perangkat_keras' => $id_perangkat_keras]),
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('perangkat-keras/form-update', $data);
			} else {
				$getPostData = $this->getPostData();

				$update = $this->JenisPerangkatKeras->update($getPostData, [
					'id_perangkat_keras' => $id_perangkat_keras
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'perangkat keras');
				} else {
					$messages = setArrayMessage('error', 'update', 'perangkat keras');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('jenis-perangkat-keras'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("perangkat-keras/form-update", $data);
		}
	}

	public function delete($id_perangkat_keras)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_perangkat_keras && $data_type === 'jenis-perangkat-keras') {
				$delete = $this->JenisPerangkatKeras->delete(['id_perangkat_keras' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'perangkat keras');
				} else {
					$messages = setArrayMessage('error', 'delete', 'perangkat keras');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'perangkat keras');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('jenis-perangkat-keras'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostData()
	{
		return [
			'id_perangkat_keras' => $this->main_lib->getPost('id_perangkat_keras'),
			'nama_perangkat_keras' => $this->main_lib->getPost('nama_perangkat_keras'),
		];
	}

	private function _rules()
	{
		return [
			[
				'field' => 'id_perangkat_keras',
				'label' => 'ID perangkat keras',
				'rules' => 'required'
			],
			[
				'field' => 'nama_perangkat_keras',
				'label' => 'Nama perangkat keras',
				'rules' => 'required'
			]
		];
	}

}

/* End of file Matakuliah.php */
