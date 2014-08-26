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
        <a href='/'><img src="img/logo.png"></a>
    </div>
    <ul>
        <li>About</li>
        <li><a href="/join" id="menu">Join</a></li>
        <li><a href="/login" id="menu">Login</a></li>
    </ul>
</div>
<div class="middle">
    <div class="hr"></div>
        <div class="txtg" style="margin-top:55px;">Help kids around the world.
            <br>	<a href="#" style="font-size:18px;">About</a>
            <br>
            <img src="img/about.png" style="margin-top:20px;">
        </div>
    <div class="hr" style="margin-top:15px;"></div>
</div>