<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Data_Matrix_Model extends CI_Model {

    var $column2 = array('one1','two2', 'three3', 'four4');
    var $column = array('one1','two2', 'three3', 'four4', 'five5', 'six6' , 'seven7', 'eight8', 'nine9', 'ten10', 'eleven11');
    var $order = array('id' => 'desc');


    public function __construct()
    {
      parent::__construct();
		//$this->load->database();
  }

  public function list_Canister_Dalam_Type_Canister($jenis_Canister){
      $this->db->select("*");
      $this->db->from($jenis_Canister);
      $query = $this->db->get();        
      return $query->result();	
  }

  public function list_Boxes_Dalam_Type_Boxes($jenis_Boxes)
  {
      $this->db->select("*");
      $this->db->from($jenis_Boxes);
      $query = $this->db->get();        
      return $query->result();	
  }

  public function list_Row($x)
  {
    $this->db->select("*");
    $this->db->from($x);
    $query = $this->db->get();        
    return $query->result();    
}

public function Create_Table_Matrix($a,$b){

  $data = array(   //nak kosongkan table..
   'one1' => '',
   'two2' => '',
   'three3' => '',
   'four4' => '',
   'five5' => '',
   'six6' => '',
   'seven7' => '',
   'eight8' => '',
   'nine9' => '',
   'ten10' => '',
   'eleven11' => '',

   );
  $ids = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
  $this->db->where_in('id', $ids);
  $this->db->update('matrix_tank1', $data); 

  $cart = array();
  $query = $this->db->get('type_strain');
  foreach ($query->result() as $row)
  {
   $cart[] = $row->type_strain;
 }

 for ($i=0; $i < count($cart) ; $i++) { 
  
   $this->db->select("*");
   $this->db->from($cart[$i]);
   $where = array('canister' => $a, 'boxes' => $b);
   $this->db->where($where);
   $data = $this->db->get();

   foreach ($data->result() as $bow)
   {
    $str = $bow->Location_Detail;
    $nazira = $bow->Main_Strain_Local_ID;

    $numbers = preg_replace('/[^0-9]/', '', $str);
    $letters = preg_replace('/[^a-zA-Z]/', '', $str);
			//	echo $numbers.' = '.$letters.'<br>';

    $fields = $this->db->list_fields('matrix_tank1');

    foreach ($fields as $field)
    {
     $x = preg_replace('/[^0-9]/', '', $field);
				//$y = preg_replace('/[^a-zA-Z]/', '', $field);

     if ($x == $numbers) {

      $this->db->set($field , $nazira);
      $this->db->where('id',$letters); 
      $this->db->update('matrix_tank1');

    }
    
  }
}

}
$query = $this->db->query('SELECT Main_Strain_Local_ID FROM datanewcryo WHERE id = 1 ');
$row = $query->row();
return $row->Main_Strain_Local_ID;

		//print_r($cart);
}



public function Create_Table_Matrix_Refri($a){

    $data = array(
     'one1' => '',
     'two2' => '',
     'three3' => '',
     'four4' => '',

     );
    $ids = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J','K','L','M','N','O','P','Q','R','S');
    $this->db->where_in('id', $ids);
    $this->db->update('matrix_refrigerator', $data); 


    $cart = array();
    $query = $this->db->get('type_strain');
    foreach ($query->result() as $row)
    {
        $cart[] = $row->type_strain;
    }

    for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

        $this->db->select("*");
        $this->db->from($cart[$i]);
        $where = array('Row' => $a);
        $this->db->where($where);
        $data = $this->db->get();

        foreach ($data->result() as $bow)
        {
                //echo $bow->Strain_Global_ID;
            $str = $bow->Location_Detail;

            $numbers = preg_replace('/[^0-9]/', '', $str);
            $letters = preg_replace('/[^a-zA-Z]/', '', $str);
            //  echo $numbers.' = '.$letters.'<br>';

            $fields = $this->db->list_fields('matrix_refrigerator');

            foreach ($fields as $field)
            {
                    //echo $field;
                $x = preg_replace('/[^0-9]/', '', $field);
                //$y = preg_replace('/[^a-zA-Z]/', '', $field);

                if ($x == $numbers) {

                    $this->db->set($field , $bow->Main_Strain_Local_ID);
                    $this->db->where('id',$letters); 
                    $this->db->update('matrix_refrigerator');

                }
                
            }
        }

    }

$query = $this->db->query('SELECT Main_Strain_Local_ID FROM datanewcryo WHERE id = 2 ');
$row = $query->row();
return $row->Main_Strain_Local_ID;

}

public function Get_Data_In_MatrixForm()
{
    $this->db->select("*");
    $this->db->from('matrix_tank1');
    $query = $this->db->get();
    return $query->result();
}

private function _get_datatables_query2($x)
{

    $this->table = $x;
    $this->db->from($x);

    $i = 0;

        foreach ($this->column2 as $item) // loop column
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

                if(count($this->column2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
            $column2[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query($x)
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

    function get_datatables($x)
    {
        $this->_get_datatables_query($x);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($x)
    {
        $this->_get_datatables_query($x);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatables2($x)
    {
        $this->_get_datatables_query2($x);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered2($x)
    {
        $this->_get_datatables_query2($x);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($x)
    {
        $this->db->from($x);
        return $this->db->count_all_results();
    }

    public function get_by_id_Freeze($localid , $r, $Location_Detail)
    {
      $cart = array();
      $query = $this->db->get('type_strain');
      foreach ($query->result() as $row)
      {
        $cart[] = $row->type_strain;
      }

      for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

        $this->db->select("*");
        $this->db->from($cart[$i]);
        $where = array('Main_Strain_Local_ID' => $localid, 'Row' => $r,'Location_Detail' => $Location_Detail);
        $this->db->where($where);
        $data = $this->db->get();

        if($data->num_rows() > 0){
          return $data->result();
        }
      }
    }

    public function get_by_id_Cryo($localid , $canister, $boxes, $Location_Detail)
    {
      $cart = array();

      $query = $this->db->get('type_strain');
      foreach ($query->result() as $row)
      {
        $cart[] = $row->type_strain;
      }

      for ($i=0; $i < count($cart) ; $i++) { 
            //echo $cart[$i];

        $this->db->select("*");
        $this->db->from($cart[$i]);
        $where = array('canister' => $canister, 'boxes' => $boxes, 'Location_Detail' => $Location_Detail);
        $this->db->where($where);
        $data = $this->db->get();

        if($data->num_rows() > 0){
          return $data->result();
        } 
      }

}



}

?>