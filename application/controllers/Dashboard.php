<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$jumlahHardware = $this->JenisPerangkatKeras->count();
		$jumlahKonsultasi = $this->Konsultasi->count();
		$jumlahPengguna = $this->User->count();

		$data = [
			'jumlah_hardware' => $jumlahHardware,
			'jumlah_konsultasi' => $jumlahKonsultasi,
			'jumlah_pengguna' => $jumlahPengguna
		];
		$this->main_lib->getTemplate('dashboard', $data);
	}

}

/* End of file Dashboard.php */
