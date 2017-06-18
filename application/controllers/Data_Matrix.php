<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Matrix extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_Matrix_Model','matrix');
	}

	public function list_Canister_Dalam_Type_Canister($jenis){

		$output = $this->matrix->list_Canister_Dalam_Type_Canister($jenis);
		echo json_encode($output);
	}

	public function list_Boxes_Dalam_Type_Boxes($jenis)
	{
		$output = $this->matrix->list_Boxes_Dalam_Type_Boxes($jenis);
		echo json_encode($output);
	}

	public function list_Row($jenis)
	{
		$output = $this->matrix->list_Row($jenis);
		echo json_encode($output);
	}

	public function Create_Table_Matrix(){

		$a = $this->input->post('pilihanCanister');
		$b = $this->input->post('pilihanBox');

		$output =  $this->matrix->Create_Table_Matrix($a,$b);
		echo json_encode($output);
	}

	public function Create_Table_Matrix_Refri(){

		$a = $this->input->post('pilihanRow');
		$output = $this->matrix->Create_Table_Matrix_Refri($a);
		echo json_encode($output);
	}

	public function LoadDataMatrix_Tank1()
	{		
		$x = 'matrix_tank1';
		$this->ajax_listDataMatrix('matrix_tank1');
	}

	public function LoadDataMatrix_Refri()
	{		
		$x = 'matrix_refrigerator';
		$this->ajax_listDataMatrix_Refri('matrix_refrigerator');
	}

	public function ajax_listDataMatrix($x) //x nie ialah table
	{
		//print_r($x);
		$list = $this->matrix->get_datatables($x);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $matrix) {
			$no++;
			$row = array();
			$row[] = $matrix->id;
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->one1.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->two2.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->three3.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->four4.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->five5.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->six6.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->seven7.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->eight8.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->nine9.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->ten10.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->eleven11.'</button>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->matrix->count_all($x),
			"recordsFiltered" => $this->matrix->count_filtered($x),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}


	public function ajax_listDataMatrix_Refri($x) //x nie ialah table
	{
		//print_r($x);
		
		$list = $this->matrix->get_datatables2($x);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $matrix) {
			$no++;
			$row = array();
			$row[] = $matrix->id;
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->one1.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->two2.'</button>';
			$row[] = '<button type="button" class="btn btn-link">'.$matrix->three3.'</button>';
			$row[] = '<button type="button" id = "harun" class="btn btn-link">'.$matrix->four4.'</button>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->matrix->count_all($x),
			"recordsFiltered" => $this->matrix->count_filtered2($x),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}


	public function list_Bacteria_From_Matrix_Freeze(){

		$localid = $this->input->post('localid');
		$row = $this->input->post('row');
		$location = $this->input->post('location');


		$data['output'] = $this->matrix->get_by_id_Freeze($localid, $row, $location);

		foreach ($data['output'] as $val) {
			if ( $val->canister == ''){
				$this->load->view('EditData_Strain_Freeze_From_Matrix', $data);
			}else if( $val->Row == ''){
				$this->load->view('EditData_Strain_Freeze_From_Matrix', $data);
			}
		}
	//echo json_encode($data);
	}

	public function list_Bacteria_From_Matrix_Cryo()
	{

		$localid = $this->input->post('localid');
		$canister = $this->input->post('canister');
		$boxes = $this->input->post('boxes');
		$location = $this->input->post('location');

		$data['output'] = $this->matrix->get_by_id_Cryo($localid, $canister, $boxes, $location);

		foreach ($data['output'] as $val) {
			if ( $val->canister == ''){
				$this->load->view('EditData_Strain_Freeze_From_Matrix', $data);
			}else if( $val->Row == ''){
				$this->load->view('EditData_Strain_Cryo_From_Matrix', $data);
			}
		}

	}

	public function RedirectTo_AddStrain_Cryo()
	{

		$canister = $this->input->post('canister');
		$boxes = $this->input->post('boxes');
		$location = $this->input->post('location');

		$data = array(
			'canister' => $canister,
			'boxes' => $boxes,
			'location' => $location
			);

		$this->load->view('AddData_Strain_based_on_Location', $data);
	}

	public function RedirectTo_AddStrain_Freeze()
	{
		$row = $this->input->post('row');
		$location = $this->input->post('location');

		$data = array(
			'row' => $row,
			'location' => $location
			);

		$this->load->view('AddData_Strain_Freeze_based_on_Location', $data);
	}

	


}

?>