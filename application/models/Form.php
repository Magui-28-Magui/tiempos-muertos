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
            'plant' => $this->input->post('plant_select'),
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
    public function getData($start_date, $end_date)
    {
        $date = date('Y-m-d');

        $this->db->select('*, week(register.date) as `year_week`');
        $this->db->from('register');
        $this->db->join('lines', 'lines.lines_id = register.planner_code', 'left');
        $this->db->join('supervisores', 'supervisores.supervisor_id = register.supervisor', 'left');
        $this->db->join('codigo_de_causa', 'codigo_de_causa.cause_id = register.cause_code', 'left');
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('register.date >=', $start_date);
            $this->db->where('register.date <=', $end_date);
        }else{
            $this->db->where('register.date =', $date);
        }

        //echo $this->db->last_query();

        $query = $this->db->get();

        return $query->result_array();
    }
    public function getDataWeek($plant, $supervisor, $month, $week, $planner_code)
    {
        //$week_date = date('oW');

        $start_date = date('Y-m-d', strtotime($month . 'first day of this month'));
        $end_date =  date('Y-m-d', strtotime($month . 'last day of this month'));

        $this->db->select('register.cause_code, register.planner_code, register.plant,lines.planner, register.supervisor, register.date, lines.line_name, codigo_de_causa.cause, SUM(register.time_hour) as `time_hour`');
        $this->db->from('register');
        $this->db->join('lines', 'lines.lines_id = register.planner_code', 'left');
        $this->db->join('codigo_de_causa', 'codigo_de_causa.cause_id = register.cause_code', 'left');
        $this->db->group_by('register.cause_code');
        $this->db->order_by('time_hour', 'desc');
        if (!empty($plant)) {
            $this->db->where('register.plant', $plant);
        }
        if (!empty($supervisor)) {
            $this->db->where('register.supervisor', $supervisor);
        }
        if (!empty($month)) {
            $this->db->where('register.date >=', $start_date);
            $this->db->where('register.date <=', $end_date);
        }
        if (!empty($week)) {
            $this->db->where('YEARWEEK(register.date) =', $week);
        }
        if (!empty($planner_code)) {
            $this->db->where('register.planner_code', $planner_code);
        }
        //$this->db->where('YEARWEEK(register.date) =', $week_date);

        $query = $this->db->get();

        return $query->result_array();
    }
}
