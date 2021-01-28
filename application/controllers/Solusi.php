<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solusi extends CI_Controller
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
		$solusi = $this->Solusi->all();
		$data = [
			'solusi' => $solusi,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("solusi/index", $data);
	}

	public function create()
	{
		$data = [
			'id_solusi' => generateID('solusi', 'id_solusi', 'SL')
		];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('solusi/form-create', $data);
			} else {
				//get user submit form data
				$getPostData = $this->getPostData();

				$insert = $this->Solusi->insert($getPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'solusi');
				} else {
					$messages = setArrayMessage('error', 'insert', 'solusi');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('solusi'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("solusi/form-create", $data);
		}
	}

	public function edit($id_solusi)
	{
		$solusi = $this->Solusi->findById(['id_solusi' => $id_solusi]);

		$data = [
			'solusi' => $solusi,
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('solusi/form-update', $data);
			} else {
				$getPostData = $this->getPostData();

				$update = $this->Solusi->update($getPostData, [
					'id_solusi' => $id_solusi
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'solusi');
				} else {
					$messages = setArrayMessage('error', 'update', 'solusi');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('solusi'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("solusi/form-update", $data);
		}
	}

	public function delete($id_solusi)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_solusi && $data_type === 'solusi') {
				$delete = $this->Solusi->delete(['id_solusi' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'solusi');
				} else {
					$messages = setArrayMessage('error', 'delete', 'solusi');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'solusi');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('solusi'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostData()
	{
		return [
			'id_solusi' => $this->main_lib->getPost('id_solusi'),
			'deskripsi' => $this->main_lib->getPost('deskripsi'),
		];
	}

	private function _rules()
	{
		return [
				[
					'field' => 'id_solusi',
					'label' => 'ID solusi',
					'rules' => 'required'
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi',
					'rules' => 'required'
				]
		];
	}

}

/* End of file Kelas.php */
