

		<div class="gallery">
            <div class="txtg" style="margin-top:20px;">Search: <?php echo protege_busca($_GET['q']); ?></div>
            <br>
            <div style="margin-left:-35px;">
            <ol style="width: 630px;">
                <?php while ($arte = (mysqli_fetch_assoc($artes_pagina))) : ?>
                        <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                ?>
                    <li align="center" style="display: inline-block; width: 300px;">
                        <div class="view view-fifth">
                            <img src="http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>    <a href="#" style="margin-top:15px;" class="donate">
                                        Donate $1
                                    </a>
                                    <div style="height:5px;"></div>
                                    <div class="fb-like" data-href="http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                        <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.url.ph/&media=http://sharingdreams.url.ph/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $usuario_artista; ?>! I love it!!" data-pin-do="buttonPin">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    </a>
                                </center>

                                
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $usuario_artista; ?>'><img src="http://sharingdreams.url.ph/fotos/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php else : ?>
                                    <a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $usuario_artista; ?>'><img src="http://sharingdreams.url.ph/img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"<?php echo $arte['nome_arte']; ?>"</p>
                                <a href='http://sharingdreams.url.ph/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php echo $nome_artista; ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ol>

                <center>
                <?php

                    if ($pagina_atual > 1) {
                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/?q=$busca&page=".($pagina_atual - 1)."'><<</a></div>";
                    }

                    for($i = $inicio; $i <= $limite + 1; $i++) {
                        if ($i == $pagina_atual) {
                            echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
                        } else {
                            if ($i >= 1 && $i <= $numPaginas) {
                                echo "<div class='page-button'><a  id='num-page' href='http://sharingdreams.url.ph/?q=$busca&page=$i'>".$i."</a></div> ";
                            }
                        }
                    }

                    if ($pagina_atual < $numPaginas) {
                        echo "<div class='page-button'><a href='http://sharingdreams.url.ph/?q=$busca&page=".($pagina_atual + 1)."'>>></a></div>";
                    }
                ?>
            </center>
            
            <br>
            </div>
        </div>

