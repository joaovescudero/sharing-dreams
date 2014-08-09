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
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/cadastro.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<script src="http://anontime.com/vunch/js/jquery.js"></script>
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.min.js"></script> 
		<script src="http://anontime.com/vunch/js/jquery-ui-1.10.4.custom.js"></script> 
		<script src="http://anontime.com/vunch/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://anontime.com/vunch/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/datepicker.css">
		<script src="js/datepicker.js"></script>  
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
                <a href='http://sharingdreams.url.ph/'><img src="img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <li id="menu">Settings</li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='fotos/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-38px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src="img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-38px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
		<div class="hr" style="margin-top:15px;"></div>
        <div class='form' style="text-align:center;">
        <center>
        	<div style="height:30px;"></div>

			<form action="" method="post" enctype="multipart/form-data">
					<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

						<label>
							<input type='text' name='email' value='<?php echo htmlspecialchars($cadastro['email']); ?>' placeholder='Type here your email'>	
							<?php if ($tem_erros && isset($erros_validacao['email'])) : ?>
								<span class='erro'><?php echo $erros_validacao['email']; ?></span>
							<?php endif; ?>
						</label>

						<label>
							<input type='text' name='endereco' value='<?php echo htmlspecialchars($cadastro['endereco']); ?>' placeholder='City, Country'>	
							<?php if ($tem_erros && isset($erros_validacao['endereco'])) : ?>
								<span class='erro'><?php echo $erros_validacao['endereco']; ?></span>
							<?php endif; ?>
						</label>
						
						<br></br>

						<label>
	           				Tell us about you! (optional)
	            			<textarea name='sobre'><?php echo htmlspecialchars($cadastro['sobre']); ?></textarea>
	        			</label>

						<br>

						<fieldset>
							<legend>Select a profile photo</legend>

							<input type="hidden" name="cadastro_id" value="<?php echo $cadastro['id']; ?>">

							<label>
								<?php if ($tem_erros && isset($erros_validacao['foto'])) : ?>
									<span class="erro"><?php echo $erros_validacao['foto']; ?></span>
								<?php endif; ?>
							</label>

							<input type='file' name='foto'>
						</fieldset>

						<br>

						<p class='botoes cancelar'><a href="http://sharingdreams.url.ph/">Cancel</a></p>
						<button type='submit' class='botoes editar' name='editar'>Edit!</button>
						
				</form>
			</center>
		</div>

		<script>
	    	$(document).ready(function () {
	    		$('.datepicker').datepicker();
	    	});
    	</script>
	</body>
</html>