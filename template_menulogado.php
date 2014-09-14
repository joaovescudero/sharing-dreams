

        <div class="top">
            <div class="logo">
                <a href='/'><img src="http://sharingdreams.url.ph/img/logo.png" class="logo_img"></a>
            </div>
            <ul>
                <li id="about_li">About</li>
                <li><a href="http://sharingdreams.url.ph/editProfile" id="menu">Settings</a>
                </li>
                <li><a href="http://sharingdreams.url.ph/deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="http://sharingdreams.url.ph//conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src='http://sharingdreams.url.ph/fotos/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" class="perfil_img_menu" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="http://sharingdreams.url.ph//conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img src="http://sharingdreams.url.ph/img/sem-foto.png" width="50px" height="50px" class="perfil_img_menu" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
        <div class="middle">
            <div class="hr"></div>
            <div class="txtg">Show your talent to the world and help kids! Submit your best art! :-)
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
                    <button class="upload_button">
                        Submit
                    </button>

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
