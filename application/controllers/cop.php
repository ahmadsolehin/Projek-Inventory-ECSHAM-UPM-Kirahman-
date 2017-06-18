<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cop extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	//	$this->load->model('Bacteria_model','bacteria');
	}
	public function index()
	{
		$this->load->view('cop');
	}
	public function in()
	{		
		$this->load->view('view_strain');
	}

}
