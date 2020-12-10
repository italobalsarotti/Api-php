<?php

class Model_Category extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Get(){

        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function getBuscar($id){

        $query = $this->db->get_where('category', array('id' => $id), 1);
        return $query->row_array();
    }

    public function Post($data){

    	$query=$this->db->insert('category', $data);
    	return $query ? $this->db->insert_id() : false;

    }

    public function Put($data,$id){

		$where=$this->db->where('id', $id);
		$update=$this->db->update('category', $data);

		return $update;
    }
    
    public function Delete($id){

    	$where=$this->db->where('id', $id);
		$delete=$this->db->delete('category');

		return $delete;
    }
}