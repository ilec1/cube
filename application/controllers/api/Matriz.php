<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Matriz extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('matriz_model');
    }
    public function matriz_init()
    {
        if ($this->input->post('n')) {
            $N = $this->input->post('n');
            $matriz = array(array(array()));
            for ($layer = 0; $layer < $N; $layer++) {
                for ($row = 0; $row < $N; $row++) {
                    for ($col = 0; $col < $N; $col++) {
                        $matriz[$layer][$row][$col] = 0;
                    }
                }
            }
            $data = array(
                "n" => $N,
                "matriz" => $matriz
            );
            if ($this->matriz_model->init_matriz($data))
                echo "OK";
            else
                echo "ERROR";
        }
    }
    public function sum()
    {

        $matriz = $this->matriz_model->get_matriz();
        $x1=$this->input->post('x1');
        $y1=$this->input->post('y1');
        $z1=$this->input->post('z1');
        $x2=$this->input->post('x2');
        $y2=$this->input->post('y2');
        $z2=$this->input->post('z2');
        $total = 0;
        for ( $layer = $x1; $layer <= $x2; $layer++ )
        {
            for ( $row = $y1; $row <= $y2; $row++ )
            {

                for ( $col = $z1; $col <= $z2; $col++ )
                {
                    $total+=$matriz[$layer][$row][$col];
                }
            }
        }
        if($matriz){
                echo "La suma es: $total";
            }
            else
            {
               echo 'error';
            }
    }

    public function actualizar()
    {
        $x=$this->input->post('x');
        $y=$this->input->post('y');
        $z=$this->input->post('z');
        $w=$this->input->post('w');
        if($this->matriz_model->update_matriz($x,$y, $z, $w))
        echo "Actualizado [$x,$y,$z] a $w con éxito";
        else
            echo "Hubo un error";
    }

    public function printm()
    {
        $matriz = $this->matriz_model->get_matriz();
        $n = $this->matriz_model->get_n();
        echo "N: $n";
        echo "<ul>";
        for ( $layer = 0; $layer < $n; $layer++ )
        {
            echo "<li>The layer number $layer";
            echo "<ul>";

            for ( $row = 0; $row < $n; $row++ )
            {
                echo "<li>The row number $row";
                echo "<ul>";

                for ( $col = 0; $col < $n; $col++ )
                {
                    echo "<li>".$matriz[$layer][$row][$col]."</li>";
                }
                echo "</ul>";
                echo "</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";
    }




}
