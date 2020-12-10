<?php

class Model_Pet extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function Get(){

        $query = $this->db->query("SELECT P.id, C.id as 'category',C.name as 'name_category', P.name, P.photoUrls, T.id as 'tags',T.name as 'name_tag', P.status FROM pet P left join category C on P.category=C.id  left join tag T on P.tags=T.id");
        return $query->result();
    }

    public function idGet($id){

        $query = $this->db->query("SELECT P.id, C.id as 'category',C.name as 'name_category', P.name, P.photoUrls, T.id as 'tags', T.name as 'name_tag' ,P.status  FROM pet P left join category C on P.category=C.id  left join tag T on P.tags=T.id WHERE P.id = '$id'");
        return $query->row_array();
    }

    public function statusGet($status){

        $query = $this->db->query("SELECT P.id, C.id as 'category',C.name as 'name_category', P.name, P.photoUrls, T.id as 'tags',T.name as 'name_tag', P.status FROM pet P left join category C on P.category=C.id  left join tag T on P.tags=T.id WHERE P.status = '$status'");
        return $query->result();
    }

    public function Post($category,$name,$photoUrls,$tags,$status){

    	$data = array(
	        'category' => $category,
	        'name' => $name,
	        'photoUrls' => $photoUrls,
	        'tags' => $tags,
	        'status' => $status
		);

    	$query=$this->db->insert('pet', $data);
    	return $query ? $this->db->insert_id() : false;

    }

    public function Put($category,$name,$photoUrls,$tags,$status,$id){

    	$data = array(
	        'category' => $category,
	        'name' => $name,
	        'photoUrls' => $photoUrls,
	        'tags' => $tags,
	        'status' => $status
		);

		$where=$this->db->where('id', $id);
		$update=$this->db->update('pet', $data);

		return $update;
    }
    
    public function Delete($id){

    	$where=$this->db->where('id', $id);
		$delete=$this->db->delete('pet');

		return $delete;
    }
}