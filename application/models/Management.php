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
            'plant' => $this->input->post('plant'),
            'line_name' => $this->input->post('line_name'),
            'planner' => $this->input->post('planner'),
        );

        return $this->db->insert('lines', $data);
    }
    public function deleteLine($id)
    {
        $this->db->where('id', $id);
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
        $this->db->where('id', $id);
        $this->db->delete('codigo_de_causa');
        return true;
    }
    public function deleteInefficiency($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('register');
        return true;
    }
    //Inefficiency
    public function editInefficiency($id)
    {
        //$this->db->where('id', $id);
        //$query = $this->db->get('register');
        //$data = $query->result_array();

        //return $data;
        $query = $this->db->get_where("register", array('id' => $id));
		return $query->row_array();
    }
}
