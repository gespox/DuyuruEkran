<?php
?>
<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large topbar" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey " onclick="w3_open();"><i class="fa fa-bars"></i>  Menü</button>
    <span class="w3-bar-item w3-right">Duyuru Ekran Paneli</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="img/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Hoşgeldin, <strong><?php echo $_SESSION['kadi'];?></strong></span><br>
<a href="#" title="Bildirimler" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
<a href="cikis.php" onclick="return confirm('Çıkış yapmak istiyor musunuz?');" title="Çıkış Yap" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i></a>
</div>
</div>
<hr>
<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Menüyü Kapat</a>
    <a href="panelAdmin.php" class="w3-bar-item w3-button w3-padding geneldurum"><i class="fas fa-desktop fa-fw"></i>  Genel Durum</a>
    <a href="kullaniciEkle.php" class="w3-bar-item w3-button w3-padding ilanekleme"><i class="fa fa-plus fa-fw"></i>  Kullanıcı Ekleme</a>
    <a href="kullaniciDuzenle.php" class="w3-bar-item w3-button w3-padding ilanduzenle"><i class="fas fa-edit fa-fw"></i>  Kullanıcı Düzenleme</a>
    <a href="ayarlar.php" class="w3-bar-item w3-button w3-padding ayarlar"><i class="fa fa-cog fa-fw"></i>  Ayarlar</a><br><br>
</div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
