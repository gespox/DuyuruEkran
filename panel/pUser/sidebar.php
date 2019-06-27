<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
?>
<style>
    button:focus {outline:0;}
</style>
<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large topbar" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey " onclick="w3_open();"><i class="fa fa-bars"></i>  Menü</button>
    <span class="w3-bar-item w3-right">Duyuru Ekran Paneli</span>
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
<a title="Bildirimler" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-envelope"></i> <span class="w3-badge w3-tiny w3-red" id="bildirimsayisi">9</span></a>
<a href="cikis.php" onclick="return confirm('Çıkış yapmak istiyor musunuz?');" title="Çıkış Yap" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i></a>
</div>
        <div id="id01" class="w3-panel w3-gray w3-opacity-min w3-display-container" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-red w3-display-topright">x</span>
            <div class="w3-container">
                <ul class="w3-ul w3-card-4">
                    <li class="w3-display-container bildirimler">Jill <span onclick="this.parentElement.parentNode.removeChild(this.parentElement);bildirimGuncelle()" class="w3-button w3-transparent w3-display-right">&times;</span></li>
                    <li class="w3-display-container bildirimler">Adam <span onclick="this.parentElement.parentNode.removeChild(this.parentElement);bildirimGuncelle()" class="w3-button w3-transparent w3-display-right">&times;</span></li>
                    <li class="w3-display-container bildirimler">Eve <span onclick="this.parentElement.parentNode.removeChild(this.parentElement);bildirimGuncelle()" class="w3-button w3-transparent w3-display-right">&times;</span></li>
                </ul>
            </div>
        </div>
</div>
    <script>
        var bildirimSayisi=document.getElementById("bildirimsayisi");
        var sayi= document.getElementsByClassName("bildirimler").length;
        bildirimSayisi.innerText=sayi;
        if(sayi==0){
            bildirimSayisi.style.display="none";
        }
        else{
            bildirimSayisi.innerText=sayi;
        }
        function bildirimGuncelle() {
             bildirimSayisi=document.getElementById("bildirimsayisi");
             sayi= document.getElementsByClassName("bildirimler").length;
             if(sayi==0){
                 bildirimSayisi.style.display="none";
             }
             else{
            bildirimSayisi.innerText=sayi;}
        }

    </script>
<hr>
<!--
<div class="w3-bar-block">

    <a href="pUser.php" class="w3-bar-item w3-button w3-padding geneldurum"><i class="fas fa-desktop fa-fw"></i>  Genel Durum</a>
    <a href="ilanDuzenle.php" class="w3-bar-item w3-button w3-padding ilanduzenle"><i class="fas fa-edit fa-fw"></i>  İlan Düzenleme</a>
    <a href="ilanEkle.php" class="w3-bar-item w3-button w3-padding ilanekleme"><i class="fa fa-plus fa-fw"></i>  İlan Ekleme</a>
    <a href="firmaBilgi.php" class="w3-bar-item w3-button w3-padding firmabilgi"><i class="fa fa-building fa-fw"></i>  Firma Bilgileri</a>
    <a href="ayarlar.php" class="w3-bar-item w3-button w3-padding ayarlar"><i class="fa fa-cog fa-fw"></i>  Ayarlar</a><br><br>
</div>
-->

    <div class="w3-container">

            <div class="w3-center w3-deep-orange w3-hover-red w3-padding-small w3-round-xxlarge w3-margin-bottom" style="cursor: pointer" >
                <i class="fas fa-desktop fa-3x"></i><br>
                <h5 class="w3-wide"><b>Ekrani Izle</b></h5>
            </div>

        <button class="w3-button w3-padding-16 w3-hide-large w3-block w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Menüyü Kapat </button>
        <button class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Bilgi Ekrani </button>
        <button onclick="myFunction('orta')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Orta Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="orta" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="#">Link 1</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 2</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 3</a>
        </div>
        <button onclick="myFunction('alt')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Alt Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="alt" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="#">Link 1</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 2</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 3</a>
        </div>
        <button onclick="myFunction('sag')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Sag Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="sag" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="#">Link 1</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 2</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 3</a>
        </div>
        <button onclick="myFunction('ayarlar')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Ayarlar &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="ayarlar" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="#">Link 1</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 2</a>
            <a class="w3-button w3-block w3-left-align" href="#">Link 3</a>
        </div>
    </div>
    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
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