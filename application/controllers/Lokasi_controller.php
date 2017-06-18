<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lokasi_model','lokasi');
	}

	public function Load_Data_Matrix()
	{
		$lembu['canister'] =  '';
		$lembu['boxes'] = '';
		$this->load->view('Data_Matrix', $lembu);		
	}

	public function Load_Data_Matrix_Refri()
	{
		$lembu['row'] = '';
		$this->load->view('Data_Matrix_Refri', $lembu);		
	}

	public function Load_Test()
	{
		$this->load->view('test');
	}

	public function Load_Type_Strain()
	{
		$this->load->view('type_Strain_view');
	}

	public function Load_Location_View()
	{
		$this->load->view('location');
	}

	public function Load_Preservation_Method()
	{
		$this->load->view('preservation_method');		
	}

	public function Load_Location_One()
	{
		$this->load->view('location_one');		
	}

	public function Load_Canister_Boxes()
	{
		$this->load->view('canister_boxes_test');		
	}

	public function list_all_location_canister(){

		$output = $this->lokasi->list_all_location_canister();
		echo json_encode($output);
	}

	public function list_all_location_refrigerator_canister()
	{
		$output = $this->lokasi->list_all_location_refrigerator_canister();
		echo json_encode($output);
	}

	public function list_Canister($id)
	{
		$output = $this->lokasi->list_all_Canister($id);
		$canister = $this->lokasi->list_Canister($output);
		echo json_encode($canister);
	}

	public function list_all_location_boxes()
	{
		$output = $this->lokasi->list_all_location_boxes();
		echo json_encode($output);
	}

	public function list_all_location_refrigerator_boxes()
	{
		$output = $this->lokasi->list_all_location_refrigerator_boxes();
		echo json_encode($output);
	}

	public function list_Boxes($id)
	{
		$output = $this->lokasi->list_all_Boxes($id);
		$boxes = $this->lokasi->list_Boxes($output);
		echo json_encode($boxes);
	}

	public function add_Data_location_one()
	{
		$data = array(
			'location_one' => $this->input->post('Lokasi_one'),
			'canister' => $this->input->post('canister_type'),
			'boxes' => $this->input->post('boxes_type'),
			'refrigerator_canister' => $this->input->post('refrigerator_canister_type'),
			'refrigerator_boxes' => $this->input->post('refrigerator_boxes_type'),
			);
		$insert = $this->lokasi->add_Data_location_one($data);
		echo json_encode(array("status" => TRUE));

	}

	public function OnChange_Click_Location($location_one)
	{
		$data = $this->lokasi->OnChange_Click_Location($location_one);
	    echo json_encode($data);
	}
 
	public function OnChange_Click_Location_Amek_Canister($canister_name)
	{
		$data = $this->lokasi->list_Canister($canister_name);
	    echo json_encode($data);
	}

	public function OnChange_Click_Location_Detail_Cryo($xray)
	{
		$data = $this->lokasi->list_location_detail($xray);
	    echo json_encode($data);
	}

	public function checkAvaibility()
	{
		
		$canister = $this->input->post('canister');
		$boxes = $this->input->post('boxes');
		$location = $this->input->post('location');

		$data = $this->lokasi->checkAvaibility($canister,$boxes,$location);

		if ($data == true) {
			echo '1';
		}
		else{
			echo '0';
		}
	}

	public function checkAvaibility_Freeze()
	{
		$row = $this->input->post('row');
		$location = $this->input->post('location');

		$data = $this->lokasi->checkAvaibility_Row($row,$location);

		if ($data == true) {
			echo '1';
		}
		else{
			echo '0';
		}
	}

	public function checkAvaibility_Cryo()
	{
		
		$canister = $this->input->post('canister');
		$boxes = $this->input->post('boxes');
		$location = $this->input->post('location');
		$id = $this->input->post('idStrain');

		$data = $this->lokasi->checkAvaibility_EditCanister($canister,$boxes,$location,$id);

		if ($data == true) {
			echo '1';
		}
		else{
			echo '0';
		}
	}

	public function checkAvaibility_EditFreeze()
	{
		$row = $this->input->post('row');
		$location = $this->input->post('location');
		$id = $this->input->post('idStrain');

		$data = $this->lokasi->checkAvaibility_EditRow($row,$location,$id);

		if ($data == true) {
			echo '1';
		}
		else if($data == false){
			echo '0';
		}
	}

	public function checkAvaibility_LocalId()
	{
		$localid = $this->input->post('localid');

		$data = $this->lokasi->checkAvaibility_LocalId($localid);

		if ($data == true) {
			echo '1';
		}
		else if($data == false){
			echo '0';
		}
	}

	public function checkAvaibility_EditLocalId()
	{
		$localid = $this->input->post('localid');
		$id = $this->input->post('idStrain');

		$data = $this->lokasi->checkAvaibility_EditLocalId($localid,$id);

		if ($data == true) {
			echo '1';
		}
		else if($data == false){
			echo '0';
		}
	}

	public function add_location_canister()
	{
		$data = array(
			'type_canister' => $this->input->post('canister_name'),
			);
		$insert = $this->lokasi->save_location_canister($data);

        //create table canister
		$name = $this->input->post('canister_name');
		$quantity = $this->input->post('canister_quantity');

		$this->load->database();
		$this->load->dbforge();

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5, 
				'unsigned' => TRUE,
				'auto_increment' => TRUE
				),
			'canister' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'quantity' => array(
				'type' =>'INT',
				'constraint' => '5',
				),
			);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($name);

		echo json_encode(array("status" => TRUE));
	}

	public function Delete_Location_Canister_Data($id)
	{

		$output = $this->lokasi->list_all_Canister($id);

        $this->load->database();
        $this->load->dbforge();
        $this->dbforge->drop_table($output);

		$this->lokasi->Delete_Location_Canister_Data($id);

        echo json_encode(array("status" => TRUE));
	}

	public function Edit_Location_Canister_Data($id)
	{
		$output = $this->lokasi->nak_Ambik_Semua_Data_Canister($id);
		echo json_encode($output);
	}

	public function Update_Location_Canister_Data()
	{

		$id_Type_canister = $this->input->post('id');
	    $nama_canister_lama = $this->lokasi->list_all_Canister($id_Type_canister);

		$data = array(
			'type_canister' => $this->input->post('canister_name'),
			);
		$this->lokasi->nak_Update_Nama_Canister(array('id' => $this->input->post('id')), $data);

        $baru = $this->input->post('canister_name'); //name db baru

        $this->load->database();
        $this->load->dbforge();
        $this->dbforge->rename_table($nama_canister_lama, $baru);

        echo json_encode(array("status" => TRUE));
    }

    public function datatable_listing_data_in_canister($x) //x nie ialah table
	{
		//print_r($x);
		
		$list = $this->lokasi->get_datatables_canister($x);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $canister) {
			$no++;
			$row = array();
			$row[] = $canister->canister;
			$row[] = $canister->quantity;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_bacteria('."'".$canister->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
			<a class="btn btn-sm btn-danger" href="javascript:void()" title="Delete" onclick="delete_bacteria('."'".$canister->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>
			<a class="btn btn-sm btn-default" href="javascript:void()" title="View" onclick="papar_Canister_Data('."'".$canister->id."'".')"><i class="glyphicon glyphicon-file"></i> </a>';


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lokasi->count_all_canister($x),
			"recordsFiltered" => $this->lokasi->count_filtered_canister($x),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}

	public function OnChange_Click_Location_Amek_Boxes($boxes_name)
	{
		$data = $this->lokasi->list_Boxes($boxes_name);
	    echo json_encode($data);
	}

	public function OnChange_Click_Location_Amek_Row($boxes_name)
	{
		$data = $this->lokasi->list_Boxes($boxes_name);
	    echo json_encode($data);
	}

}
