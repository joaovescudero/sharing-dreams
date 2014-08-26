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

        <form method="GET" action="/">
            <label for="consulta">Search an art:</label>
            <input type="text" id="q" name="q" maxlength="255">
            <input type="submit" value="OK">
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

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    </body>

</html>
