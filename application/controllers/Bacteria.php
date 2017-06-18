<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bacteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Bacteria_model','bacteria');
	}

	public function index()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('bacteria_view', $data);
	}
	public function config()
	{
		if ($this->session->userdata('email') == '') //utk security..
		{
			redirect('/login/form/', 'refresh');
		}

		$this->load->view('configure_test');
	}
	public function Load_Add_Data_Strain()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('TabPaneAddStrain', $data);
	}
	public function Load_AddToCryo()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('AddData_Strain_Cryo', $data);
	}
	public function Load_AddToFreezeDry()
	{
		$data['jenis'] =  $this->uri->segment(3);
		$this->load->view('AddData_Strain_Freeze', $data);
	}

	public function Compare_Location_Detail()
	{
		$this->bacteria->Compare_Location_Detail();
		echo json_encode(array("status" => TRUE));	
	}


	public function test()
	{

		date_default_timezone_set('Asia/Kuala_Lumpur');

		$jenis_strain = $this->input->post('id'); //nama table nak letak nnti

		if($_FILES['userfile']['size'] == 0)
		{

			$path = 'nophoto.jpg';             //ni utk letak path dlm db

			$c = $this->input->post('Lokasi_CanisterLoadAjax');
			$d = $this->input->post('Lokasi_BoxesLoadAjax');
			$e = $this->input->post('location_detail');

			$sumlokasi = "C"."-"."T1"."-"."$c"."-"."$d"."-"."$e";

			$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date('l jS \of F Y h:i:s A'),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),				
				'Jenis_Strain' => $jenis_strain,
				);

//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 1 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);
}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid. '' .$random. '.'.$ext;  //ni utk letak path dlm db

$c = $this->input->post('Lokasi_CanisterLoadAjax');
$d = $this->input->post('Lokasi_BoxesLoadAjax');
$e = $this->input->post('location_detail');

$sumlokasi = "C"."-"."T1"."-"."$c"."-"."$d"."-"."$e";

$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),			
				'Jenis_Strain' => $jenis_strain,
	);

//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 1 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);
//move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/' . $_FILES['userfile']['name']);


$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);

}

}

public function test2()
{
			date_default_timezone_set('Asia/Kuala_Lumpur');

		$jenis_strain = $this->input->post('id'); //nama table nak letak nnti

		if($_FILES['userfile']['size'] == 0)
		{

			$path = 'nophoto.jpg';             //ni utk letak path dlm db

			$c = $this->input->post('Lokasi_RowLoadAjax');
			$d = $this->input->post('location_detail');

			$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

			$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => '',
				'boxes' => '',
				'Row' => $this->input->post('Lokasi_RowLoadAjax'),
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date('l jS \of F Y h:i:s A'),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),				
				'Jenis_Strain' => $jenis_strain,
				);

//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 2 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);
}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid. '' .$random. '.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_RowLoadAjax');
$d = $this->input->post('location_detail');

$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

	'Lokasi' => $this->input->post('Lokasi'),
	'canister' => '',
	'boxes' => '',
	'Row' => $this->input->post('Lokasi_RowLoadAjax'),
	'Location_Detail' => $this->input->post('location_detail'),
	'Summary_Lokasi' => $sumlokasi,


	'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date('l jS \of F Y h:i:s A'),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
	);

//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 2 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);
//move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/' . $_FILES['userfile']['name']);


