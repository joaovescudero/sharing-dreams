<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";

if (isset($_GET['user'])) {
	$perfil = buscar_dados_perfil($mysqli, $_GET['user']);
	$id_perfil = $perfil['id'];
	$usuario_perfil = $perfil['usuario'];
	$nome_perfil = $perfil['nome'];
	$endereco_perfil = $perfil['endereco'];
	$sobre_perfil = $perfil['sobre'];
	$foto_perfil = buscar_foto_perfil($mysqli, $id_perfil);

	$artes_artista = buscar_artes_artista($mysqli, $id_perfil);

	include "template_conta.php";		
} else {
	header('Location: http://sharingdreams.url.ph/');
}