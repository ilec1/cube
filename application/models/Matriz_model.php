<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matriz_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('session');
    }

    function get_matriz()
    {
        if($this->session->has_userdata('matriz'))
        return  $this->session->matriz;
        else
            return false;
    }
    function get_n()
    {
        if($this->session->has_userdata('n'))
        return  $this->session->n;
        else
            return false;
    }

    function update_matriz($x= false,$y=false, $z=false, $w=false)
    {
        $matriz = $this->matriz_model->get_matriz();
        $matriz[$x][$y][$z]=$w;
        $this->session->matriz=$matriz;
        return $matriz[$x][$y][$z];
    }


    function init_matriz($data=false)
    {

            $data_sess = array(
                "n" => $data["n"],
                "matriz" => $data["matriz"]
            );

           $this->session->set_userdata($data_sess);
        return $this->session->has_userdata('matriz');

    }



}

/* End of file matriz_model.php */
/* Location: ./application/model/matriz_model.php */