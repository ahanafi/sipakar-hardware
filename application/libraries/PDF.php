<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
#define("DOMPDF_ENABLE_CSS_FLOAT", true);

class PDF extends Dompdf{
    protected $ci;
    private $filename;

    public function __construct()
    {
    	parent::__construct();
        $this->ci =& get_instance();
    }

    public function setFileName($filename)
	{
		$this->filename = $filename;
	}

	public function loadView($viewFile, $data = array())
	{
		$options = new Options();
		$options->setChroot(FCPATH);
		$options->setDefaultFont('courier');

		$this->setOptions($options);

		$html = $this->ci->load->view($viewFile, $data, true);
		$this->loadHtml($html);
		$this->render();
		$this->stream($this->filename, ['Attachment' => 0]);
	}


}

/* End of file PDF_lib.php */
