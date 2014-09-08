<html>
    
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
        <!-- FACEBOOK and pinterest !-->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!-- OK. !-->

        <div class="middle">
            <div class="hr"></div>
            <div class="info_art">
            <?php if (isset($foto_artista)) : ?>    
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="fotos/<?php echo $foto_artista['nome'] ?>" width="60px" height="60px" class="author-image"></a>
                <?php else : ?>
                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="img/sem-foto.png" width="60px" height="60px" class="author-image"></a>
            <?php endif; ?>
                <div class="art_name">
                    "<?php echo $arte['nome_arte']; ?>"
                </div>
                <div class="author_name">
                    by <?php echo $nome_artista; ?>
                </div>
                <div class="amount">
                    <div class="amount_dollar">
                        $0
                    </div>
                    donated
                </div>
            </div>
        </div>
         <div style="height:20px;"></div>

        <div class="art">
            <img src="artes/<?php echo $arte['nome']; ?>" class="full_art">
            <div class="about_donate">
                <div class="why">
                    About donate
                </div>
                <p style"text-indent: 10px;" style=" margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis, felis id aliquet tincidunt, urna neque venenatis metus, vel elementum nulla mauris eu dolor. And flw leks.</p>
                <div class="donate_button">
                    Donate $1
                </div>
            </div>
            <div class="fb-like" data-href="http://sharingdreams.url.ph/artes/2014-08-30-175359.jpg" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display:inherit; margin-top:10px;"></div>
            <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.url.ph/&media=http://sharingdreams.url.ph/artes/2014-08-30-175540.jpg&description=Look this art made by LeoFelipe! I loved it!!" data-pin-do="buttonPin" style="margin-top:-325px; margin-left:420px; position:absolute;">
                <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
            </a>
        </div>

        <div class="more_of">
            <br><br>More of <?php echo $nome_artista; ?><br>
            <?php foreach ($artes_artista as $arte_artista) : ?>
                <img src="artes/<?php echo $arte_artista['nome']; ?>" class="more_of_art">
            <?php endforeach; ?>
        </div>

        <div style="height:40px;"></div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

    </body>

</html>
