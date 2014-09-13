<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "config.php";
include "banco.php";
include "helper.php";
include "classes/Cadastros.php";
?>

<div class="top">
            <div class="logo">
                <a href='/'><img src="http://sharingdreams.url.ph/img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <li><a href="http://sharingdreams.url.ph/editProfile" id="menu">Settings</a>
                </li>
                <li><a href="http://sharingdreams.url.ph/deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="http://sharingdreams.url.ph/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='http://sharingdreams.url.ph/fotos/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="http://sharingdreams.url.ph/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src="http://sharingdreams.url.ph/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
