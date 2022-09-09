<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //LINES
    public function addLine($data)
    {
        $data = array(
            'lines_plant' => $this->input->post('lines_plant'),
            'line_name' => $this->input->post('line_name'),
            'planner' => $this->input->post('planner'),
        );

        return $this->db->insert('lines', $data);
    }
    public function deleteLine($id)
    {
        $this->db->where('lines_id', $id);
        $this->db->delete('lines');
        return true;
    }
    //CAUSES
    public function addCause($data)
    {
        $data = array(
            'code' => $this->input->post('code'),
            'department' => $this->input->post('department'),
            'category' => $this->input->post('category'),
            'cause' => $this->input->post('cause'),
        );

        return $this->db->insert('codigo_de_causa', $data);
    }
    public function deleteCause($id)
    {
        $this->db->where('cause_id', $id);
        $this->db->delete('codigo_de_causa');
        return true;
    }
    public function deleteInefficiency($id)
    {
        $this->db->where('register_id', $id);
        $this->db->delete('register');
        return true;
    }
    //Inefficiency
    public function editInefficiency($id)
    {
        $query = $this->db->get_where("register", array('register_id' => $id));
        return $query->row_array();
    }
    public function saveInefficiency($id)
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
            'planner_code' => $this->input->post('planner_code'),
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'cause_code' => $this->input->post('cause_code'),
            'machine' => $this->input->post('machine'),
            'part_number' => $this->input->post('part_number'),
            'time' => $result_planner_code,
            'time_hour' => $result_hour,
        );

        $this->db->where('register_id', $id);
		return $this->db->update("register", $data);
    }
}
