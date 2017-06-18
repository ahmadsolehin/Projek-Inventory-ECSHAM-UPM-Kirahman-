<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_Strain_Controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Type_Strain_model','person');
  }

  public function index()
  {
    $this->load->helper('url');
    $this->load->view('type_Strain_view');
  }

  public function ajax_list()
  {
    $list = $this->person->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $person) {
      $no++;
      $row = array();
      $row[] = $person->id;
      $row[] = $person->type_strain;

            //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_type('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
      <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_type('."'".$person->id."'".', '."'".$person->type_strain."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->person->count_all(),
      "recordsFiltered" => $this->person->count_filtered(),
      "data" => $data,
      );
        //output to json format
    echo json_encode($output);
  }

  public function ajax_edit($id)
  {
    $data = $this->person->get_by_id($id);
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $name = $this->input->post('strain_type');

    $data = array(
      'type_strain' => $this->input->post('strain_type'),
      );
    $this->load->database();

    $this->load->dbforge();
    $fields = array(
      'id' => array(
       'type' => 'INT',
       'constraint' => 5, 
       'unsigned' => TRUE,
       'auto_increment' => TRUE
       ),
      'Strain_Global_ID' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Main_Strain_Local_ID' => array(
       'type' =>'VARCHAR',
       'constraint' => '255',
       ),
      'Lokasi' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'canister' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'boxes' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Row' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Location_Detail' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Summary_Lokasi' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Genus_Name' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Species_Name' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Subspecies_Name' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Original_Code' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Sequence_Method' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Sequence_Time' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Author' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'year' => array(
       'type' => 'YEAR',
       'constraint' => '4',
       ),
      'month' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'day' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'History_of_Deposit' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Source_of_Isolation' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Geographic_Origin' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'latitude' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'longitude' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Status' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Type_Strain' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Optimum_Temp' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Maximum_Temp' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Minimum_Temp' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Literature' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Application' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Image' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Description' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Sequence_Type' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Sequence' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Medium_Name' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Medium_Composition' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Optimum_Temp' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Sequence_Length' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Primer' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Depository_Status' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Harga' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'time_now' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      'Curent_Timestamp' => array(
       'type' => 'DATE',
       ),
      'Jenis_Strain' => array(
       'type' => 'VARCHAR',
       'constraint' => '255',
       ),
      );
$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table($name);

$insert = $this->person->save($data);
echo json_encode(array("status" => TRUE));
}

public function ajax_update()
{
  $this->_validate();
  $data = array(
    'type_strain' => $this->input->post('strain_type'),
    );
  $this->person->update(array('id' => $this->input->post('id')), $data);

        $lama = $this->input->post('jenis_strain'); //name db lama
        $baru = $this->input->post('strain_type'); //name db baru

        $this->load->database();

        $this->load->dbforge();
        $this->dbforge->rename_table($lama, $baru);

        echo json_encode(array("status" => TRUE));
      }

      public function ajax_delete($id, $strain)
      {
        $this->person->delete_by_id($id);

        $this->load->database();
        $this->load->dbforge();
        $this->dbforge->drop_table($strain);

        echo json_encode(array("status" => TRUE));
      }


      private function _validate()
      {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('strain_type') == '')
        {
          $data['inputerror'][] = 'strain_type';
          $data['error_string'][] = 'name is required';
          $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
          echo json_encode($data);
          exit();
        }
      }

    }
