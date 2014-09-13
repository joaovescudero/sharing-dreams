<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Edit!</title>
		<link rel="stylesheet" href="http://sharingdreams.url.ph/css/bootstrap.css">
		<link rel="stylesheet" href="http://sharingdreams.url.ph/css/index.css">
        <link rel="stylesheet" href="http://sharingdreams.url.ph/css/cadastro.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<script src="http://anontime.com/vunch/js/jquery.js"></script>
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.min.js"></script> 
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.js"></script> 
		<script src="http://anontime.com/vunch/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://anontime.com/vunch/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://sharingdreams.url.ph/css/datepicker.css">
		<script src="http://sharingdreams.url.ph/js/datepicker.js"></script>  
	</head>
	<body>

		<style>
			.botoes {
				display: inline-block;
				margin-bottom: 10px;
				margin-left: 8px;
			}
			
			.editar {
				background-color: green;
				color: white;
			}

			.cancelar {
				color: black;
				background-color: gray;
				padding: 10px;
				text-decoration: none;
			}
		</style>

		<div class="top">
            <div class="logo">
                <a href='http://sharingdreams.url.ph/'><img src="http://sharingdreams.url.ph/img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <li id="menu">Settings</li>
                <li><a href="http://sharingdreams.url.ph/deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="http://sharingdreams.url.ph//conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='http://sharingdreams.url.ph/fotos/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="http://sharingdreams.url.ph//conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src="http://sharingdreams.url.ph/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
		<div class="hr" style="margin-top:15px;"></div>
        <div class='form' style="text-align:center;">
        <center>
        	<div style="height:30px;"></div>

			<form method="post">
					<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

					<label>
						<input type='password' name='senha_atual' id='senha' placeholder='Type here your password'>
						<?php if ($tem_erros && isset($erros_validacao['senha_atual'])) : ?>
		               		<span class="erro"><?php echo $erros_validacao['senha_atual']; ?></span>
		           		<?php endif; ?>
					</label>

						<label>
							<input type='password' name='senha' id='senha' placeholder='Type here your new password'>
							<?php if ($tem_erros && isset($erros_validacao['senha'])) : ?>
		                		<span class="erro"><?php echo $erros_validacao['senha']; ?></span>
		            		<?php endif; ?>
						</label>

						<label>
							<input type='password' name='senha2' placeholder='Type here your new password again!'>
							<?php if ($tem_erros && isset($erros_validacao['senha2'])) : ?>
		                		<span class="erro"><?php echo $erros_validacao['senha2']; ?></span>
		            		<?php endif; ?>
						</label>

						<br>

						<br>

						<p class='botoes cancelar'><a href="http://sharingdreams.url.ph/">Cancel</a></p>
						<button type='submit' class='botoes editar' name='editar'>Edit!</button>
						
				</form>
			</center>
		</div>
	</body>
</html>
