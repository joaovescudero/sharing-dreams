<div class="top">
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <ul>
                <li>About</li>
                <li><a href="/editProfile" id="menu">Settings</a>
                </li>
                <li><a href="/editPass" id="menu">Settings2</a>
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
        <div class="middle">
            <div class="hr"></div>
            <div class="txtg" style="margin-top:55px;">Show your talent to the world and help kids! Submit your best art! :-)
                <br>
                <br>
            </div>

            <label>
                    <?php if (isset($sem_erros['arte'])) : ?>
                        <p class="erro" style='text-align: center; font-weight: bold;'><?php echo $sem_erros['arte']; ?></p>
                    <?php endif; ?>
            </label>
            
            <center>First, select the file:
                <br>

                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="cadastro_id" value="<?php echo $_SESSION['id']; ?>">

                    <label>
                        <?php if ($tem_erros && isset($erros_validacao['arte'])) : ?>
                            <p class="erro" style='font-weight: bold;'><?php echo $erros_validacao['arte']; ?></p>
                        <?php endif; ?>
                    </label>

                    <input type='file' name='arte'>

                    <br>
                    <br>Then, you can upload if you want:
                    <br>
                    <button type="submit">Let's Rock!</button>

                </form>


            </center>
            <br>
            <div class="hr" style="margin-top:15px;"></div>
        </div>
