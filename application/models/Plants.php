<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plants extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPlants()
    {
        $this->db->select ( '*' );
        $this->db->from ( 'plantas' );
        $query = $this->db->get();
        return $query->result_array();
    }
}
