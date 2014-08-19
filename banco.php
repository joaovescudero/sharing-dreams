<?php

$mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if ($mysqli->connect_errno) {
    echo "There is a problem!";
    die();
}

function verificar_usuario($mysqli, $usuario)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE usuario = '$usuario'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function verificar_login($mysqli, $usuario, $senha)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE usuario = '$usuario' AND senha = '$senha'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function gravar_foto($mysqli, $foto){
    $sqlGravar = "INSERT INTO fotos
        (cadastro_id, nome, arquivo)
        VALUES
        (
            {$foto['cadastro_id']},
            '{$foto['nome']}',
            '{$foto['arquivo']}'
        )
    ";

    $mysqli->query($sqlGravar);
}

function gravar_arte($mysqli, $arte){
    $sqlGravar = "INSERT INTO artes
        (cadastro_id, nome, arquivo, nome_arte)
        VALUES
        (
            {$arte['cadastro_id']},
            '{$arte['nome']}',
            '{$arte['arquivo']}',
            '{$arte['nome_arte']}'
        )
    ";

    $mysqli->query($sqlGravar);
}

function buscar_foto($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = {$cadastro_id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function verificar_foto($mysqli, $cadastro_id)
{
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = '$cadastro_id'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function editar_foto($mysqli, $foto) {
    $sqlEditar = "
            UPDATE fotos SET
                nome = '{$foto['nome']}',
                arquivo = '{$foto['arquivo']}'
            WHERE cadastro_id = {$foto['cadastro_id']}
            ";

    $mysqli->query($sqlEditar);
}

function buscar_artes($mysqli)
{
    $sqlBusca = "SELECT * FROM artes ORDER BY id DESC";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $artes = array();

    while ($arte = mysqli_fetch_assoc($resultado)) {
        $artes[] = $arte;
    }

    return $artes;
}

function buscar_dados_artista($mysqli, $cadastro_id) {
    $sqlBusca = "SELECT id, usuario, nome FROM cadastro WHERE id = {$cadastro_id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado); 
}

function buscar_artes_artista($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM artes WHERE cadastro_id = '$cadastro_id' ORDER BY id DESC";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $artes_artista = array();

    while ($arte_artista = mysqli_fetch_assoc($resultado)) {
        $artes_artista[] = $arte_artista;
    }

    return $artes_artista;
}

function buscar_dados_perfil($mysqli, $user) {
    $sqlBusca = "SELECT id, nome, usuario, sobre, endereco FROM cadastro WHERE usuario = '$user'";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado); 
}

function buscar_foto_perfil($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = '$cadastro_id'";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function buscar_senha($mysqli, $id){
    $sqlBusca = "SELECT senha FROM cadastro WHERE id = {$id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}