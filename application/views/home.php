<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<body>

<section class="container">
    <h1>Cube Summation</h1>
    <div class="row">
        <div class="form-group text-center col-sm-6 col-sm-offset-3 form-inline">
            <label for="t">Valor de T (Número de casos de prueba 1 <= T <= 50)</label>
            <input type="text" class="form-control input-sm" id="t" placeholder="Ej: 2">
        </div>
    </div>
    <div class="row cuerpo">
        <h4 id="caso-prueba" class="text-center page-header"></h4>
        <div class="panel col-sm-6  col-sm-offset-3" id="ingrese">
            <div class="panel-header">
                <h5 class="text-center">Por favor ingrese los valores que se le piden</h5>
            </div>
            <div class="panel-body">
                <form id="init" class="row form-inline">

                    <div class="form-group text-center">
                        <label class="col-sm-12" for="n">N (Define N * N * N de la matriz) 1 <= N <= 100</label>
                        <input type="text" class="form-control" id="n" placeholder="Ej: 3">
                        <button type="submit" class="btn btn-success" id="init-matriz">Crear matriz</button>
                    </div>

                </form>


            </div>
        </div>
        <h4 id="n-val"></h4>
        <div class="panel col-sm-6 hidden"  id="instrucciones">
                <div class="page-header"><h5>Instrucciones</h5></div>
                Ingrese por favor las operaciones a realizar en la matriz. <br> Tiene 2 opciones:

                <ul>
                    <li><strong>UPDATE x y z W</strong>, que actualiza el valor de la celda (x,y,z) a W</li>
                    <li><strong>QUERY x1 y1 z1 x2 y2 z2</strong>, calcula la suma de los valores de la celda cuya
                        coordenada x
                        está entre x1
                        y x2 (inclusive),
                        y y está entre y1 y y2 (inclusive) y z entre z1 y z2 (inclusive).
                    </li>
                </ul>

        </div>
        <div class="panel col-sm-6 hidden" id="operaciones">
            <div class="page-header"><h5>Operaciones en Matriz. </h5></div>


            <div class="panel-body">
                <div class="form-inline">Escriba el número de operaciones a realizar <input type="text" class="form-control" id="num-operaciones" placeholder="Ej: 3"></div>
                <div class="form-group hidden orden"><label for="orden-txt" class="full-width">Escriba la operación</label><input type="text"
                                                                                                             class="form-control w-80"
                                                                                                             id="orden-txt"
                                                                                                             placeholder=" UPDATE x y z W">
                    <button type="button" class="btn btn-success w-20" id="ejecutar-orden">Ejecutar</button>
                    <div class="log"></div>
                </div>
            </div>
        </div>

    </div>


    </article>
</section>

</body>
