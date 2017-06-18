<?php

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Bacteria_model','bacteria');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{

		$strain = $this->input->post('id');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{

$data=$this->upload->data();
	     	$url = "uploads/".$data['raw_name'].''.$data['file_ext'];

			$a = $this->input->post('Lokasi');
				$b = $this->input->post('Lokasi_Unit');
				$c = $this->input->post('Lokasi_Box');
				$d = $this->input->post('Lokasi_Subbox');

				$sumlokasi = "$a" ."/".  "$b" ."-". "$c" ."-". "$d";

				$data = array(

					'Strain_Global_ID' => $this->input->post('Strain_Global_ID'),
					'Main_Strain_Local_ID' => $this->input->post('Main_Strain_Local_ID'),

					'Lokasi' => $this->input->post('Lokasi'),
					'Lokasi_Unit' => $this->input->post('Lokasi_Unit'),
					'Lokasi_Box' => $this->input->post('Lokasi_Box'),
					'Lokasi_Subbox' => $this->input->post('Lokasi_Subbox'),
					'Summary_Lokasi' => $sumlokasi,

					'Genus_Name' => $this->input->post('Genus_Name'),
					'Species_Name' => $this->input->post('Species_Name'),
					'Subspecies_Name' => $this->input->post('Subspecies_Name'),

					'Original_Code' => $this->input->post('Original_Code'),
					'Organism_Type' => $this->input->post('Organism_Type'),

					'Sequence_Method' => $this->input->post('Sequence_Method'),
					'Sequence_Time' => $this->input->post('Sequence_Time'),

					'Author' => $this->input->post('Author'),
					'Date_of_Isolation' => $this->input->post('Date_of_Isolation'),

					'History_of_Deposit' => $this->input->post('History_of_Deposit'),
					'Source_of_Isolation' => $this->input->post('Source_of_Isolation'),
					'Geographic_Origin' => $this->input->post('Geographic_Origin'),
					'Status' => $this->input->post('Status'),
					'Type_Strain' => $this->input->post('Type_Strain'),

					'Optimum_Temp' => $this->input->post('Optimum_Temp'),
					'Maximum_Temp' => $this->input->post('Maximum_Temp'),
					'Minimum_Temp' => $this->input->post('Minimum_Temp'),

					'Literature' => $this->input->post('Literature'),
					'Application' => $this->input->post('Application'),
					'Image' => $url,
					'Description' => $this->input->post('Description'),
					'Sequence_Type' => $this->input->post('Sequence_Type'),
					'Sequence' => $this->input->post('Sequence'),

					'Medium_Name' => $this->input->post('Medium_Name'),
					'Medium_Composition' => $this->input->post('Medium_Composition'),
					'Sequence_Length' => $this->input->post('Sequence_Length'),

					'Primer' => $this->input->post('Primer'),
					'Harga' => $this->input->post('Harga'),
					);
$insert = $this->bacteria->save($data, $strain);
echo json_encode(array("status" => TRUE));
	//}

   redirect('/admin_menu', 'refresh');
			
		}
	}
}
?>