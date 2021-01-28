<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends Main_model
{

	protected $table = "pengguna";

	public function login($credentials)
	{
		$sql = $this->db->where([
			'username' => $credentials['username']
		])->get($this->table);

		$check = $sql->num_rows();

		if ($check > 0) {
			$user = $sql->row();
			$validate = password_verify($credentials['password'], $user->password);

			if ($validate === TRUE) {
				$this->session->set_userdata("user", $user);
				$this->session->set_userdata("is_logged_in", TRUE);
				$this->session->set_userdata("logged_in_at", date('Y-m-d H:i:s'));
				unset($_SESSION['user']->password);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function register($data)
	{
		return parent::insert($this->table, $data);
	}
}

/* End of file Auth_model.php */