$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);

}

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
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_bacteria('."'".$bacteria->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_bacteria('."'".$bacteria->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
			<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_bacteria('."'".$bacteria->id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';


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

	public function ajax_edit($id, $strain)
	{
		$data['jenis'] = $strain;
		$data['id'] = $id;
		$data['output'] = $this->bacteria->get_by_id_Baru($id, $strain);
		$this->load->view('edit_strain', $data);
	}

	public function ajax_edit_Baru($id, $strain)
	{
		$data['jenis'] = $strain;
		$data['id'] = $id;
		$data['output'] = $this->bacteria->get_by_id_Baru($id, $strain);

		foreach ($data['output'] as $val) {
			if ( $val->canister == ''){
				$this->load->view('EditData_Strain_Freeze',$data);
			}else if( $val->Row == ''){
				$this->load->view('EditData_Strain_Cryo',$data);
			}
		}

	}





public function ajax_delete($id, $strain)
{
	$path = $this->bacteria->getPathImage($id,$strain);

	if ($path == 'nophoto.jpg') {
	
	}else{
		unlink(FCPATH . '/uploads/' . $path);		
	}

	$this->bacteria->delete_by_id($id, $strain);
	echo json_encode(array("status" => TRUE));
}

public function list_Bacteria_by_id($id, $strain){

	$data['id'] = $id;
	$data['jenis_strain'] = $strain;
	$data['output'] = $this->bacteria->get_by_id($id, $strain);
	foreach ($data['output'] as $val) {
		if ( $val->canister == ''){
			$this->load->view('view_strain_Freeze', $data);
		}else if( $val->Row == ''){
			$this->load->view('view_strain_Cryo', $data);
		}
	}
}

public function list_all_type_Strain(){

	$output = $this->bacteria->list_all_type_Strain();
	echo json_encode($output);
}

public function list_all_location(){

	$output = $this->bacteria->list_all_location();
	echo json_encode($output);
}

public function list_all_location_unit(){

	$output = $this->bacteria->list_all_location_unit();
	echo json_encode($output);
}

public function list_all_location_one(){

	$output = $this->bacteria->list_all_location_one();
	echo json_encode($output);
}

public function list_all_location_two(){

	$output = $this->bacteria->list_all_location_two();
	echo json_encode($output);
}

public function list_Summary_All_Strain(){

	$output = $this->bacteria->list_Summary_All_Strain();
	echo json_encode($output);
}

public function add_type_Strain(){

	$data = array(
		'type_strain' => $this->input->post('strain_type'),
		);
	$insert = $this->bacteria->save_type_strain($data);
	echo json_encode(array("status" => TRUE));
}

public function add_location(){

	$data = array(
		'location' => $this->input->post('Lokasi'),
		);
	$insert = $this->bacteria->save_location($data);
	echo json_encode(array("status" => TRUE));
}

public function add_location_unit(){

	$data = array(
		'location_unit' => $this->input->post('Lokasi_unit'),
		);
	$insert = $this->bacteria->save_location_unit($data);
	echo json_encode(array("status" => TRUE));
}

public function edit_type_Strain($id){
	$data = $this->bacteria->get_by_id_type_Strain($id);
	echo json_encode($data);
}

public function edit_location($id){
	$data = $this->bacteria->get_by_id_location($id);
	echo json_encode($data);
}
public function edit_location_unit($id){
	$data = $this->bacteria->get_by_id_location_unit($id);
	echo json_encode($data);
}
public function update_type_Strain($strain)
{
	$data = array(
		'type_strain' => $this->input->post('edit_strain_type'),
		);
	$this->bacteria->update_type_Strain(array('id' => $this->input->post('id')), $data, $strain);
	echo json_encode(array("status" => TRUE));
}
public function update_location()
{
	$data = array(
		'location' => $this->input->post('Lokasi_edittable'),
		);
	$this->bacteria->update_location(array('id' => $this->input->post('id')), $data);
	echo json_encode(array("status" => TRUE));
}
public function update_location_unit()
{
	$data = array(
		'location_unit' => $this->input->post('Lokasi_unit_edittable'),
		);
	$this->bacteria->update_location_unit(array('id' => $this->input->post('id')), $data);
	echo json_encode(array("status" => TRUE));
}
public function Delete_type_Strain($id)
{
	$this->bacteria->delete_by_id_type_Strain($id);
	echo json_encode(array("status" => TRUE));
}
public function Delete_location($id)
{
	$this->bacteria->delete_by_id_location($id);
	echo json_encode(array("status" => TRUE));
}
public function Delete_location_unit($id)
{
	$this->bacteria->delete_by_id_location_unit($id);
	echo json_encode(array("status" => TRUE));
}


public function ajax_update_Cryo()
{
	$jenis_strain = $this->input->post('id');
	$namaImage = $this->input->post('namaImage'); 

	if($_FILES['userfile']['size'] == 0)
	{

			//$path = 'images/noimages.png';             //ni utk letak path dlm db

		$c = $this->input->post('Lokasi_CanisterLoadAjax');
		$d = $this->input->post('Lokasi_BoxesLoadAjax');
		$e = $this->input->post('location_detail');

		$sumlokasi = "C" ."-".  "T1" ."-". "$c" ."-". "$d" ."-". "$e";
		$data = array(

			'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $namaImage,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
			);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);
}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid.''.$random.'.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_CanisterLoadAjax');
$d = $this->input->post('Lokasi_BoxesLoadAjax');
$e = $this->input->post('location_detail');

$sumlokasi = "C" ."-".  "T1" ."-". "$c" ."-". "$d" ."-". "$e";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
	);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);

