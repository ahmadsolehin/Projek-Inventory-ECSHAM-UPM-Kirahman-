<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bacteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user/Bacteria_model','bacteria');
	}

	public function index()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('bacteria_view', $data);
	}

	public function ajax_list($x) //x nie ialah table
	{
		//print_r($x);
		
		$list = $this->bacteria->get_datatables($x);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $bacteria) {
			$no++;
			$row = array();
			$row[] = $bacteria->Genus_Name;
			$row[] = $bacteria->Species_Name;
			$row[] = $bacteria->Subspecies_Name;
			$row[] = $bacteria->Strain_Global_ID;
			$row[] = $bacteria->Main_Strain_Local_ID;
			$row[] = $bacteria->Depository_Status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_bacteria('."'".$bacteria->id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->bacteria->count_all($x),
			"recordsFiltered" => $this->bacteria->count_filtered($x),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}

public function list_all_type_Strain(){

	$output = $this->bacteria->list_all_type_Strain();
	echo json_encode($output);
}

public function list_Bacteria_by_id($id, $strain){

	$data['jenis_strain'] = $strain;
	$data['output'] = $this->bacteria->get_by_id($id, $strain);


	foreach ($data['output'] as $val) {

		if ($val->Depository_Status == 'Save') {
			echo 'save';
		}else if ($val->Depository_Status == 'Public') {

			if ( $val->canister == ''){
				$this->load->view('user/view_strain_Freeze', $data);
			}else if( $val->Row == ''){
				$this->load->view('user/view_strain_Cryo', $data);
			}
		}

	}
}

}

