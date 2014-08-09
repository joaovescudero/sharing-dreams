<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Profile: <?php echo $usuario_perfil; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<script src="http://anontime.com/vunch/js/jquery.js"></script>
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="http://anontime.com/vunch/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://anontime.com/vunch/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/datepicker.css">
		<script src="js/datepicker.js"></script> 

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

		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>

         <div class="top">
            <div class="logo">
                <a href="http://sharingdreams.url.ph/"><img src="img/logo.png"></a>
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
                	<li><a href='/editProfile' id='menu'>Settings</a>
					
					<li><a href='deslogar.php' id='menu'>Logout</a>

			   		<?php if (isset($_SESSION['foto'])) : ?>
						<li><a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='fotos/<?php echo $_SESSION['foto']['nome']; ?>' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-38px;'></a></li>
					<?php else : ?>
						<li><a href='/conta.php?user=<?php echo $_SESSION['usuario']; ?>'><img src='img/sem-foto.png' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-38px;'></a></li>
					<?php endif; ?>	

				<?php else : ?>
					<li><a href="/join" id="menu">Join</a></li>
            		<li><a href="/login" id="menu">Login</a></li>
				<?php endif; ?>

            </ul>
        </div>

        	<div class="hr" style="margin-top:15px;"></div>
			<center>
				<div class="capa">
				<?php if (isset($foto_perfil)) :?>
					<img src='fotos/<?php echo $foto_perfil['nome']; ?>' width="150px" height="150px" style=" margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php else : ?>
					<img src='img/sem-foto.png' width="150px" height="150px" style=" margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php endif; ?>
					<div class="txtg" style="margin-top:20px;"><?php echo $nome_perfil; ?></div>
					<div class="city"><?php echo $endereco_perfil; ?></div>
					<p class="about-me">
						<?php if ($sobre_perfil != "") :?>
							<?php echo $sobre_perfil; ?>
						<?php else : ?>
							We do not know nothing about you!
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

						<?php foreach ($artes_artista as $arte_artista) : ?>
							<li align="center" style="display: inline-block; width: 300px;">
								<div class="view view-fifth">

									<img src="artes/<?php echo $arte_artista['nome']; ?>" style="width:300px; height: 200px;" />
									<div class="mask">
										<center>
										<br>
											Did you like it?
										<br>
											<a href="#" style="margin-top:15px;" class="donate">
												Donate $1
											</a>

										</center>

										<?php if (isset($foto_perfil)) :?>
											<img src='fotos/<?php echo $foto_perfil['nome']; ?>' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php else : ?>
											<img src='img/sem-foto.png' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php endif; ?>
										<p class="name-art" style="position:absolute;">"Name"</p>
										<p class="name-author" style="position:absolute;"><?php echo $nome_perfil; ?></p>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
						
						</ol>

					<?php else : ?>
						<h2>You don't have any art!</h2>
					<?php endif; ?>
				</div>
			</center>
			
		<div style="height:50px;"></div>

	</body>
</html>