<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";

if (isset($_GET['user'])) {
	$user = $_GET['user'];
	$perfil = buscar_dados_perfil($mysqli, $_GET['user']);
	$id_perfil = $perfil['id'];
	$usuario_perfil = $perfil['usuario'];
	$nome_perfil = $perfil['nome'];
	$endereco_perfil = $perfil['endereco'];
	$sobre_perfil = $perfil['sobre'];
	$foto_perfil = buscar_foto_perfil($mysqli, $id_perfil);

	$artes_artista = buscar_artes_artista($mysqli, $id_perfil);


	$page = (isset($_GET['page']))? $_GET['page'] : 1;


    $sql = "SELECT * FROM artes WHERE cadastro_id = {$id_perfil} ORDER BY id DESC";
    $query = mysqli_query($mysqli, $sql);
    $total_artes = mysqli_num_rows($query);


    $registros = 5;
    $numPaginas = ceil($total_artes/$registros);
    $inicio = ($registros*$page)-$registros;

    $sql2 = "SELECT * FROM artes WHERE cadastro_id = {$id_perfil} ORDER BY id DESC LIMIT $inicio, $registros ";
    $artes_pagina = mysqli_query($mysqli, $sql2);
    $total = mysqli_num_rows($artes_pagina);

    $pagina_atual = (isset($_GET['page']))? $_GET['page'] : 1;

    $max_links = 6;
    $links_laterais = ceil($max_links / 2);

    $inicio = $pagina_atual - $links_laterais;
    $limite = $pagina_atual + $links_laterais;
   

	include "template_conta.php";		
} else {
	header('Location: http://sharingdreams.url.ph/');
}