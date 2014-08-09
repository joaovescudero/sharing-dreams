<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


$artes = buscar_artes($mysqli);

include "template_galeria.php";	