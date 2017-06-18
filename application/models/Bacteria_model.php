<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bacteria_model extends CI_Model {

	var $table = '';
  var $column = array('Genus_Name','Species_Name', 'Subspecies_Name', 'Strain_Global_ID','Main_Strain_Local_ID', 'Depository_Status');
	var $order = array('id' => 'desc');

	//untuk table location & location_ unit
	var $table_location = 'location';
	var $table_location_unit = 'location_unit';
  var $table_location_one = 'location_one';
  var $table_location_two = 'location_two';
  var $table_type_Strain = 'type_strain';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
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

      public function count_all($x)
      {
        $this->db->from($x);
        return $this->db->count_all_results();
      }

      public function get_by_id_Baru($id, $strain)
      {
        $this->db->from($strain);
        $this->db->where('id',$id);
        return $this->db->get()->result(); //result bole view data array kt controller
      }

      public function get_by_id($id, $strain)
      {
        $this->db->from($strain);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
      }

      public function save($data, $strain)
      {
		$this->db->insert($strain, $data); //masukkan data dulu

        $this->db->from($strain); //pilih db
        $total =  $this->db->count_all_results(); //count total dr table td

        $data=array('total_data'=>$total);
        $this->db->where('type_strain',$strain);
        $this->db->update('type_strain',$data);

        return $this->db->insert_id();
      }

      public function save_type_strain($data)
      {
        $this->db->insert($this->table_type_Strain, $data);
        return $this->db->insert_id();
      }

      public function save_location($data)
      {
        $this->db->insert($this->table_location, $data);
        return $this->db->insert_id();
      }

      public function save_location_unit($data)
      {
        $this->db->insert($this->table_location_unit, $data);
        return $this->db->insert_id();
      }



      public function update($where, $data, $strain)
      {
        $this->db->update($strain, $data, $where);
        return $this->db->affected_rows();
      }

      public function getPathImage($id, $strain)
      {
        $this->db->select("Image");
        $this->db->from($strain);
        $where = array('id' => $id);
        $this->db->where($where);
        $data = $this->db->get();

        foreach ($data->result() as $bow)
        {
          $str = $bow->Image;
          return $str;
        }

      }

      public function delete_by_id($id, $strain)
      {
        $this->db->where('id', $id);
        $this->db->delete($strain);
      }

      public function list_all_type_Strain(){
        $this->db->from($this->table_type_Strain);
        $query = $this->db->get();
        return $query->result();    
      }

      public function list_all_location(){
        $this->db->from($this->table_location);
        $query = $this->db->get();
        return $query->result();	
      }

      public function list_all_location_unit(){
        $this->db->from($this->table_location_unit);
        $query = $this->db->get();
        return $query->result();
      }

      public function list_all_location_one(){
        $this->db->from($this->table_location_one);
        $query = $this->db->get();
        return $query->result();
      }

      public function list_all_location_two(){
        $this->db->from($this->table_location_two);
        $query = $this->db->get();
        return $query->result();
      }

      public function list_Summary_All_Strain()
      {
        $this->db->from($this->table_type_Strain);
        $query = $this->db->get();
        return $query->result();
      }
      public function get_by_id_type_Strain($id){
        $this->db->from($this->table_type_Strain);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
      }
      public function get_by_id_location($id){
        $this->db->from($this->table_location);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
      }
      public function get_by_id_location_unit($id){
        $this->db->from($this->table_location_unit);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
      }
      public function delete_by_id_type_Strain($id)
      {
        $this->db->where('id', $id);
        $this->db->delete($this->table_type_Strain);
      }
      public function delete_by_id_location($id)
      {
        $this->db->where('id', $id);
        $this->db->delete($this->table_location);
      }
      public function delete_by_id_location_unit($id)
      {
        $this->db->where('id', $id);
        $this->db->delete($this->table_location_unit);
      }
      public function update_type_Strain($where, $data, $strain)
      {
        $this->db->update($strain, $data, $where);
        return $this->db->affected_rows();
      }
      public function update_location($where, $data)
      {
        $this->db->update($this->table_location, $data, $where);
        return $this->db->affected_rows();
      }
      public function update_location_unit($where, $data)
      {
        $this->db->update($this->table_location_unit, $data, $where);
        return $this->db->affected_rows();
      }
      public function Compare_Location_Detail()
      {
        $cart = array();
        $query = $this->db->get('type_strain');
        foreach ($query->result() as $row)
        {
          $cart[] = $row->type_strain;
        }  

        foreach ($data->result() as $bow)
        {
          $str = $bow->Location_Detail;
          $x = $bow->canister;
          $y = $bow->boxes;
          
          $numbers = preg_replace('/[^0-9]/', '', $str);
          $letters = preg_replace('/[^a-zA-Z]/', '', $str);


        }
      }

    }
