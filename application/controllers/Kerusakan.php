<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerusakan extends CI_Controller
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
		$kerusakan = $this->Kerusakan->all();
		$data = [
			'kerusakan' => $kerusakan,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("kerusakan/index", $data);
	}

	public function create()
	{
		$perangkatKeras = $this->JenisPerangkatKeras->all();

		$data = [
			'id_kerusakan' => generateID('kerusakan', 'id_kerusakan', 'KR'),
			'perangkat_keras' => $perangkatKeras
		];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules('insert');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('kerusakan/form-create', $data);
			} else {
				//get user submit form data
				$getPostData = $this->getPostData();

				$insert = $this->Kerusakan->insert($getPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'kerusakan');
				} else {
					$messages = setArrayMessage('error', 'insert', 'kerusakan');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('kerusakan'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("kerusakan/form-create", $data);
		}
	}

	public function edit($id_kerusakan)
	{
		$perangkatKeras = $this->JenisPerangkatKeras->all();

		$data = [
			'kerusakan' => $this->Kerusakan->findById(['id_kerusakan' => $id_kerusakan]),
			'perangkat_keras' => $perangkatKeras,
			'id_kerusakan' => $id_kerusakan
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules('update');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('kerusakan/form-update', $data);
			} else {
				$getPostData = $this->getPostData();

				$update = $this->Kerusakan->update($getPostData, [
					'id_kerusakan' => $id_kerusakan
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'kerusakan');
				} else {
					$messages = setArrayMessage('error', 'update', 'kerusakan');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('kerusakan'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("kerusakan/form-update", $data);
		}
	}

	public function delete($id_kerusakan)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_kerusakan && $data_type === 'kerusakan') {
				$delete = $this->Kerusakan->delete(['id_kerusakan' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'kerusakan');
				} else {
					$messages = setArrayMessage('error', 'delete', 'kerusakan');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'kerusakan');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('kerusakan'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostData()
	{
		return [
			'id_kerusakan' => $this->main_lib->getPost('id_kerusakan'),
			'id_perangkat_keras' => $this->main_lib->getPost('id_perangkat_keras'),
			'nama_kerusakan' => $this->main_lib->getPost('nama_kerusakan'),
			'solusi' => $this->main_lib->getPost('solusi')
		];
	}

	private function _rules($type)
	{
		return [
			[
				'field' => 'id_kerusakan',
				'label' => 'ID kerusakan',
				'rules' => 'required'
			],
			[
				'field' => 'nama_kerusakan',
				'label' => 'Nama kerusakan',
				'rules' => 'required'
			],
		];
	}

}

/* End of file Fakultas.php */
