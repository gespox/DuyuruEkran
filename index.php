<?php session_start();?>
<!DOCTYPE html>
<html>
<title>Dijital Duyuru Ekranları </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="css/main.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

    body, html {
        height: 100%;
        line-height: 1.8;
    }
    /* Full height image header */
    .bgimg-1 {
        background-size: cover;
        background-position: center;
        background-image: url("img/bg.png");
        min-height: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }
</style>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Admin Paneline Giris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Giris Yapin</h5>
                    <form class="form-signin" method="post">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="email adresi" name="email" required autofocus>
                            <label for="inputEmail">E-Mail Adresi</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Sifre" name="psw" required>
                            <label for="inputPassword">Sifre</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" name="hatirla" id="customCheck1" value="1">
                            <label class="custom-control-label" for="customCheck1">Sifreyi Hatirla</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="girisbtn">Giris Yap</button>
                    </form>
                </div>
                <?php require_once "login.php";?>
            </div>

        </div>
    </div>
</div>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button w3-wide">Duyuru Ekran</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
            <a href="#about" class="w3-bar-item w3-button">Hakkımızda</a>
            <a href="#team" class="w3-bar-item w3-button"><i class="fas fa-user-friends"></i> Ekip</a>
            <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> İletişim</a>
            <a href="#" class="w3-bar-item w3-button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-sign-in-alt"></i> Giriş</a>
        </div>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->

        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Kapat ×</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Hakkımızda</a>
    <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">Ekip</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">İletişim</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button" data-toggle="modal" data-target="#exampleModalCenter">Giriş</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home" >
    <div class="w3-display-left w3-text-white" style="padding:48px">
        <br>
        <br><br>
        <br><br>
        <br><br>
        <br>
        <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Daha Fazlasını Öğren</a></p>
    </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
    <h3 class="w3-center">HAKKIMIZDA</h3>

    <div class="w3-row-padding w3-center" style="margin-top:64px">
        <div class="w3-quarter">
            <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
            <p class="w3-large">Uzaktan Yönetim </p>
            <p>Yayınlayacağınız duyuruyu internet olan her yerden yöneterek zamandan ve paradan tasarruf sağlayın.</p>
        </div>
        <div class="w3-quarter">

            <i class="fas fa-hand-holding-heart w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">Kullanıcı Dostu</p>
            <p>Basit arayüz yardımıyla hiçbir kod bilgili gerekmeden kolayca kullanın.</p>
        </div>

        <div class="w3-quarter">
            <i class="fas fa-headset w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">7/24 Destek </p>
            <p>İhtiyaç duyduğunuz her an teknik ekibimiz bir tık ötenizde</p>
        </div>

        <div class="w3-quarter">

            <i class="fas fa-users w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">Kolay Erişim</p>
            <p>Yayınladığınız duyurularla istediğiniz hedef kitleye kısa sürede ulaşın.</p>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
    <h3 class="w3-center">EKİP BİLGİLERİ </h3>

    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">


                <div class="w3-container">
                    <img src="img/sait.jpeg" alt="Sait"  height="250" width="100%">
                    <h3>Mehmet Sait OKAN</h3>
                    <p class="w3-opacity">Bilgisayar Mühendisi</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> İletişim </button></p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">

                <div class="w3-container">
                    <img src="img/dyg.jpeg" alt="Duygu" height="250" width="100%">
                    <h3>Duygu KARAKAVUK</h3>
                    <p class="w3-opacity">Bilgisayar Mühendisi</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> İletişim </button></p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">

                <div class="w3-container">
                    <img src="img/gyuksek.jpg" alt="Gürkan" height="250" width="100%">
                    <h3>Ahhmet Gürkan YÜKSEK</h3>
                    <p class="w3-opacity">Ekip Sorumlusu</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> İletişim </button></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
    <h3 class="w3-center">İLETİŞİM</h3>

    <div style="margin-top:48px">
        <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Sivas,Türkiye </p>
        <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: iletisim@duyuruekran.com</p>
        <br>
        <form action="#" target="_blank">
            <p><input class="w3-input w3-border" type="text" placeholder="İsim" >   </p>
            <p><input class="w3-input w3-border" type="text" placeholder="Email">   </p>
            <p><input class="w3-input w3-border" type="text" placeholder="Mesajınız"> </p>
            <p>
                <button class="w3-button w3-black" type="submit">
                    <i class="fa fa-paper-plane"></i> MESAJ GÖNDER
                </button>
            </p>
        </form>
        <!-- Image of location/map -->

    </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Yukarı</a>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/mainjs.js"></script>
</body>
</html>