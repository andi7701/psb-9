<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('Guru_model');
	}
	public function index($value='')
	{
		# code...
	}
	public function login($value='')
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$where = array('email' => $this->input->post('email'),'password'=>md5($this->input->post('password')));
			$res = $this->Guru_model->getWhere($where);
			if ($res->num_rows() > 0) {
				$this->session->set_userdata('adminpsb',$res->result()[0]);
				redirect('Dashboard','refresh');
			}else{
				$info ='<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Maaf!</strong> Nomor Seluler atau Password yang anda masukan salah. </div>';
				$this->session->set_flashdata('info',$info);
				redirect('Auth/login','refresh');	
			}
		}else{
			$this->load->view('admin/login');
		}
	}
	public function out($value='')
	{
		$this->session->unset_userdata('ots');
		redirect('Welcome/login','refresh');
	}

}