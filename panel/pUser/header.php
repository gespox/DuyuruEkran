<?php
/**
 * Created by PhpStorm.
 * User: Gespox
 * Date: 7.05.2019
 * Time: 17:16
 */
?>
<div class="logo">
    <a href="#">Duyuru <span>Duzenleme Paneli</span></a>
</div>
<div class="bilgiler">
    <span>  <?php //echo "Tekniker: ". $_SESSION["ad"]." ".$_SESSION["soyad"]." " ; ?></span>
    <form id="cikisbtn" action="../cikis.php">
        <button id="cikisbtn" onclick="return confirm('Cikis yapmak istiyor musunuz?');" name="cikisbtn"><img src="img/cik.svg" width="24" height="24" > Çıkış Yap</button>
    </form>
</div>
