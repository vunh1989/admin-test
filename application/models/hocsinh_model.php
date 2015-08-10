<?php

class Hocsinh_model extends CI_Model {

	protected $_table = "gl_hocsinh";
 	public function __construct(){

        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

	// public function get_all($per_pg,$offset)
	// {
	// 	$this->db->order_by('hs_id','desc');
	// 	$query=$this->db->get('gl_hocsinh',$per_pg,$offset);
	// 	return $query->result();
	// }
	// public function message_count()
	// {
	// 	return $this->db->count_all('gl_hocsinh');
	// }
    public function listall($offset,$start){

		$this->db->limit($offset,$start);
		$this->db->order_by("hs_id","desc");
		return $this->db->get($this->_table)->result_array();
     }

	public function count_all(){
		return $this->db->count_all($this->_table);
	}
	public function Hocsinh_model(){
		parent::Model();
	}

	public function get_hocsinh(){
		$query_str = "SELECT `hs_id`,`hs_matn`,`hs_tenthanh`,`hs_first_name`,`hs_last_name` FROM gl_hocsinh";

		$result = $this->db->query($query_str);
		return $result;
	}
}