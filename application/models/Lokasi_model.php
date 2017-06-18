<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_Model extends CI_Model {

	var $table = '';
	var $column = array('canister','quantity');
	var $order = array('id' => 'desc');

	var $location_one = 'location_one';

	var $location_canister = 'type_canister';
	var $location_boxes = 'type_boxes';
	var $location_refrigerator_canister = 'type_refrigerator_canister';
	var $location_refrigerator_boxes = 'type_refrigerator_boxes';

	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}

	private function _get_datatables_query_canister($x)
	{

		$this->table = $x;
		$this->db->from($x);

		$i = 0;

        foreach ($this->column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
        	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_canister($x)
    {
    	$this->_get_datatables_query_canister($x);
    	if($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    	$query = $this->db->get();
    	return $query->result();
    }

    function count_filtered_canister($x)
    {
    	$this->_get_datatables_query_canister($x);
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    public function count_all_canister($x)
    {
    	$this->db->from($x);
    	return $this->db->count_all_results();
    }

    public function list_all_location_canister(){
    	$this->db->from($this->location_canister);
    	$query = $this->db->get();
    	return $query->result();	
    }

    public function list_all_location_refrigerator_canister()
    {
    	$this->db->from($this->location_refrigerator_canister);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function list_all_Canister($id)
    {
    	$query = $this->db->query('SELECT type_canister FROM '.$this->location_canister.' WHERE id = '.$id);
    	$row = $query->row();
    	return $row->type_canister;

    }
    public function list_Canister($canister)
    {
    	$this->db->select("*");
    	$this->db->from($canister);
    	$query = $this->db->get();        
    	return $query->result();
    }

    public function list_all_location_boxes(){
    	$this->db->from($this->location_boxes);
    	$query = $this->db->get();
    	return $query->result();	
    }

    public function list_all_location_refrigerator_boxes()
    {
    	$this->db->from($this->location_refrigerator_boxes);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function list_all_Boxes($id)
    {
    	$query = $this->db->query('SELECT type_boxes FROM '.$this->location_canister.' WHERE id = '.$id);
    	$row = $query->row();
    	return $row->type_canister;

    }
    public function list_Boxes($boxes)
    {
    	$this->db->select("*");
    	$this->db->from($boxes);
    	$query = $this->db->get();        
    	return $query->result();
    }

    public function list_location_detail($xray)
    {
        $this->db->select("*");
        $this->db->from($xray);
        $query = $this->db->get();        
        return $query->result();
    }

    public function checkAvaibility($canister,$boxes,$Location_Detail)
    {
        $cart = array();
        $query = $this->db->get('type_strain');
        foreach ($query->result() as $row)
        {
            $cart[] = $row->type_strain;
        }

        $a = preg_replace('/\s+/', '', $canister);
        $b = preg_replace('/\s+/', '', $boxes);
        $c = preg_replace('/\s+/', '', $Location_Detail);

        for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

            $this->db->select("*");
            $this->db->from($cart[$i]);
            $where = array('canister' => $a, 'boxes' => $b, 'Location_Detail' => $c);
            $this->db->where($where);
            $query = $this->db->get();

            if($query->num_rows() == 1){
                return true;
            }
            else{

            }
        }
    }

    public function checkAvaibility_EditCanister($canister,$boxes,$Location_Detail,$idStrain)
    {
        $cart = array();
        $query = $this->db->get('type_strain');
        foreach ($query->result() as $row)
        {
            $cart[] = $row->type_strain;
        }

        $a = preg_replace('/\s+/', '', $canister);
        $b = preg_replace('/\s+/', '', $boxes);
        $c = preg_replace('/\s+/', '', $Location_Detail);
        $d = preg_replace('/\s+/', '', $idStrain);

        for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

            $this->db->select("*");
            $this->db->from($cart[$i]);
            $where = array('canister' => $a, 'boxes' => $b, 'Location_Detail' => $c);
            $this->db->where($where);
            $query = $this->db->get();

            if($query->num_rows() == 1){
            foreach ($query->result() as $bow)
            {
                $idStrainDlmdb = $bow->id;
                if ($idStrainDlmdb == $d) {
                    return false;
                }else{
                    return true;
                }
            }
        }
        else{
            return false;
        }
        }
    }


    public function checkAvaibility_Row($locationRow,$Location_Detail)
    {
       $cart = array();
        $query = $this->db->get('type_strain');
        foreach ($query->result() as $row)
        {
            $cart[] = $row->type_strain;
        }

        $a = preg_replace('/\s+/', '', $locationRow);
        $b = preg_replace('/\s+/', '', $Location_Detail);

        for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

            $this->db->select("*");
            $this->db->from($cart[$i]);
            $where = array('Row' => $a, 'Location_Detail' => $b);
            $this->db->where($where);
            $query = $this->db->get();

            if($query->num_rows() == 1){
                return true;
            }
            else{

            }
        }

    }

    public function checkAvaibility_EditRow($locationRow,$Location_Detail, $idStrain)
    {
     $cart = array();
     $query = $this->db->get('type_strain');
     foreach ($query->result() as $row)
     {
        $cart[] = $row->type_strain;
    }

    $a = preg_replace('/\s+/', '', $locationRow);
    $b = preg_replace('/\s+/', '', $Location_Detail);
    $c = preg_replace('/\s+/', '', $idStrain);


    for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

        $this->db->select("*");
        $this->db->from($cart[$i]);
        $where = array('Row' => $a, 'Location_Detail' => $b);
        $this->db->where($where);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            foreach ($query->result() as $bow)
            {
                $idStrainDlmdb = $bow->id;
                if ($idStrainDlmdb == $c) {
                    return false;
                }else{
                    return true;
                }
            }
        }
        else{
            return false;
        }
    }

}

public function checkAvaibility_LocalId($localid)
{
   $cart = array();
   $query = $this->db->get('type_strain');
   foreach ($query->result() as $row)
   {
    $cart[] = $row->type_strain;
}

$local_id = preg_replace('/\s+/', '', $localid);


for ($i=0; $i < count($cart) ; $i++) { 

    $this->db->select("*");
    $this->db->from($cart[$i]);
    $where = array('Main_Strain_Local_ID' => $local_id);
    $this->db->where($where);
    $query = $this->db->get();

    if($query->num_rows() == 1){
        return true;
    }
    else{

    }
}

}

public function checkAvaibility_EditLocalId($localid, $idStrain)
{
    $cart = array();
     $query = $this->db->get('type_strain');
     foreach ($query->result() as $row)
     {
        $cart[] = $row->type_strain;
    }

    $local_id = preg_replace('/\s+/', '', $localid);
    $id = preg_replace('/\s+/', '', $idStrain);

    for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

        $this->db->select("*");
        $this->db->from($cart[$i]);
        $where = array('Main_Strain_Local_ID' => $local_id);
        $this->db->where($where);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            foreach ($query->result() as $bow)
            {
                $idStrainDlmdb = $bow->id;
                if ($idStrainDlmdb == $id) {
                    return false;
                }else{
                    return true;
                }
            }
        }
        else{
            return false;
        }
    }
}


    public function list_Row($boxes)
    {
        $this->db->select("*");
        $this->db->from($boxes);
        $query = $this->db->get();        
        return $query->result();
    }

    public function add_Data_location_one($data)
    {
    	$this->db->insert($this->location_one, $data);
    	return $this->db->insert_id();
    }

    public function OnChange_Click_Location($location_one)
    {
    	$this->db->from($this->location_one);
    	$this->db->where('location_one',$location_one);
    	$query = $this->db->get();
    	return $query->row();
    }

    public function save_location_canister($data)
    {
    	$this->db->insert($this->location_canister, $data);
    	return $this->db->insert_id();
    }

    public function Delete_Location_Canister_Data($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete($this->location_canister);
    }

    public function nak_Ambik_Semua_Data_Canister($id) 
    {
    	$this->db->from($this->location_canister);
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	return $query->row();
    }

    public function nak_Update_Nama_Canister($where, $data)
    {
    	$this->db->update($this->location_canister, $data, $where);
    	return $this->db->affected_rows();
    }

}  































/*
public function list_location_detail($xray,$x,$y)
    {
        $loc_Detail = array();
        $this->db->select('location_detail');
        $this->db->from($xray);
        $query = $this->db->get();  
        foreach ($query->result() as $low)
        {
            $loc_Detail[] = $low->location_detail;
        }

        $cart = array();
        $korek = $this->db->get('type_strain');
        foreach ($korek->result() as $row)
        {
            $cart[] = $row->type_strain;
        } 

        for ($i=0; $i < count($cart) ; $i++)
        {
            $this->db->select("*"); 
            $this->db->from($cart[$i]);
            $where = array('canister' => $x, 'boxes' => $y);
            $this->db->where($where);   
            $data = $this->db->get();

            foreach ($data->result() as $bow)
            {
                //echo $bow->Strain_Global_ID;
                $str = $bow->Location_Detail;
                $canister = $bow->canister;
                $box = $bow->boxes;

                for ($i=0; $i < count($loc_Detail); $i++) { 
                    if ($str == $loc_Detail[$i] && $canister == $x && $boxes == $y) {
                        unset($loc_Detail[$i]);
                    }
                }

            }

        }
       
        return $loc_Detail;
    }*/








