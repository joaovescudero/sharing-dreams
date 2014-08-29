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

                include "template_search.php";  
            } else {
                include "galeria.php";
            }
        ?>

        <center>
            <div class="page-button stroke-page">1</div>
            <div class="page-button">2</div>
            <div class="page-button">3</div>
            <div class="page-button">4</div>
            <div class="page-button">5</div>
            <div class="page-button">6</div>
            <div class="page-button">></div>
        </center>
        <div style="height:80px;"></div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    </body>

</html>
