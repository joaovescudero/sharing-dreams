        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>


<div class="gallery">
            <div class="txtg" style="margin-top:20px;">Gallery</div>
            <br>
            <br>
            <?php if (count($artes) > 0) : ?>
            <div style="margin-left:-35px;">
            <ol style="width: 630px;">
                <?php foreach ($artes as $arte) : ?>
                    <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                ?>
                    <li align="center" style="display: inline-block; width: 300px;">
                        <div class="view view-fifth">
                            <img src="artes/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>	<a href="#" style="margin-top:15px;" class="donate">
    									Donate $1
    								</a>
                                    <div style="height:5px;"></div>
                                    <div class="fb-like" data-href="http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                        <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.url.ph/&media=http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $usuario_artista; ?>! I love it!!" data-pin-do="buttonPin">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    </a>
                                </center>

                                
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="fotos/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
    							<?php else : ?>
                                    <a href='conta.php?user=<?php echo $usuario_artista; ?>'><img src="img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"<?php echo $arte['nome_arte']; ?>"</p>
    							<a href='/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php echo $nome_artista; ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ol>
            </div>
            <?php endif; ?>
        </div>