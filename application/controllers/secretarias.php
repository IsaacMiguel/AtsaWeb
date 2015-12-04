<?php
/**
* 
*/
class Secretarias extends CI_Controller
{
	public function gremial()
	{
		if ($this->session->userdata('login') == true) {
			$this->load->view('admin/header');
			$this->load->view('secretarias/gremial');
			$this->load->view('layout/footer');
		}elseif ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('secretarias/gremial');
			$this->load->view('layout/footer');
		}else{
			$this->load->view('layout/header');
			$this->load->view('secretarias/gremial');
			$this->load->view('layout/footer');
		}
	}

	public function turismo()
	{
		if ($this->session->userdata('login') == true) {
			$this->load->view('admin/header');
			$this->load->view('secretarias/turismo');
			$this->load->view('layout/footer');
		}elseif ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('secretarias/turismo');
			$this->load->view('layout/footer');
		}else{
			$this->load->view('layout/header');
			$this->load->view('secretarias/turismo');
			$this->load->view('layout/footer');
		}
	}

	public function cultura_capacitacion()
	{
		if ($this->session->userdata('login') == true) {
			$this->load->view('admin/header');
			$this->load->view('secretarias/cultura_capacitacion');
			$this->load->view('layout/footer');
		}elseif ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('secretarias/cultura_capacitacion');
			$this->load->view('layout/footer');
		}else{
			$this->load->view('layout/header');
			$this->load->view('secretarias/cultura_capacitacion');
			$this->load->view('layout/footer');
		}
	}

	public function deporte()
	{
		if ($this->session->userdata('login') == true) {
			$this->load->view('admin/header');
			$this->load->view('secretarias/deporte');
			$this->load->view('layout/footer');
		}elseif ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('secretarias/deporte');
			$this->load->view('layout/footer');
		}else{
			$this->load->view('layout/header');
			$this->load->view('secretarias/deporte');
			$this->load->view('layout/footer');
		}
	}

	public function igualdad()
	{
		if ($this->session->userdata('login') == true) {
			$this->load->view('admin/header');
			$this->load->view('secretarias/igualdad');
			$this->load->view('layout/footer');
		}elseif ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('secretarias/igualdad');
			$this->load->view('layout/footer');
		}else{
			$this->load->view('layout/header');
			$this->load->view('secretarias/igualdad');
			$this->load->view('layout/footer');
		}
	}
}
?>