<?php
/**
* 
*/
class Beneficios extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('cuit') == 'admin@atsa.com') {
				$this->load->view('admin/header');
				$this->load->view('beneficios');
				$this->load->view('layout/footer');	
			}elseif ($this->session->userdata('id')) {
				$this->load->view('user/header');
				$this->load->view('beneficios');
				$this->load->view('layout/footer');
			}else{
				$this->load->view('layout/header');
				$this->load->view('beneficios');
				$this->load->view('layout/footer');
			}
	}
}
?>