<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getSubmit($data)
    {
       $time_minutes = $_POST['time'];
       $result_hour = $time_minutes / 60;

        $data = array(
            'plant' => $this->input->post('plant'),
            'area' => $this->input->post('area'),
            'supervisor' => $this->input->post('supervisor'),
            'planner_code' => $this->input->post('planner_codes'),
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'cause_code' => $this->input->post('cause_code'),
            'machine' => $this->input->post('machine'),
            'part_number' => $this->input->post('part_number'),
            'time' => $this->input->post('time'),
            'time_hour' => $result_hour,
        );

        $result = $this->db->insert('register', $data);

        return $result;
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('register');
        $query = $this->db->get();
        return $query->result_array();
    }
}
