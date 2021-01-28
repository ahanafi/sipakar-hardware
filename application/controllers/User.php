<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if(!isAuthenticated()) {
			redirect('login');
		}
		provideAccessTo('ADMINISTRATOR');
	}

	public function index()
	{
		$users = $this->User->all();
		$data = [
			'users' => $users,
			'nomor' => 1
		];
		$this->main_lib->getTemplate("user/index", $data);
	}

	public function create()
	{
		$data = [
			'user_level' => showUserLevel()
		];

		if (isset($_POST['submit'])) {
			$rules = $this->_rules('insert');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('user/form-create', $data);
			} else {
				//get user submit form data
				$userPostData = $this->getPostUserData();

				//encrypt submitted password
				$encryptPassword = password_hash($this->main_lib->getPost('password'), PASSWORD_DEFAULT);

				//assign to user data
				$userPostData['password'] = $encryptPassword;

				$insert = $this->User->insert($userPostData);
				if ($insert) {
					$messages = setArrayMessage('success', 'insert', 'pengguna');
				} else {
					$messages = setArrayMessage('error', 'insert', 'pengguna');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('user'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("user/form-create", $data);
		}
	}

	public function edit($id_pengguna)
	{
		$data = [
			'user' => $this->User->findById(['id_pengguna' => $id_pengguna]),
			'user_level' => showUserLevel()
		];

		if (isset($_POST['update'])) {
			$rules = $this->_rules('update');
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<small class='form-text text-danger'>", "</small>");

			if ($this->form_validation->run() === FALSE) {
				$this->main_lib->getTemplate('user/form-update', $data);
			} else {
				$userPostData = $this->getPostUserData();

				$update = $this->User->update($userPostData, [
					'id_pengguna' => $id_pengguna
				]);

				if ($update) {
					$messages = setArrayMessage('success', 'update', 'pengguna');
				} else {
					$messages = setArrayMessage('error', 'update', 'pengguna');
				}

				$this->session->set_flashdata('message', $messages);
				redirect(base_url('user'), 'refresh');
			}
		} else {
			$this->main_lib->getTemplate("user/form-update", $data);
		}
	}

	public function delete($id_pengguna)
	{
		if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
			$data_id = $this->main_lib->getPost('data_id');
			$data_type = $this->main_lib->getPost('data_type');

			if ($data_id === $id_pengguna && $data_type === 'user') {
				$delete = $this->User->delete(['id_pengguna' => $data_id]);
				if ($delete) {
					$messages = setArrayMessage('success', 'delete', 'pengguna');
				} else {
					$messages = setArrayMessage('error', 'delete', 'pengguna');
				}

				$this->session->set_flashdata('message', $messages);
			} else {
				$messages = setArrayMessage('error', 'delete', 'pengguna');
				$this->session->set_flashdata('message', $messages);
			}
			redirect(base_url('user'), 'refresh');
		} else {
			redirect('dashboard');
		}
	}

	private function getPostUserData()
	{
		return [
			'nama_lengkap' => $this->main_lib->getPost('nama_lengkap'),
			'username' => $this->main_lib->getPost('username'),
			'level' => $this->main_lib->getPost('level'),
		];
	}

	private function _rules($type)
	{
		if ($type == "insert") {
			//Rule when create new user
			$rules = [
				[
					'field' => 'nama_lengkap',
					'label' => 'Nama Lengkap',
					'rules' => 'required|alpha_numeric_spaces'
				],
				[
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|is_unique[pengguna.username]|min_length[6]|max_length[30]'
				],
				[
					'field' => 'password',
					'label' => 'password',
					'rules' => 'required|min_length[6]'
				],
				[
					'field' => 'konfirmasi_password',
					'label' => 'Konfirmasi password',
					'rules' => 'required|matches[password]|trim'
				],
				[
					'field' => 'level',
					'label' => 'level',
					'rules' => 'required|trim'
				],
			];

		} else if ($type == "update") {
			//Rule when update user
			$rules = [
				[
					'field' => 'nama_lengkap',
					'label' => 'Nama Lengkap',
					'rules' => 'required|alpha_numeric_spaces'
				],
				[
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|min_length[6]|max_length[30]'
				],
				[
					'field' => 'email',
					'label' => 'email',
					'rules' => 'required|valid_email'
				],
				[
					'field' => 'level',
					'label' => 'level',
					'rules' => 'required|trim'
				],
			];
		} else if ($type == "password") {
			//Rule when update password user
			$rules = [
				[
					'field' => 'old_password',
					'label' => 'Password lama',
					'rules' => 'required|min_length[6]'
				],
				[
					'field' => 'new_password',
					'label' => 'Password baru',
					'rules' => 'required|min_length[6]'
				],
				[
					'field' => 'confirm_password',
					'label' => 'Konfirmasi password',
					'rules' => 'required|matches[new_password]|trim'
				]
			];
		}

		return $rules;
	}

}

/* End of file User.php */
