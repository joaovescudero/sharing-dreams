<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Login- Sharing Dreams</title>
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

		<div class="top">
            <div class="logo">
                <a href="http://sharingdreams.url.ph"><img src="img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <li><a href="/join" id="menu">Join</a></li>
                <li>Login</li>
            </ul>
        </div>

        <div class="hr" style="margin-top:15px;"></div>
		<center>
		<div class="txtg" style="margin-top:20px;">Login</div>

		<form method='POST'>

			<?php if ($erro_login && isset($erros_validacao['invalido'])) : ?>
                <span class="erro"><?php echo $erros_validacao['invalido']; ?></span>
            <?php endif; ?>

			<fieldset>
				<label>
					<input type='text' name='usuario' value='<?php echo $cadastro['usuario']; ?>' placeholder="Username">
					<?php if ($tem_erros && isset($erros_validacao['login_usuario'])) : ?>
                		<span class="erro"><?php echo $erros_validacao['login_usuario']; ?></span>
            		<?php endif; ?>
				</label>
				<label>
					<input type='password' name='senha' value='<?php echo $cadastro['senha']; ?>' placeholder="Password">
					<?php if ($tem_erros && isset($erros_validacao['login_senha'])) : ?>
                		<span class="erro"><?php echo $erros_validacao['login_senha']; ?></span>
            		<?php endif; ?>
				</label>

				<button type='submit' value='Go'>Go!</button>
			</fieldset>
		</form>
	</body>
</html>