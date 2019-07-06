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
    a{
        text-decoration: none;
    }
    a:hover {
        text-decoration: none;
    }
    button:focus {outline:0;}
</style>
<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large topbar" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey " onclick="w3_open();"><i class="fa fa-bars"></i> Menü</button>
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
            <span>Hoşgeldin, <strong><?php echo $islem['adsoyad'];?></strong></span><br>
            <a title="Bildirimler" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-envelope"></i> <span class="w3-badge w3-tiny w3-red" id="bildirimsayisi">9</span></a>
            <a href="cikis.php" onclick="return confirm('Çıkış yapmak istiyor musunuz?');" title="Çıkış Yap" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div id="id01" class="w3-panel w3-gray w3-opacity-min w3-display-container" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-red w3-display-topright">x</span>
            <div class="w3-container">
                <ul class="w3-ul w3-card-4">
                    <?php
                    if($_SESSION['bildirim']) {
                        $sqlBildirim = "SELECT * FROM bildirim";
                        $resultBildirim = $conn->query($sqlBildirim);
                        $countbildirim = $resultBildirim->rowCount();
                        if ($countbildirim > 0) {
                            while ($rowBildirim = $resultBildirim->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li class="w3-display-container bildirimler"><?php echo $rowBildirim['bildirimText'] ?>
                                    <span onclick="this.parentElement.parentNode.removeChild(this.parentElement);bildirimGuncelle()"
                                          class="w3-button w3-transparent w3-display-right">&times;</span></li>
                                <?php
                            }
                        }
                    }
                   ?>
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
            <?php $_SESSION['bildirim']=0;  ?>
        }
        else{
            bildirimSayisi.innerText=sayi;
        }
        function bildirimGuncelle() {
             bildirimSayisi=document.getElementById("bildirimsayisi");
             sayi= document.getElementsByClassName("bildirimler").length;
             if(sayi==0){
                 bildirimSayisi.style.display="none";
                 <?php $_SESSION['bildirim']=0;  ?>
             }
             else{
            bildirimSayisi.innerText=sayi;}
        }
    </script>
<hr>
    <div class="w3-container sidebarMenu">
        <?php
        $sorgu = $conn->prepare("SELECT id_ekran FROM ekran WHERE kullanici_id=?"); // sql yazarak verilerin doğruluğunu kontrol ediyoruz.
        $sorgu->execute(array($id)); //Kontrol edilecek olan değişkenleri yazdık
        $islem = $sorgu->fetch();
        ?>
        <img src="" class="w3-circle w3-margin-right" style="width:46px">
        <a href="../../ekran/template.php?eId=<?php echo $islem['id_ekran'];?>" target="_blank">
            <div class="w3-center w3-deep-orange w3-hover-red w3-padding-small w3-round-xxlarge w3-margin-bottom" style="cursor: pointer" >
                <i class="fas fa-desktop fa-3x"></i><br>
                <h5 class="w3-wide"><b>Ekrani Izle</b></h5>
            </div></a>
        <button class="w3-button w3-padding-16 w3-hide-large w3-block w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Menüyü Kapat </button>
        <button class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Bilgi Ekrani </button>
        <button onclick="myFunction('orta')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Orta Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="orta" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="OrtaSlider.php">&emsp;<i class="fas fa-caret-right"></i> Slider</a>
            <a class="w3-button w3-block w3-left-align" href="OrtaResimli.php">&emsp;<i class="fas fa-caret-right"></i> Resimli Duyuru</a>
            <a class="w3-button w3-block w3-left-align" href="OrtaResimsiz.php">&emsp;<i class="fas fa-caret-right"></i> Resimsiz Duyuru</a>
        </div>
        <button onclick="myFunction('alt')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Alt Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="alt" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="AltDuyuru.php">&emsp;<i class="fas fa-caret-right"></i> Kayan Duyuru</a>
            <a class="w3-button w3-block w3-left-align" href="AltOzel.php">&emsp;<i class="fas fa-caret-right"></i> Özel Yazı</a>
        </div>
        <button onclick="myFunction('sag')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Sag Bolum &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="sag" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="SagDuyuru.php">&emsp;<i class="fas fa-caret-right"></i> Küçük Duyuru</a>
            <a class="w3-button w3-block w3-left-align" href="SagSayac.php">&emsp;<i class="fas fa-caret-right"></i> Sayaç Ekle</a>
            <a class="w3-button w3-block w3-left-align" href="SagSlider.php">&emsp;<i class="fas fa-caret-right"></i> Resim Köşesi</a>
        </div>
        <button onclick="myFunction('ayarlar')" class="w3-padding-16 w3-button w3-block w3-left-align w3-white w3-leftbar w3-border-white w3-hover-border-red">
            Ayarlar &nbsp;<i class="fa fa-caret-down"></i></button>
        <div id="ayarlar" class="w3-hide">
            <a class="w3-button w3-block w3-left-align" href="AyarEkran.php">&emsp;<i class="fas fa-caret-right"></i> Ekran Ayarları</a>
            <a class="w3-button w3-block w3-left-align" href="AyarKurum.php">&emsp;<i class="fas fa-caret-right"></i> Kurum Ayarları</a>
            <a class="w3-button w3-block w3-left-align" href="AyarKullanici.php">&emsp;<i class="fas fa-caret-right"></i> Kullanıcı Ayarları</a>
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