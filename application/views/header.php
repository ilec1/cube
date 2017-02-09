<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$date = gmdate("D, d M Y H:i:s T", strtotime('+ 1 MONTH'));
$last_modified = gmdate("D, d M Y H:i:s T", strtotime("05-09-2016"));
header("Cache-Control: max-age=2592000");
header("Pragma: cache");
header("Expires: $date");
header("ETag: prueba-rappi");
header("Last-Modified: $last_modified");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube Summation</title>
    <meta name="description" content="Cube Summation" />
    <meta name="keywords" content="Cube Summation"/>
    <meta name="author" content="Ileana Camacho" />

    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <!--jQuery-->
    <script src="js/jquery-3.1.1.min.js"></script>

</head>

