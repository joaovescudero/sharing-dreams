<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$page = (isset($_GET['page']))? $_GET['page'] : 1;

$artes = buscar_artes($mysqli);


$cmd = "SELECT * FROM artes";
$artes_total = mysqli_query($mysqli, $cmd);
$total_artes = mysqli_num_rows($artes_total);

$registros = 20;
$numPaginas = ceil($total_artes/$registros);
$inicio = ($registros*$page)-$registros;

$cmd2 = "SELECT * FROM artes ORDER BY id DESC LIMIT $inicio, $registros ";
$artes_pagina = mysqli_query($mysqli, $cmd2);
$total = mysqli_num_rows($artes_pagina);


for($i = 1; $i < $numPaginas + 1; $i++) {
    echo "<a href='/?page=$i'>".$i."</a> ";
}

include "template_galeria.php";	