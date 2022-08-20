<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CausesCode extends CI_Model{
    public function __construct()
	{
		$this->load->database();      
	}
    
    public function getCausesCode(){
        $this->db->select ( '*' );
		$this->db->from ( 'codigo_de_causa' );
		$query = $this->db->get();
		return $query->result_array();
    }
}