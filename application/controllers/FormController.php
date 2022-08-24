<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FormController extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function index()
    {
    }
    public function getPlants()
    {
        $result = $this->Plants->getPlants();

        echo json_encode($result);
    }

    public function getLines()
    {
        $result = $this->Lines->getLines();

        echo json_encode($result);
    }

    public function getSupervisor()
    {
        $result = $this->Supervisor->getSupervisor();

        echo json_encode($result);
    }

    public function getCausesCode()
    {
        $result = $this->CausesCode->getCausesCode();

        echo json_encode($result);
    }

    public function getMachine()
    {
        $result = $this->Plants->getPlants();

        echo json_encode($result);
    }
    public function getData()
    {
        $result = $this->Form->getData();

        echo json_encode($result);
    }

    public function submit()
    {
        $result = $this->Form->getSubmit($this->input->post);

        echo $result;

        if ($result === true) {
            $this->session->set_flashdata('success_message', 'Se a agregado correctamente');
        } else {
            $this->session->set_flashdata('error_message', 'Ha ocurrido un error al realizar esta peticion');
        }
        redirect('/', 'refresh');
    }
}
