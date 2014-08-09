        <div class="gallery">
            <div class="txtg" style="margin-top:20px;">Gallery</div>
            <br>
            <br>
            <?php if (count($artes) > 0) : ?>
            <div style="margin-left:-35px;">
            <ol style="width: 630px;">
                <?php foreach ($artes as $arte) : ?>
                    <li align="center" style="display: inline-block; width: 300px;">
                        <div class="view view-fifth">
                            <img src="artes/<?php echo $arte['nome']; ?>" style="width:300px; height: 200px;"/>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>	<a href="#" style="margin-top:15px;" class="donate">
    									Donate $1
    								</a>

                                </center>

                                <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                ?>
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="fotos/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
    							<?php else : ?>
                                    <a href='conta.php?user=<?php echo $usuario_artista; ?>'><img src="img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"Name"</p>
    							<a href='/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php echo $nome_artista; ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ol>
            </div>
            <?php endif; ?>
        </div>