if($namaImage == 'nophoto.jpg')
{

}else{
	unlink(FCPATH . '/uploads/' . $namaImage);
}

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);

}

}

public function ajax_update_Freeze()
{
	$jenis_strain = $this->input->post('id');
	$namaImage = $this->input->post('namaImage'); 

	if($_FILES['userfile']['size'] == 0)
	{

		$c = $this->input->post('Lokasi_RowLoadAjax');
		$d = $this->input->post('location_detail');

		$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";
		$data = array(

			'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

			'Lokasi' => $this->input->post('Lokasi'),
			'canister' => '',
			'boxes' => '',
			'Row' => $this->input->post('Lokasi_RowLoadAjax'),
			'Location_Detail' => $this->input->post('location_detail'),
			'Summary_Lokasi' => $sumlokasi,

			'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $namaImage,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
			);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);
}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid.''.$random.'.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_RowLoadAjax');
$d = $this->input->post('location_detail');

$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

	'Lokasi' => $this->input->post('Lokasi'),
	'canister' => '',
	'boxes' => '',
	'Row' => $this->input->post('Lokasi_RowLoadAjax'),
	'Location_Detail' => $this->input->post('location_detail'),
	'Summary_Lokasi' => $sumlokasi,

	'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
	);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);

if($namaImage == 'nophoto.jpg')
{

}else{
	unlink(FCPATH . '/uploads/' . $namaImage);
}

$output['jenis'] = $jenis_strain;
$this->load->view('bacteria_view', $output);

}

}









	public function Add_Data_To_Db_Cryo()
	{

		date_default_timezone_set('Asia/Kuala_Lumpur');

		$jenis_strain = $this->input->post('id'); //nama table nak letak nnti

		if($_FILES['userfile']['size'] == 0)
		{

			$path = 'nophoto.jpg';             //ni utk letak path dlm db

			$c = $this->input->post('Lokasi_CanisterLoadAjax');
			$d = $this->input->post('Lokasi_BoxesLoadAjax');
			$e = $this->input->post('location_detail');

			$sumlokasi = "C"."-"."T1"."-"."$c"."-"."$d"."-"."$e";

			$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date('l jS \of F Y h:i:s A'),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),				
				'Jenis_Strain' => $jenis_strain,
				);


//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 1 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);

$lembu['canister'] = $this->input->post('Lokasi_CanisterLoadAjax');
$lembu['boxes'] = $this->input->post('Lokasi_BoxesLoadAjax');
$this->load->view('Data_Matrix', $lembu);
}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid. '' .$random. '.'.$ext;  //ni utk letak path dlm db

$c = $this->input->post('Lokasi_CanisterLoadAjax');
$d = $this->input->post('Lokasi_BoxesLoadAjax');
$e = $this->input->post('location_detail');

$sumlokasi = "C"."-"."T1"."-"."$c"."-"."$d"."-"."$e";

$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),			
				'Jenis_Strain' => $jenis_strain,
	);

//utk tau latest data Cryo
$dataLocal = array(
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
			);
$this->bacteria->update(array('id' => 1 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);
//move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/' . $_FILES['userfile']['name']);

$lembu['canister'] = $this->input->post('Lokasi_CanisterLoadAjax');
$lembu['boxes'] = $this->input->post('Lokasi_BoxesLoadAjax');
$this->load->view('Data_Matrix', $lembu);

}

}


public function Add_Data_To_Db_Freeze()
{
	date_default_timezone_set('Asia/Kuala_Lumpur');

		$jenis_strain = $this->input->post('id'); //nama table nak letak nnti

		if($_FILES['userfile']['size'] == 0)
		{

			$path = 'nophoto.jpg';             //ni utk letak path dlm db

			$c = $this->input->post('Lokasi_RowLoadAjax');
			$d = $this->input->post('location_detail');

			$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

			$data = array(

				'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => '',
				'boxes' => '',
				'Row' => $this->input->post('Lokasi_RowLoadAjax'),
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date('l jS \of F Y h:i:s A'),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),				
				'Jenis_Strain' => $jenis_strain,
				);

//utk tau latest data Cryo
$dataLocal = array(
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
	);
$this->bacteria->update(array('id' => 2 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);

$lembu['row'] = $this->input->post('Lokasi_RowLoadAjax');
$this->load->view('Data_Matrix_Refri', $lembu);

}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid. '' .$random. '.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_RowLoadAjax');
$d = $this->input->post('location_detail');

