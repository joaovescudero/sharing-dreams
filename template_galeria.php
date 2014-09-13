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
            <?php if (count($artes) > 0) : ?>
            <div style="margin-left:-35px;">
            <ol style="width: 630px;">
                <?php while ($arte = (mysqli_fetch_array($artes_pagina))) : ?>
                    <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                ?>
                    <li align="center" style="display: inline-block; width: 300px;">
                        <div class="view view-fifth">
                        <?php if(file_exists("http://sharingdreams.url.ph/artes/thumbnails/".$arte['nome'])){?>
                            <img src="http://sharingdreams.url.ph/artes/thumbnails/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                        <?php }else{ ?>
                            <img src="http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                        <?php } ?>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>	<a href="http://sharingdreams.url.ph/?art=<?php echo $arte['id']; ?>" style="margin-top:15px;" class="donate">
    									See more
    								</a>
                                    <div style="height:5px;"></div>
                                    <div class="fb-like" data-href="http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                        <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.url.ph/&media=http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $usuario_artista; ?>! I loved it!!" data-pin-do="buttonPin">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    </a>
                                </center>

                                
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $usuario_artista; ?>'><img src="http://sharingdreams.url.ph/fotos/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
    							<?php else : ?>
                                    <a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $usuario_artista; ?>'><img src="http://sharingdreams.url.ph/img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"<?php echo $arte['nome_arte']; ?>"</p>
    							<a href='/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php echo $nome_artista; ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ol>
            </div>
            
            <?php endif; ?>

            <center>
                <?php

                    if ($pagina_atual > 1) {
                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/?page=".($pagina_atual - 1)."'><<</a></div>";
                    }

                    for($i = $inicio; $i <= $limite + 1; $i++) {
                        if ($i == $pagina_atual) {
                            echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
                        } else {
                            if ($i >= 1 && $i <= $numPaginas) {
                                echo "<div class='page-button'><a  id='num-page' href='/?page=$i'>".$i."</a></div> ";
                            }
                        }
                    }

                    if ($pagina_atual < $numPaginas) {
                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/?page=".($pagina_atual + 1)."'>>></a></div>";
                    }
                ?>
            </center>

            <br>
        </div>

