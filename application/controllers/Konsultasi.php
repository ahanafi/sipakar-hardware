<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

	public function index()
	{
		$perangkatKeras = $this->JenisPerangkatKeras->all();
		$data = [
			'perangkat_keras' => $perangkatKeras
		];

		$this->main_lib->getTemplate("user-consult/first-section", $data);
	}

	public function submit()
	{
		if (isset($_POST['next'])) {
			$orderSection = $this->main_lib->getPost('order-section');

			$rules = $this->_rules($orderSection);
			$this->form_validation->set_rules($rules);

			if ($orderSection === 'FIRST-SECTION') {

				if ($this->form_validation->run() == FALSE) {
					$perangkatKeras = $this->JenisPerangkatKeras->all();
					$data = [
						'perangkat_keras' => $perangkatKeras
					];

					$this->main_lib->getTemplate("user-consult/first-section", $data);
				} else {
					$nama = $this->main_lib->getPost('nama');
					$perangkatKerasId = $this->main_lib->getPost('id_perangkat_keras');
					$merk = $this->main_lib->getPost('merk');
					$tipe = $this->main_lib->getPost('tipe');

					$userSession = [
						'has_session' => TRUE,
						'section' => $orderSection,
						'data' => [
							'nama' => $nama,
							'id_perangkat_keras' => $perangkatKerasId,
							'merk' => $merk,
							'tipe' => $tipe,
						]
					];

					$this->session->set_userdata($userSession);
					redirect(base_url('second-section') . '#two');
				}

			} else if ($orderSection === 'SECOND-SECTION') {
				if ($this->form_validation->run() == FALSE) {

					$perangkatKerasId = $_SESSION['data']['id_perangkat_keras'];
					$perangkatKeras = $this->JenisPerangkatKeras->findById(['id_perangkat_keras' => $perangkatKerasId]);
					$jenisKerusakan = $this->Kerusakan->findById(['id_perangkat_keras' => $perangkatKerasId], true);
					$merk = $_SESSION['data']['merk'];
					$tipe = $_SESSION['data']['tipe'];

					$data = [
						'perangkat_keras' => $perangkatKeras,
						'jenis_kerusakan' => $jenisKerusakan,
						'merk' => $merk,
						'tipe' => $tipe,
					];

					$this->main_lib->getTemplate("user-consult/second-section", $data);

				} else {

					$kerusakanId = $this->main_lib->getPost('id_kerusakan');

					$konsultasiId = generateID('konsultasi', 'id_konsultasi', 'KL');
					$merk = $_SESSION['data']['merk'];
					$tipe = $_SESSION['data']['tipe'];
					$currentTime = date('Y-m-d H:i:s');

					//Insert to konsultasi
					$data = [
						'id_konsultasi' => $konsultasiId,
						'merk' => $merk,
						'tipe' => $tipe,
						'id_kerusakan' => $kerusakanId,
						'waktu' => $currentTime
					];

					$this->Konsultasi->insert($data);

					//Set session
					$_SESSION['section'] = $orderSection;
					$_SESSION['data']['id_kerusakan'] = $kerusakanId;

					redirect(base_url('last-section') . '#three');
				}

			} else if ($orderSection === 'LAST-SECTION') {
				$userSession = ['has_session', 'section', 'data'];
				$this->session->unset_userdata($userSession);

				redirect(base_url('/'));
			}
		} else {
			redirect(base_url());
		}
	}

	public function second_section()
	{
		if (isset($_SESSION['has_session']) && $_SESSION['has_session'] === TRUE) {
			$perangkatKerasId = $_SESSION['data']['id_perangkat_keras'];
			$perangkatKeras = $this->JenisPerangkatKeras->findById(['id_perangkat_keras' => $perangkatKerasId]);
			$jenisKerusakan = $this->Kerusakan->findById(['id_perangkat_keras' => $perangkatKerasId], true);
			$merk = $_SESSION['data']['merk'];
			$tipe = $_SESSION['data']['tipe'];

			$data = [
				'perangkat_keras' => $perangkatKeras,
				'jenis_kerusakan' => $jenisKerusakan,
				'merk' => $merk,
				'tipe' => $tipe,
			];

			$this->main_lib->getTemplate("user-consult/second-section", $data);
		} else {
			redirect(base_url());
		}
	}

	public function last_section()
	{
		if (isset($_SESSION['has_session']) && $_SESSION['has_session'] === TRUE) {
			$kerusakanId = $_SESSION['data']['id_kerusakan'];
			$kerusakan = $this->Kerusakan->findById(['id_kerusakan' => $kerusakanId]);

			$data = [
				'kerusakan' => $kerusakan,
			];

			$this->main_lib->getTemplate("user-consult/last-section", $data);
		} else {
			redirect(base_url());
		}
	}

	private function _rules($type)
	{
		if ($type == "FIRST-SECTION") {
			//Rule when create new user


		} else if ($type == "SECOND-SECTION") {
			//Rule when update user
			$rules = [
				[
					'field' => 'id_kerusakan',
					'label' => 'Jenis Kerusakan',
					'rules' => 'required'
				],
			];
		} else {
			$rules = [];
		}

		return $rules;
	}
}

/* End of file Konsultasi.php */
