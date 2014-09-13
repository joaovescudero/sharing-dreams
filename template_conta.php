
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Profile: <?php echo $usuario_perfil; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://sharingdreams.url.ph/css/datepicker.css">
		<script src="http://sharingdreams.url.ph/js/datepicker.js"></script> 

		<style>
				.capa {
					width:100%;
					background-color:#eee;
				}
				.about-me{
					font-size:12px;
					font-style:italic;
					font-family: Helvetica, Arial, 'lucida grande',tahoma,verdana,arial,sans-serif;
					padding-left:85px;
					padding-right:85px;
					padding-bottom:20px;
					padding-top:16px;
				}
				.city{
					font-size:15px;
				}
		</style>

		<link rel="stylesheet" href="http://sharingdreams.url.ph/css/index.css">
	</head>
	<body>

         <div class="top">
            <div class="logo">
                <a href="http://sharingdreams.url.ph/"><img src="http://sharingdreams.url.ph/img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <?php
                	session_start();

                	ini_set('display_errors',1);
					ini_set('display_startup_erros',1);
					error_reporting(E_ALL);
				?>

				<?php if(isset($_SESSION['usuario_logado'])) : ?>
                	<li><a href='http://sharingdreams.url.ph/editProfile' id='menu'>Settings</a>
					
					<li><a href='http://sharingdreams.url.ph/deslogar.php' id='menu'>Logout</a>

			   		<?php if (isset($_SESSION['foto'])) : ?>
						<li><a href="http://sharingdreams.url.ph/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='http://sharingdreams.url.ph/fotos/<?php echo $_SESSION['foto']['nome']; ?>' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;'></a></li>
					<?php else : ?>
						<li><a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $_SESSION['usuario']; ?>'><img src='http://sharingdreams.url.ph/img/sem-foto.png' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;'></a></li>
					<?php endif; ?>	

				<?php else : ?>
					<li><a href="http://sharingdreams.url.ph/join" id="menu">Join</a></li>
            		<li><a href="http://sharingdreams.url.ph/login" id="menu">Login</a></li>
				<?php endif; ?>

            </ul>
        </div>

        	<div class="hr" style="margin-top:15px;"></div>
			<center>
				<div class="capa">
				<?php if (isset($foto_perfil)) :?>
					<img src='http://sharingdreams.url.ph/fotos/<?php echo $foto_perfil['nome']; ?>' width="150px" height="150px" style="display:ii; margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php else : ?>
					<img src='http://sharingdreams.url.ph/img/sem-foto.png' width="150px" height="150px" style="display:ii; margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php endif; ?>
					<div class="txtg" style="margin-top:20px;"><?php echo $nome_perfil; ?></div>
					<div class="city"><?php echo $endereco_perfil; ?></div>
					<p class="about-me">
						<?php if ($sobre_perfil != "") :?>
							<?php echo $sobre_perfil; ?>
						<?php else : ?>
							No information avaiable
						<?php endif; ?>
					</p>
				</div>

				<div class="hr" style="margin-top:-13px;"></div>
				
				<div class="gallery">
				<br>
					<div class="txtg" style="margin-top:10px;">My arts</div>
					<br>
					
					<?php if (count($artes_artista) > 0) : ?>

						<ol style="margin-left:-35px; width: 650px;">

						<?php while ($arte_artista = (mysqli_fetch_assoc($artes_pagina))) : ?>
							<li align="center" style="display: inline-block; width: 300px;">
								<div class="view view-fifth">

									<img src="http://sharingdreams.url.ph/artes/<?php echo $arte_artista['nome']; ?>" style="width:300px; height: 200px;" />
									<div class="mask">
										<center>
										<br>
											Did you like it?
										<br>
											<a href="http://sharingdreams.url.ph/?art=<?php echo $arte_artista['id']; ?>" style="margin-top:15px;" class="donate">
												See more
											</a>

										</center>

										<?php if (isset($foto_perfil)) :?>
											<img src='http://sharingdreams.url.ph/fotos/<?php echo $foto_perfil['nome']; ?>' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php else : ?>
											<img src='http://sharingdreams.url.ph/img/sem-foto.png' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php endif; ?>
										<p class="name-art" style="position:absolute;">"<?php echo $arte_artista['nome_arte']; ?>"</p>
										<p class="name-author" style="position:absolute;"><?php echo $nome_perfil; ?></p>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
						

						<center>
			                <?php

			                    if ($pagina_atual > 1) {
			                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/conta.php?id=$id_perfil&page=".($pagina_atual - 1)."'><<</a></div>";
			                    }

			                    for($i = $inicio; $i <= $limite + 1; $i++) {
			                        if ($i == $pagina_atual) {
			                            echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
			                        } else {
			                            if ($i >= 1 && $i <= $numPaginas) {
			                                echo "<div class='page-button'><a  id='num-page' href='http://sharingdreams.url.ph/conta.php?id=$id_perfil&page=$i'>".$i."</a></div> ";
			                            }
			                        }
			                    }

			                    if ($pagina_atual < $numPaginas) {
			                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/conta.php?id=$id_perfil&page=".($pagina_atual + 1)."'>>></a></div>";
			                    }
			                ?>
			            </center>
						</ol>

					<?php else : ?>
						<h2>No arts!</h2>
					<?php endif; ?>
				</div>
			</center>
			
		<div style="height:50px;"></div>

	</body>
</html>
