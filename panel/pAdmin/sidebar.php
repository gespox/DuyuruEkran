<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
require_once "../../baglan.php";
?>
<style>
    a:hover {
        text-decoration: none;
    }
    button:focus {outline:0;}
</style>
<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large topbar" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey " onclick="w3_open();"><i class="fa fa-bars"></i> Menü</button>
    <span class="w3-bar-item w3-right">Admin Paneli</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <?php
            $id=$_SESSION["id"];
            $sorgu = $conn->prepare("SELECT * FROM kullanici WHERE id_kullanici=?"); // sql yazarak verilerin doğruluğunu kontrol ediyoruz.
            $sorgu->execute(array($id)); //Kontrol edilecek olan değişkenleri yazdık
            $islem = $sorgu->fetch();
            ?>
            <img src="<?php echo $islem['avatar'];?>" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Hoşgeldin, <strong><?php echo $_SESSION['adsoyad'];?></strong></span><br>

            <a href="cikis.php" onclick="return confirm('Çıkış yapmak istiyor musunuz?');" title="Çıkış Yap" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i></a>
        </div>

    </div>
    <hr>
    <div class="w3-container sidebarMenu">
        <button class="w3-button w3-padding-16 w3-hide-large w3-block w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Menüyü Kapat </button>
        <a href="kullaniciEkle.php" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red"><i class="fas fa-caret-right"></i> Kullanici Ekle</a>
        <a href="bildirimGonder.php" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red"><i class="fas fa-caret-right"></i> Bildirim Gonder</a>
        <a href="ayarlar.php" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red"><i class="fas fa-caret-right"></i> Ayarlar</a>
    </div>
</nav>
<script>function w3_open() {
        var mySidebar=document.getElementById("mySidebar");

        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    } </script>