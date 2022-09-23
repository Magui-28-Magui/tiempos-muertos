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
        $get_planner_code = $_POST['planner_code'];
        if (is_string($get_planner_code)) {
            $get_string = preg_split('/\s*,\s*/', $get_planner_code, PREG_SPLIT_NO_EMPTY);
            $get_length_planner_code = count($get_string);
            $result_planner_code = $time_minutes / $get_length_planner_code;
            $result_hour = $result_planner_code / 60;
        } else {
            $get_length_planner_code = count($get_planner_code);
            $result_planner_code = $time_minutes / $get_length_planner_code;
            $result_hour = $result_planner_code / 60;
        }

        $data = array(
            'plant' => $this->input->post('plant'),
            'supervisor' => $this->input->post('supervisor'),
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'cause_code' => $this->input->post('cause_code'),
            'machine' => $this->input->post('machine'),
            'part_number' => $this->input->post('part_number'),
            'time' => $result_planner_code,
            'time_hour' => $result_hour,
        );

        for ($row = 0; $row < $get_length_planner_code; $row++) {
            $data['planner_code'] = $this->input->post('planner_code')[$row];
            $this->db->insert('register', $data);
        }
        return true;
    }
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('register');
        $this->db->join('lines', 'lines.lines_id = register.planner_code', 'left');
        $this->db->join('supervisores', 'supervisores.supervisor_id = register.supervisor', 'left');
        $this->db->join('codigo_de_causa', 'codigo_de_causa.cause_id = register.cause_code', 'left');

        $query = $this->db->get();

        return $query->result_array();
    }
    public function getDataWeek($plant, $supervisor)
    {
        $this->db->select('register.cause_code, register.plant, register.supervisor, codigo_de_causa.cause, SUM(register.time_hour) as `time_hour`');
        $this->db->from('register');
        $this->db->join('codigo_de_causa', 'codigo_de_causa.cause_id = register.cause_code', 'left');
        $this->db->group_by('register.cause_code');
        $this->db->order_by('time_hour', 'desc');
        if (!empty($plant)) {
            $this->db->where('register.plant', $plant);
        }
        if(!empty($supervisor)){
            $this->db->where('register.supervisor', $supervisor);
        }

        $query = $this->db->get();
        
        return $query->result_array();
    }
}
