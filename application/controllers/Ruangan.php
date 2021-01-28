<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if(!isAuthenticated()) {
			redirect('login');
		}
	}

	public function index()
	{
		$ruangan = $this->Ruangan->all();
		$data = [
			'ruangan' => $ruangan,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("ruangan/index", $data);
	}

	public function create()
	{
		$data = [];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules('insert');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('ruangan/form-create', $data);
			} else {
				//get user submit form data
				$getPostData = $this->getPostData();

				$insert = $this->Ruangan->insert($getPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'ruangan');
				} else {
					$messages = setArrayMessage('error', 'insert', 'ruangan');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('ruangan'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("ruangan/form-create", $data);
		}
	}

	public function edit($id_ruangan)
	{
		$data = [
			'ruangan' => $this->Ruangan->findById(['id_ruangan' => $id_ruangan]),
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules('update');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('ruangan/form-update', $data);
			} else {
				$getPostData = $this->getPostData();

				$update = $this->Ruangan->update($getPostData, [
					'id_ruangan' => $id_ruangan
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'ruangan');
				} else {
					$messages = setArrayMessage('error', 'update', 'ruangan');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('ruangan'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("ruangan/form-update", $data);
		}
	}

	public function delete($id_ruangan)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_ruangan && $data_type === 'ruangan') {
				$delete = $this->Ruangan->delete(['id_ruangan' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'ruangan');
				} else {
					$messages = setArrayMessage('error', 'delete', 'ruangan');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'ruangan');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('ruangan'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostData()
	{
		return [
			'kode_ruangan' => $this->main_lib->getPost('kode_ruangan'),
			'kapasitas' => $this->main_lib->getPost('kapasitas'),
		];
	}

	private function _rules($type)
	{
		if ($type == "insert") {
			//Rule when create new user
			$rules = [
				[
					'field' => 'kode_ruangan',
					'label' => 'Kode ruangan',
					'rules' => 'required|is_unique[ruangan.kode_ruangan]'
				],
				[
					'field' => 'kapasitas',
					'label' => 'Kapasitas',
					'rules' => 'required'
				],
			];

		} else if ($type == "update") {
			//Rule when update user
			$rules = [
				[
					'field' => 'kode_ruangan',
					'label' => 'Kode ruangan',
					'rules' => 'required'
				],
				[
					'field' => 'kapasitas',
					'label' => 'Jumlah SKS',
					'rules' => 'required'
				],
			];
		}

		return $rules;
	}

}

/* End of file Ruangan.php */
