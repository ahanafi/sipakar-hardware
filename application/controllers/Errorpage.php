<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
         $data = [
            'title' => 'Error',
            'error_code' => '404',
            'message' => 'Halaman yang Anda cari tidak ditemukan.'
        ];
        $this->load->view('errors/restrict-page', $data);
	}

	public function restrict_page()
    {
        $data = [
            'title' => 'Error',
            'error_code' => '403',
            'message' => 'Anda tidak dapat mengakses halaman ini.'
        ];
        $this->load->view('errors/restrict-page', $data);
    }

}

/* End of file Errorpage.php */
