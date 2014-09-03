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

			if(isset($_SESSION['usuario_logado'])){
                
			    include "menu_logado.php";

			} else{

			    include "menu_visitante.php";

			}

		?>

         <div style="height:20px;"></div>
        <form method="GET" action="/">
            <center>
                <input type="text" name="q" id="search" class="search-button-after" placeholder="Find someone to help">
            </center>
        </form>

        <?php 
            if (isset($_GET['q'])) {
                $busca = $_GET['q'];

                $sql = "SELECT * FROM artes WHERE nome_arte LIKE '%".$busca."%' ORDER BY id DESC";
                $query = mysqli_query($mysqli, $sql);

                $total_artes = mysqli_num_rows($query);

                $page = (isset($_GET['page']))? $_GET['page'] : 1;

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
            } else {
                include "galeria.php";
            }
        ?>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    </body>

</html>
