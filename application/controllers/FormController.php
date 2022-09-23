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

    protected $user_email = NULL;
    protected $user_name = NULL;
    protected $user_lastname = NULL;


    public function __construct()
    {
        parent::__construct();
        $this->user_email = $this->session->userdata(EMAIL);
        $this->user_name = $this->session->userdata(NAME);
        $this->user_lastname = $this->session->userdata(LASTNAME);
    }
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
    public function getDataWeek()
    {
        $plant =  $this->input->get('plant');
        $supervisor =  $this->input->get('supervisor');

        $result = $this->Form->getDataWeek($plant, $supervisor);

        echo json_encode($result);
    }
    public function submit()
    {
        $result = $this->Form->getSubmit($this->input->post);

        if ($result === true) {
            $this->session->set_flashdata('success_message', 'Se a agregado correctamente');
        } else {
            $this->session->set_flashdata('error_message', 'Ha ocurrido un error al realizar esta peticion');
        }
        redirect('/', 'refresh');
    }
    public function errorMessage()
    {
        $this->load->view('includes/header');
        $this->load->view('error_message');
        $this->load->view('includes/footer');
    }
}
