<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controll extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
}