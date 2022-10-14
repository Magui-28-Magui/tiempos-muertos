<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines extends CI_Model{
    public function __construct()
	{
		$this->load->database();      
	}
    
    public function getMachines(){
        $this->db->select ( '*' );
		$this->db->from ( 'machines' );
		$query = $this->db->get();
		return $query->result_array();
    }
}