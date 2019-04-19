<?php
session_start();
function yonlendir($url){
    if (!headers_sent()){
        header('Location: '.$url);
        exit;
    }
    else{
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
if(!isset($_SESSION['id'])) {
    yonlendir("../../index.php");
}
else{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Duyuru Duzenleme Paneli</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="panelUser.css">
    </head>
    <body>
    <div id="header">
        <?php //include "header.php"; ?>
        <div class="logo">
            <a href="#">Duyuru <span>Duzenleme Paneli</span></a>
        </div>
        <div class="bilgiler">
            <span>  <?php //echo "Tekniker: ". $_SESSION["ad"]." ".$_SESSION["soyad"]." " ; ?></span>
            <form id="cikisbtn" action="../cikis.php">
                <button id="cikisbtn" onclick="return confirm('Cikis yapmak istiyor musunuz?');" name="cikisbtn"><img src="img/cik.svg" width="24" height="24" > Çıkış Yap</button>
            </form>
        </div>
    </div>
    <div id="container">
        <?php //include "sidebar.php"; ?>
        <div class="sidebar">
            <ul id="nav">
                <li  >
                    <a href="#"> <img src="img/genel.svg" width="24" height="24" > Genel Durum</a>
                </li>
                <li>
                    <a href="#"> <img src="img/servis.svg" width="24" height="24" > Servis Düzenle</a>
                </li>
                <li>
                    <a href="#"> <img src="img/musteri.svg" width="24" height="24" > Müşteriler</a>
                </li>
                <li >
                    <a href="#"><img src="img/marka.svg" width="24" height="24" >Markalar</a>
                </li>
                <li>
                    <a href="#"> <img src="img/cihaz.svg" width="24" height="24" > Cihazlar</a>
                </li>
                <li>
                    <a href="#"> <img src="img/tekniker.svg" width="24" height="24" > Tekniker Ekip</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <?php //include "maincontent.php"; ?>
            <h1>Admin Paneli</h1>
            <span>Genel Gorunum...</span>
            <div id="box">
                <div class="box-top">Servisteki Urunler</div>
                <div class="box-panel">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis delectus facilis sunt temporibus vero voluptate. Aliquam consequatur deserunt, distinctio dolorem facilis, illo ipsam, nam nulla numquam provident quis sed tempora.
                    <style><?php include('panelcss/servis.css'); ?></style>
                    <?php //include "servis.php"; ?>
                </div>
            </div>
            <div id="box">
                <div class="box-top">Markalar </div>
                <div class="box-panel">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam assumenda, blanditiis, consectetur dolore eaque enim illo iste iure modi mollitia natus nulla officiis omnis quaerat quisquam sint totam veritatis.
                    <style><?php include('panelcss/marka.css'); ?></style>
                </div>
            </div>
            <div id="box">
                <div class="box-top">Cihazlar</div>
                <div class="box-panel">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusamus cum dignissimos dolores eos error ex explicabo facere inventore nesciunt numquam obcaecati reiciendis saepe. Iste itaque molestiae non optio veniam.
                    <style><?php include('panelcss/cihaz.css'); ?></style>
                </div>
            </div>
            <div id="box">
                <div class="box-top">Teknik Ekip</div>
                <div class="box-panel">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis consectetur dolor doloremque dolores error laboriosam modi numquam placeat provident quisquam, sunt velit voluptates. Amet itaque modi nihil quas sit?
                    <style><?php include('panelcss/ekip.css'); ?></style>
                </div>
            </div>
        </div>
    </div>
    <!-- #container -->
    <script src="paneljs/ajax.js" type="text/javascript"></script>
    </body>
    </html>
    <?php
}
?>