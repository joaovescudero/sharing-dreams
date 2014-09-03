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
                            <img src="artes/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ol>
            </div>
            
            <?php endif; ?>

            <center>
                <?php

                    if ($pagina_atual > 1) {
                        echo "<div class='page-button'><a href='/?page=".($pagina_atual - 1)."'><<</a></div>";
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
                        echo "<div class='page-button'><a href='/?page=".($pagina_atual + 1)."'>>></a></div>";
                    }
                ?>
            </center>

            <br>
        </div>
