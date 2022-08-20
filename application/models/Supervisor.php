<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Model{
    public function __construct()
	{
		$this->load->database();      
	}
    
    public function getSupervisor(){
        $this->db->select ( '*' );
		$this->db->from ( 'supervisores' );
		$query = $this->db->get();
		return $query->result_array();
    }
}