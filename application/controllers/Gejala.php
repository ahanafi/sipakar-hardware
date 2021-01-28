<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
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
		$gejala = $this->Gejala->all();
		$data = [
			'gejala' => $gejala,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("gejala/index", $data);
	}

	public function create()
	{
		$data = [
			'id_gejala' => generateID('gejala', 'id_gejala', 'GJ')
		];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules('insert');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('gejala/form-create', $data);
			} else {
				//get user submit form data
				$getPostData = $this->getPostData();

				$insert = $this->Gejala->insert($getPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'gejala');
				} else {
					$messages = setArrayMessage('error', 'insert', 'gejala');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('gejala'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("gejala/form-create", $data);
		}
	}

	public function edit($id_gejala)
	{
		$data = [
			'gejala' => $this->Gejala->findById(['id_gejala' => $id_gejala]),
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules('update');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('gejala/form-update', $data);
			} else {
				$getPostData = $this->getPostData();

				$update = $this->Gejala->update($getPostData, [
					'id_gejala' => $id_gejala
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'gejala');
				} else {
					$messages = setArrayMessage('error', 'update', 'gejala');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('gejala'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("gejala/form-update", $data);
		}
	}

	public function delete($id_gejala)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_gejala && $data_type === 'gejala') {
				$delete = $this->Gejala->delete(['id_gejala' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'gejala');
				} else {
					$messages = setArrayMessage('error', 'delete', 'gejala');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'gejala');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('gejala'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostData()
	{
		return [
			'id_gejala' => $this->main_lib->getPost('id_gejala'),
			'nama_gejala' => $this->main_lib->getPost('nama_gejala'),
		];
	}

	private function _rules($type)
	{
		return [
			[
				'field' => 'id_gejala',
				'label' => 'ID gejala',
				'rules' => 'required'
			],
			[
				'field' => 'nama_gejala',
				'label' => 'Nama gejala',
				'rules' => 'required'
			],
		];
	}

}

/* End of file Fakultas.php */
