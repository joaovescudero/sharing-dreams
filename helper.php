<?php

function tem_post()
{
    if (count($_POST) > 0) {
        return true;
    }

    return false;
}

function traduz_data_nascimento_para_banco($data) 
{
	if ($data == "") {
		return "";
	}

	$dados = explode("/", $data);

	if (count($dados) != 3) {
        return $data;
    }

	$data_mysql = "{$dados[2]}-{$dados[0]}-{$dados[1]}";

	return $data_mysql;
}

function traduz_data_nascimento_para_exibir($data) 
{
	if ($data == "" OR $data == "0000-00-00") {
		return "";
	}

	$dados = explode("-", $data);

	if (count($dados) != 3) {
		return $data;
	}

	$data_exibir = "{$dados[1]}/{$dados[2]}/{$dados[0]}";

	return $data_exibir;
}

function validar_data_nascimento($data) 
{
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if (! $resultado) {
        return false;
    }

    $dados = explode('/', $data);

    $mes = $dados[0];
    $dia = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

function verificar_idade($data) {
	$ano_atual = 2014;

	$dados = explode('/', $data);

    $ano = $dados[2];

    if (($ano_atual - $ano) > 18) {
    	return false;
    } else {
    	return true;
    }
}


function traduz_sexo($codigo)
{
	$sexo = '';
	switch ($codigo) {
		case 1:
			$sexo = 'I am a boy!';
			break;
		case 2:
			$sexo = 'I am a girl!';
			break;
	}

	return $sexo;
}

function validar_email($email)
{
	$padrao = '/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/';
	$resultado = preg_match($padrao, $email);

	if (! $resultado) {
		return false;
	}

	return $resultado;
}	

function tratar_foto($foto) 
{
	$padrao = '/^.+(\.jpg$|\.png$|\.jpeg$|\.JPG$|\.PNG$|\.JPEG$)$/';
	$resultado = preg_match($padrao, $foto["name"]);

	if (! $resultado) {
        return false;
    }

    move_uploaded_file($foto['tmp_name'], "fotos/{$foto["name"]}");

    return true;
}

function tratar_arte($arte) 
{
	$padrao = '/^.+(\.jpg$|\.png$|\.jpeg$|\.JPG$|\.PNG$|\.JPEG$)$/';
	$resultado = preg_match($padrao, $arte["name"]);

	if (! $resultado) {
        return false;
    }

    $largura = 200;
    $altura = 300;

    $dimensoes = getimagesize($arte["tmp_name"]);

    if($dimensoes[0] < $largura) { 
    	return false;
    }

    if($dimensoes[1] < $altura) {
    	return false;
    }

    move_uploaded_file($arte['tmp_name'], "artes/{$arte["name"]}");

    return true;
}