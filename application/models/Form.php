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
        //get time
        $time_minutes = $_POST['time'];

        //divicion entre el tiempo y la cantidad de planner codes seleccionados 
        $get_planner_code = $_POST['planner_codes'];
        $get_array_planner_code = preg_split("/\,/", $get_planner_code);
        $get_length_planner_code = count($get_array_planner_code);
        $result_planner_code = $time_minutes / $get_length_planner_code;
        $result_hour = $result_planner_code / 60;

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
            'time' => $result_planner_code,
            'time_hour' => $result_hour,
        );

        for ($row = 0; $row < $get_length_planner_code; $row++) {
            $this->db->insert('register', $data);
        }
        return true;
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('register');
        $query = $this->db->get();
        return $query->result_array();
    }
}