$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

	'Lokasi' => $this->input->post('Lokasi'),
	'canister' => '',
	'boxes' => '',
	'Row' => $this->input->post('Lokasi_RowLoadAjax'),
	'Location_Detail' => $this->input->post('location_detail'),
	'Summary_Lokasi' => $sumlokasi,


	'Genus_Name' => $this->input->post('Genus_Name'),
	'Species_Name' => $this->input->post('Species_Name'),
	'Subspecies_Name' => $this->input->post('Subspecies_Name'),

	'Original_Code' => $this->input->post('Original_Code'),

	'Sequence_Method' => $this->input->post('Sequence_Method'),
	'Sequence_Time' => $this->input->post('Sequence_Time'),

	'Author' => $this->input->post('Author'),
	'year' => $this->input->post('year'),
	'month' => $this->input->post('month'),
	'day' => $this->input->post('day'),

	'History_of_Deposit' => $this->input->post('History_of_Deposit'),
	'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
	'Geographic_Origin' => $this->input->post('Geographic_Origin'),
	'latitude' => $this->input->post('latitude'),
	'longitude' => $this->input->post('longitude'),
	'Status' => $this->input->post('Status'),
	'Type_Strain' => $this->input->post('Type_Strain'),

	'Optimum_Temp' => $this->input->post('Optimum_Temp'),
	'Maximum_Temp' => $this->input->post('Maximum_Temp'),
	'Minimum_Temp' => $this->input->post('Minimum_Temp'),

	'Literature' => $this->input->post('Literature'),
	'Application' => $this->input->post('Application'),
	'Image' => $path,
	'Description' => $this->input->post('Description'),
	'Sequence_Type' => $this->input->post('Sequence_Type'),
	'Sequence' => $this->input->post('Sequence'),

	'Medium_Name' => $this->input->post('Medium_Name'),
	'Medium_Composition' => $this->input->post('Medium_Composition'),
	'Sequence_Length' => $this->input->post('Sequence_Length'),

	'Primer' => $this->input->post('Primer'),
	'Depository_Status' => $this->input->post('Depository_Status'),
	'Harga' => $this->input->post('Price'),
	'time_now' => date('l jS \of F Y h:i:s A'),
	'Curent_Timestamp' => date("Y-m-d H:i:s"),
	'Jenis_Strain' => $jenis_strain,
	);

//utk tau latest data Cryo
$dataLocal = array(
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),
	);
$this->bacteria->update(array('id' => 2 ), $dataLocal, 'datanewcryo');

$insert = $this->bacteria->save($data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);
//move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/' . $_FILES['userfile']['name']);


$lembu['row'] = $this->input->post('Lokasi_RowLoadAjax');
$this->load->view('Data_Matrix_Refri', $lembu);

}

}



public function update_Cryo_From_Matrix()
{
	$jenis_strain = $this->input->post('id');
	$namaImage = $this->input->post('namaImage'); 

	if($_FILES['userfile']['size'] == 0)
	{

			//$path = 'images/noimages.png';             //ni utk letak path dlm db

		$c = $this->input->post('Lokasi_CanisterLoadAjax');
		$d = $this->input->post('Lokasi_BoxesLoadAjax');
		$e = $this->input->post('location_detail');

		$sumlokasi = "C" ."-".  "T1" ."-". "$c" ."-". "$d" ."-". "$e";
		$data = array(

			'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $namaImage,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
			);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);

$lembu['canister'] = $this->input->post('Lokasi_CanisterLoadAjax');
$lembu['boxes'] = $this->input->post('Lokasi_BoxesLoadAjax');
$this->load->view('Data_Matrix', $lembu);

}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid.''.$random.'.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_CanisterLoadAjax');
$d = $this->input->post('Lokasi_BoxesLoadAjax');
$e = $this->input->post('location_detail');

$sumlokasi = "C" ."-".  "T1" ."-". "$c" ."-". "$d" ."-". "$e";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
				'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

				'Lokasi' => $this->input->post('Lokasi'),
				'canister' => $this->input->post('Lokasi_CanisterLoadAjax'),
				'boxes' => $this->input->post('Lokasi_BoxesLoadAjax'),
				'Row' => '',
				'Location_Detail' => $this->input->post('location_detail'),
				'Summary_Lokasi' => $sumlokasi,

				'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
	);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);

