<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        $this->load->model('matriz_model');
    }
    private function loadview($vista, $data)
    {
            $this->load->view('header', $data);
            $this->load->view($vista, $data);
            $this->load->view('footer');

    }
    function index()
    {

            $this->loadview('home', null);


    }

}
