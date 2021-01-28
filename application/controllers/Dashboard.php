<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!isAuthenticated()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'total_dosen' => 0
		];
		$this->main_lib->getTemplate('dashboard', $data);
	}

}

/* End of file Dashboard.php */
