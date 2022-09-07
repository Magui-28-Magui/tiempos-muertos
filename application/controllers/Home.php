<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $in = $this->session->flashdata('message_name');

        $in['lines'] = $this->Lines->getLines();
        $in['plant'] = $this->Plants->getPlants();
        $in['causes_code'] = $this->CausesCode->getCausesCode();

        $this->load->view('includes/header');
        $this->load->view('home', $in);
        $this->load->view('includes/footer');
    }
}
