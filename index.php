<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    </head>
    
    <body>

        <?php

			session_start();

			ini_set('display_errors',1);
			ini_set('display_startup_erros',1);
			error_reporting(E_ALL);

			if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['art'])) {
                    include "template_topoLogado.php";
                } else {
                    include "menu_logado.php";
                }
			} else{
                if(isset($_GET['art'])) {

                    include "config.php";
                    include "banco.php";
                    include "helper.php";
                    include "classes/Cadastros.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='/'><img src='img/logo.png'></a>
                        </div>
                        <ul>
                            <li>About</li>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "menu_visitante.php";
                }
			}

		?>

        <?php if (!isset($_GET['art'])) : ?>
            <div style="height:20px;"></div>
            <form method="GET" action="/">
                <center>
                    <input type="text" name="q" id="search" class="search-button-after" placeholder="Find someone to help">
                </center>
            </form>
        <?php endif; ?>

        <?php 
            if (isset($_GET['q'])) {
                $busca = $_GET['q'];

                $page = (isset($_GET['page']))? $_GET['page'] : 1;
                

                $sql = "SELECT * FROM artes WHERE nome_arte LIKE '%".$busca."%' ORDER BY id DESC";
                $query = mysqli_query($mysqli, $sql);
                $total_artes = mysqli_num_rows($query);


                $registros = 10;
                $numPaginas = ceil($total_artes/$registros);
                $inicio = ($registros*$page)-$registros;

                $sql2 = "SELECT * FROM artes WHERE nome_arte LIKE '%".$busca."%' ORDER BY id DESC LIMIT $inicio, $registros ";
                $artes_pagina = mysqli_query($mysqli, $sql2);
                $total = mysqli_num_rows($artes_pagina);

                $pagina_atual = (isset($_GET['page']))? $_GET['page'] : 1;

                $max_links = 6;
                $links_laterais = ceil($max_links / 2);

                $inicio = $pagina_atual - $links_laterais;
                $limite = $pagina_atual + $links_laterais;


                include "template_search.php";  
            } else if (isset($_GET['art'])) {
                $id_arte = $_GET['art'];

                $arte = buscar_arte($mysqli, $id_arte);

                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                $usuario_artista = $artista['usuario'];
                $nome_artista = $artista['nome'];
                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);


                $artes_artista = buscar_artes_artista_limitadas($mysqli, $arte['cadastro_id']);

                include "art.php";
            }
            else {
                include "galeria.php";
            }
        ?>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    </body>

</html>
