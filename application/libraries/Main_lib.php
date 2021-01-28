<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_lib
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function isLogin()
	{
		if ($this->ci->session->is_logged_in === TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function getPost($key)
	{
		return $this->ci->input->post($key, true);
	}

	public function getParams($key)
	{
		return $this->ci->input->get($key, true);
	}

	public function createFirstUser()
	{
		$check_in_users_table = $this->ci->db->query("SELECT * FROM pengguna")->num_rows();

		if ($check_in_users_table == 0) {
			$data_users = [
				'nama_lengkap' => 'Ahmad Hanafi',
				'username' => 'ahanafi',
				'password' => password_hash(123456, PASSWORD_DEFAULT),
				'level' => 'SUPER_USER',
			];

			return $this->ci->db->insert('pengguna', $data_users);
		} else {
			return false;
		}
	}

	public function getTemplate($view_file, $data = [])
	{
		$this->ci->load->view('partials/_header', $data);
		$this->ci->load->view('partials/_navbar');
		$this->ci->load->view('partials/_sidebar');
		$this->ci->load->view($view_file);
		$this->ci->load->view('partials/_footer');
		$this->ci->load->view('partials/_js');
	}

}
