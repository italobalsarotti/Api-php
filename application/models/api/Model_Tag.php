<?php

class Model_Tag extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Get(){

        $query = $this->db->get('tag');
        return $query->result_array();
    }

    public function getBuscar($id){

        $query = $this->db->get_where('tag', array('id' => $id), 1);
        return $query->row_array();
    }
}