

        <div class="top">
            <div class="logo">
                <a href='/'><img src="img/logo.png"></a>
            </div>
            <ul>
                <li>About</li>
                <li><a href="/editProfile" id="menu">Settings</a>
                </li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='fotos/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src="img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
        <div class="middle">
            <div class="hr"></div>
            <div class="txtg" style="margin-top:55px;">Show your talent to the world and help kids! Submit your best art! :-)
            </div>

            <label>
                    <?php if (isset($sem_erros['arte'])) : ?>
                        <p class="erro" style='text-align: center; font-weight: bold;'><?php echo $sem_erros['arte']; ?></p>
                    <?php endif; ?>
            </label>
            
            <center>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php if ($tem_erros && isset($erros_validacao['nome_arte'])) : ?>
                        <span class='erro'><?php echo $erros_validacao['nome_arte']; ?></span>
                    <?php endif; ?>
                    <br>
                    <input type="hidden" name="cadastro_id" value="<?php echo $_SESSION['id']; ?>">
                    <label>
                        <?php if ($tem_erros && isset($erros_validacao['arte'])) : ?>
                            <p class="erro" style='font-weight: bold;'><?php echo $erros_validacao['arte']; ?></p>
                        <?php endif; ?>
                    </label>
                    <div class="img_select">
                        Click to<br>select an art.
                    </div>
                    <label>
                        <input type='text' name='nome_arte' placeholder="Art's name" class="art_name2">
                    </label>
                    <input id="upload_input" type="file" name='arte'/>
                    <br>
<<<<<<< HEAD
                    <button class="upload_button">
                        Submit
                    </button>
=======
                    <div class="upload_button">
                        Submit
                    </div>
>>>>>>> 9b5a830a71b81205464b0f5eae604af88cecaa51

                </form>


            </center>
            <div class="hr" style="margin-top:15px;"></div>
        </div>

        <script src="https://code.jquery.com/jquery-1.8b2.min.js"></script>
        <script>
        $(function(){
                $("#upload_input").change(function(){
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            // faz as paradas
                            $('.img_select').css('background', "url("+e.target.result+") no-repeat" );
                            $('.img_select').css('background-size', "220px 120px");
                            $('.img_select').text("");
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
         
                $(".img_select").click(function(){
                     $("#upload_input").trigger('click');
                });
        })
         
         
        </script>