if($namaImage == 'nophoto.jpg')
{

}else{
	unlink(FCPATH . '/uploads/' . $namaImage);
}


$lembu['canister'] = $this->input->post('Lokasi_CanisterLoadAjax');
$lembu['boxes'] = $this->input->post('Lokasi_BoxesLoadAjax');
$this->load->view('Data_Matrix', $lembu);
}

}

public function update_Freeze_From_Matrix()
{
	$jenis_strain = $this->input->post('id');
	$namaImage = $this->input->post('namaImage'); 

	if($_FILES['userfile']['size'] == 0)
	{

		$c = $this->input->post('Lokasi_RowLoadAjax');
		$d = $this->input->post('location_detail');

		$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";
		$data = array(

			'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
			'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

			'Lokasi' => $this->input->post('Lokasi'),
			'canister' => '',
			'boxes' => '',
			'Row' => $this->input->post('Lokasi_RowLoadAjax'),
			'Location_Detail' => $this->input->post('location_detail'),
			'Summary_Lokasi' => $sumlokasi,

			'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $namaImage,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
			);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);

$lembu['row'] = $this->input->post('Lokasi_RowLoadAjax');
$this->load->view('Data_Matrix_Refri', $lembu);

}
else
{

$dirname = $_FILES['userfile']['name'];    //ni utk amek name img
$ext = pathinfo($dirname, PATHINFO_EXTENSION); //amek .png, .jpg

$uniqid = uniqid();
$random = rand();
$path = $uniqid.''.$random.'.'.$ext;  //ni utk letak path dlm db


$c = $this->input->post('Lokasi_RowLoadAjax');
$d = $this->input->post('location_detail');

$sumlokasi = "F"."-". "RG1"."-"."$c"."-"."$d";

$data = array(

	'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
	'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

	'Lokasi' => $this->input->post('Lokasi'),
	'canister' => '',
	'boxes' => '',
	'Row' => $this->input->post('Lokasi_RowLoadAjax'),
	'Location_Detail' => $this->input->post('location_detail'),
	'Summary_Lokasi' => $sumlokasi,

	'Genus_Name' => $this->input->post('Genus_Name'),
				'Species_Name' => $this->input->post('Species_Name'),
				'Subspecies_Name' => $this->input->post('Subspecies_Name'),

				'Original_Code' => $this->input->post('Original_Code'),

				'Sequence_Method' => $this->input->post('Sequence_Method'),
				'Sequence_Time' => $this->input->post('Sequence_Time'),

				'Author' => $this->input->post('Author'),
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'day' => $this->input->post('day'),

				'History_of_Deposit' => $this->input->post('History_of_Deposit'),
				'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
				'Geographic_Origin' => $this->input->post('Geographic_Origin'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'Status' => $this->input->post('Status'),
				'Type_Strain' => $this->input->post('Type_Strain'),

				'Optimum_Temp' => $this->input->post('Optimum_Temp'),
				'Maximum_Temp' => $this->input->post('Maximum_Temp'),
				'Minimum_Temp' => $this->input->post('Minimum_Temp'),

				'Literature' => $this->input->post('Literature'),
				'Application' => $this->input->post('Application'),
				'Image' => $path,
				'Description' => $this->input->post('Description'),
				'Sequence_Type' => $this->input->post('Sequence_Type'),
				'Sequence' => $this->input->post('Sequence'),

				'Medium_Name' => $this->input->post('Medium_Name'),
				'Medium_Composition' => $this->input->post('Medium_Composition'),
				'Sequence_Length' => $this->input->post('Sequence_Length'),

				'Primer' => $this->input->post('Primer'),
				'Depository_Status' => $this->input->post('Depository_Status'),
				'Harga' => $this->input->post('Price'),
				'time_now' => date("Y-m-d"),
				'Curent_Timestamp' => date("Y-m-d H:i:s"),
				'Jenis_Strain' => $jenis_strain,
	);


$this->bacteria->update(array('id' => $this->input->post('idStrain')), $data, $jenis_strain);
move_uploaded_file($_FILES['userfile']['tmp_name'], './uploads/'.$uniqid.''.$random. '.'.$ext);

if($namaImage == 'nophoto.jpg')
{

}else{
	unlink(FCPATH . '/uploads/' . $namaImage);
}

$lembu['row'] = $this->input->post('Lokasi_RowLoadAjax');
$this->load->view('Data_Matrix_Refri', $lembu);

}

}

}
