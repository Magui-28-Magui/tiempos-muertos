<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManagementController extends CI_Controller
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
        if ($this->user_email === NULL) {
            $this->load->view('includes/header');
            $this->load->view('includes/message');
            $this->load->view('includes/footer');
        } else {

            $data['user_email'] = $this->user_email;

            $this->load->view('includes/header', $data);
            $this->load->view('management');
            $this->load->view('includes/footer');
        }
    }
    public function addLine()
    {
        $result = $this->Management->addLine($this->input->post);

        echo $result;

        if ($result === true) {
            $this->session->set_flashdata('success_message', 'Se a agregado correctamente');
        } else {
            $this->session->set_flashdata('error_message', 'Ha ocurrido un error al realizar esta peticion');
        }
        redirect('/management', 'refresh');
    }
    public function deleteLine($id)
    {
        return $this->Management->deleteLine($id);
    }
    public function deleteCause($id)
    {
        return $this->Management->deleteCause($id);
    }
    public function deleteInefficiency($id)
    {
        return $this->Management->deleteInefficiency($id);
    }
    public function addCause()
    {
        $result = $this->Management->addCause($this->input->post);

        echo $result;

        if ($result === true) {
            $this->session->set_flashdata('success_message', 'Se a agregado correctamente');
        } else {
            $this->session->set_flashdata('error_message', 'Ha ocurrido un error al realizar esta peticion');
        }
        redirect('/management', 'refresh');
    }
    public function editInefficiency($id)
    {
        $data['id'] = $id;
        $data['user_email'] = $this->user_email;
        $data['lines'] = $this->Lines->getLines();
        $data['plants'] = $this->Plants->getPlants();
        $data['supervisor'] = $this->Supervisor->getSupervisor();
        $data['causes_code'] = $this->CausesCode->getCausesCode();
        $data['result'] = $this->Management->editInefficiency($id);

        if ($this->user_email === NULL) {
            $this->load->view('includes/header');
            $this->load->view('includes/message');
            $this->load->view('includes/footer');
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('edit_inefficiency', $data);
            $this->load->view('includes/footer');
        }
    }
}
