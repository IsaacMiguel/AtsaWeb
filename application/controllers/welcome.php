<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			if ($this->session->userdata('cuit') == 'admin@atsa.com') {
				$this->load->view('admin/header');
				$this->load->view('index');
				$this->load->view('layout/footer');	
			}elseif ($this->session->userdata('id')) {
				$this->load->view('user/header');
				$this->load->view('index');
				$this->load->view('layout/footer');
			}else{
				$this->load->view('layout/header');
				$this->load->view('index');
				$this->load->view('layout/footer');
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */