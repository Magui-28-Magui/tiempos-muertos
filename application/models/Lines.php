<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lines extends CI_Model{
    public function __construct()
	{
		$this->load->database();      
	}
    
    public function getLines(){
        $this->db->select ( '*' );
		$this->db->from ( 'lines' );
		$query = $this->db->get();
		return $query->result_array();
    }
}