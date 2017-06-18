<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu extends CI_Controller {

	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('login_page');
	}

	public function User_mainMenu()
	{
		$this->load->view('user/user_mainmenu');
	}

	public function load_Profile()
	{
		$this->load->view('User_profile');				
	}

	public function load_Person()
	{
		$this->load->view('person_view');		
	}

	public function user_bacteria()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('user_bacteria_view', $data);
	}
}
