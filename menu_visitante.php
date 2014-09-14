<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


include "config.php";
include "banco.php";
include "helper.php";

?>

<div class="top">
    <div class="logo">
        <a href='/'><img src="http://sharingdreams.url.ph/img/logo.png" class="logo_img"></a>
    </div>
    <ul class="menu_list">
        <li>About</li>
        <li><a href="/join" id="menu">Join</a></li>
        <li><a href="/login" id="menu">Login</a></li>
    </ul>
</div>
<div class="middle">
    <div class="hr"></div>
        <div class="txtg">Help kids around the world.
            <br>	<a href="#" style="font-size:18px;">About</a>
            <br>
            <img src="http://sharingdreams.url.ph/img/about.png" class="about_img">
        </div>
    <div class="hr" style="margin-top:15px;"></div>
</div>
