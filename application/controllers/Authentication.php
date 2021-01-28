<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('main_lib');
		$this->main_lib->createFirstUser();
	}

	public function index()
	{
		if(isAuthenticated()) {
			redirect('dashboard');
		}

		if (isset($_POST['login'])) {
			$rules = [
				[
					'field' => 'username',
					'label' => 'Username / Email',
					'rules' => 'required'
				],
				[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				]
			];
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/login-form');
			} else {
				$username = $this->input->post('username', true);
				$password = $this->input->post('password', true);

				$credentials = [
					'username' 	=> $username,
					'password' 	=> $password
				];

				$login = $this->Auth->login($credentials);

				if ($login) {
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Oops! Username atau Password Anda salah!'
					]);
					redirect(base_url('login'));
				}
			}

		} else {
			$this->load->view('auth/form-login');
		}
	}

	public function logout()
    {
        if (isset($_POST['logout']) && $_POST['logout'] == 'TRUE') {
            $this->session->sess_destroy();
            $this->session->unset_userdata('user');
            redirect('login');
        } else {
            echo "<script>window.history.back();</script>";
        }

    }

}

/* End of file Authentication.php */
