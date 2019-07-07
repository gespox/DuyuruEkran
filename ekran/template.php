<?php
if(isset($_GET['eId'])){
$ekran_id=$_GET['eId'];
}
require_once "../baglan.php";
$selectkullaniciSQL = "SELECT kullanici_id FROM ekran WHERE id_ekran=?";
$stmt = $conn->prepare($selectkullaniciSQL);
$stmt->execute([$ekran_id]);
$kullaniciGetir = $stmt->fetch();
$kullanici_id=$kullaniciGetir['kullanici_id'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--  Kurum Adi -->
    <title>
        <?php
        $kurumbilgi = "SELECT * FROM kurum WHERE kullanici_id=?";
        $kurumadgetir = $conn->prepare($kurumbilgi);
        $kurumadgetir->execute([$kullanici_id]);
        $kurumbilgiGetir = $kurumadgetir->fetch();
        if($kurumbilgiGetir['kurumAd']!=NULL){
            echo $kurumbilgiGetir['kurumAd']." | Duyuru Ekranı";
        }else{
            echo "Duyuru Ekranı";
        }
        ?>
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stil_yeni.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet" type="text/css" />
    <!--  Css Ayar -->
    <?php
    $ayarsql = "SELECT * FROM ayarlar WHERE kullanici_id=?";
    $ayarBaglanti = $conn->prepare($ayarsql);
    $ayarBaglanti->execute([$kullanici_id]);
    $ayarBilgiGetir = $ayarBaglanti->fetch();
    ?>
    <link id="csstasarim" href="css/stil_<?php echo $ayarBilgiGetir['tema']?>.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="img/ico.png" />
    <script type="text/javascript">
        setTimeout(function(){
            window.location.reload(1);
        }, <?php echo $ayarBilgiGetir['yenileme_time']; ?>);
        var timer1ID;
        function timer1_Tick() {
            var now = new Date();
            if (now.getHours() < 10)
                hours = "0" + now.getHours();
            else
                hours = now.getHours();
            if (now.getMinutes() < 10)
                minutes = "0" + now.getMinutes();
            else
                minutes = now.getMinutes();

            if (now.getSeconds() < 10)
                seconds = "0" + now.getSeconds();
            else
                seconds = now.getSeconds();

            var saatt = hours + ":" + minutes + ":" + seconds;
            document.getElementById("saatim").innerHTML = saatt;
        }
        $(document).ready(function () {
            timer1ID = setInterval(timer1_Tick, 1000);
        });
    </script>
</head>
<body>
<!--**************** ORTA  *****************-->
    <div class="slider_alti_zemin orta_bolum">
        <div id="pnlModul">
            <div id="marketslider" class="carousel-fade carousel slide" data-interval="<?php echo 1000;//$ayarBilgiGetir['orta_Sure']?>" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <!--**************** TANITIM EKRANI  *****************-->
                    <div class='item active'><img src = 'img/fon.png' class='fon' />
                        <div class='ilkekran_yazi_kutu'>
                            <p class='ilkekran_yazi'>
                                <?php if($kurumbilgiGetir['kurumAd']!=NULL){
                                echo $kurumbilgiGetir['kurumAd']."<br/> DUYURU EKRANINA HOŞ GELDİNİZ...<br/> <br/>";
                                }else{
                                echo "<br/> DUYURU EKRANINA HOŞ GELDİNİZ...<br/> <br/>";
                                }
                                ?></p>
                        </div>
                    </div>
                    <!--**************** RESIMLI DUYURU  *****************-->

                   <?php
                   $resimlisql = "SELECT * FROM ekran_resimli WHERE ekran_id=?";
                   $resimliBaglanti = $conn->prepare($resimlisql);
                   $resimliBaglanti->execute([$ekran_id]);
                   if ($resimliBaglanti->rowCount() > 0) {
                       while ($rowResimliEkran = $resimliBaglanti->fetch(PDO::FETCH_ASSOC)) {
                           $sqlSelectResimli = "SELECT * FROM o_resimli WHERE id_resimli=? AND bitis >= CURDATE()";
                           $preResimli = $conn->prepare($sqlSelectResimli);
                           $preResimli->execute([$rowResimliEkran['resimli_id']]);
                           if ($preResimli->rowCount() > 0) {
                               while ($rowResimli = $preResimli->fetch(PDO::FETCH_ASSOC)) {
                                   ?>
                                   <div class='item'>
                                       <img src='img/fon.png' class='fon'/>
                                       <p class='slidersola fon_sayfa_baslik'><?php echo $rowResimli['baslik']; ?></p>
                                       <img src='../panel/pUser/<?php echo $rowResimli['resim_url']; ?>'
                                            class='resimlimmodul_resim'>
                                       <p class='resimlimodul_yazi'><?php echo $rowResimli['yazi']; ?></p>
                                   </div>
                                   <?php
                               }//while end

                           }
                       }
                   }?>
                    <!--**************** SLIDER  *****************-->
                    <?php
                    $slidersql = "SELECT * FROM ekran_slider WHERE ekran_id=?";
                    $sliderBaglanti = $conn->prepare($slidersql);
                    $sliderBaglanti->execute([$ekran_id]);
                    if ($sliderBaglanti->rowCount() > 0) {
                        while ($rowsliderEkran = $sliderBaglanti->fetch(PDO::FETCH_ASSOC)) {
                            $sqlSelectslider = "SELECT * FROM o_slider WHERE id_slider=? AND bitis >= CURDATE()";
                            $preslider = $conn->prepare($sqlSelectslider);
                            $preslider->execute([$rowsliderEkran['slider_id']]);
                            if ($preslider->rowCount() > 0) {
                                while ($rowslider = $preslider->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class='item'><img src='../panel/pUser/<?php echo $rowslider['slider_url']; ?>' class='galeri_resim'/></div>


                                    <?php
                                }//while end

                            }
                        }
                    }?>
                    <!--**************** RESIMSIZ  *****************-->
                    <?php
                    $resimsizsql = "SELECT * FROM ekran_resimsiz WHERE ekran_id=?";
                    $resimsizBaglanti = $conn->prepare($resimsizsql);
                    $resimsizBaglanti->execute([$ekran_id]);
                    if ($resimsizBaglanti->rowCount() > 0) {
                        while ($rowResimsizEkran = $resimsizBaglanti->fetch(PDO::FETCH_ASSOC)) {
                            $sqlSelectResimsiz = "SELECT * FROM o_resimsiz WHERE id_resimsiz=? AND bitis >= CURDATE()";
                            $preResimsiz = $conn->prepare($sqlSelectResimsiz);
                            $preResimsiz->execute([$rowResimsizEkran['resimsiz_id']]);
                            if ($preResimsiz->rowCount() > 0) {
                                while ($rowResimsiz = $preResimsiz->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class='item'>
                                        <img src='img/fon.png'  class='fon' />
                                        <p class='slidersola' style='text-align:right; width: 75%; position: absolute; top: 11%; right: 0px;padding-right: 3%; font-size: 2.3vw'><?php echo $rowResimsiz['baslik']; ?></p>
                                        <div style= 'font-size: 1.7vw; text-align: left; position: absolute; padding-left: 5%; top: 27%;'>
                                            <p style='float: none;font-size:2.7vw'><?php echo $rowResimsiz['yazi']; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }//while end
                            }
                        }
                    }?>
                </div>
            </div>
        </div>
    </div>
    <!--**************** LOGO  *****************-->
    <img class='orta_logo' src='../panel/pUser/<?php echo $kurumbilgiGetir['logo']; ?>'/>
    <!--**************** SAG  *****************-->
    <div class="sag_bolum_zemin sag_bolum">
        <p class="sagbolum_ust_cizgi"></p>

        <!--**************** TARIH-SAAT  *****************-->
        <div class="sag_tarih_saat_kutu">
            <p class="sag_tarih_gun">
                <?php
                setlocale(LC_TIME, "turkish"); //başka bir dil içinse burada belirteceksin.
                setlocale(LC_ALL,'turkish'); //başka bir dil içinse burada belirteceksin.
                echo strftime('%e %B %Y %A ');
                ?>
            </p>
            <div class="sag_saat" id="saatim">
                12:00:00
            </div>
        </div>
        <!--**************** SAG SLIDER  *****************-->
        <div id='resimkosesislider' class='carousel slide' data-interval='<?php echo 1000;//$ayarBilgiGetir['sagSlider_sure']?>' data-ride='carousel'>
            <div class='carousel-inner'>
        <?php
        $sagslidersql = "SELECT * FROM ekran_sagslider WHERE ekran_id=?";
        $sagsliderBaglanti = $conn->prepare($sagslidersql);
        $sagsliderBaglanti->execute([$ekran_id]);
        if ($sagsliderBaglanti->rowCount() > 0) {
            $i=0;
            while ($rowsagsliderEkran = $sagsliderBaglanti->fetch(PDO::FETCH_ASSOC)) {
                $sqlSelectsagslider = "SELECT * FROM s_slider WHERE id_sslider=? AND bitis >= CURDATE()";
                $preSagSlider = $conn->prepare($sqlSelectsagslider);
                $preSagSlider->execute([$rowsagsliderEkran['sagslider_id']]);
                if ($preSagSlider->rowCount() > 0) {
                    while ($rowsagSlider = $preSagSlider->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <div class='item <?php if($i==0)echo " active"; ?>'>
                                    <img src='../panel/pUser/<?php echo $rowsagSlider['resim_url']; ?>' style='width:100%; height: 100%'/>
                                </div>
                        <?php
                    $i++;
                    }//while end
                }
            }
        }?>
            </div>
        </div>

        <!--**************** SAYAC  *****************-->
        <div class="sag_bosluk">
            <div id="sayacslider" class="carousel slide" data-interval="<?php echo 1000;//$ayarBilgiGetir['sagSayac_sure']?>" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sagsayacsql = "SELECT * FROM ekran_sagsayac WHERE ekran_id=?";
                    $sagsayacBaglanti = $conn->prepare($sagsayacsql);
                    $sagsayacBaglanti->execute([$ekran_id]);
                    if ($sagsayacBaglanti->rowCount() > 0) {
                        $i=0;
                        while ($rowsagsayacEkran = $sagsayacBaglanti->fetch(PDO::FETCH_ASSOC)) {
                            $sqlSelectsagsayac = "SELECT * FROM s_sayac WHERE id_sayac=? AND bitis >= CURDATE()";
                            $preSagsayac = $conn->prepare($sqlSelectsagsayac);
                            $preSagsayac->execute([$rowsagsayacEkran['sagsayac_id']]);
                            if ($preSagsayac->rowCount() > 0) {
                                while ($rowsagsayac = $preSagsayac->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class='item <?php if($i==0)echo " active"; ?>'>
                                        <p class="sagbaslikalti sag_baslik"><?php echo $rowsagsayac['yazi']; ?></p>
                                        <p class="sag_icerik_orta"><?php
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($rowsagsayac['bitis']);
                                            $datediff =$your_date- $now;
                                            $fark=round($datediff / (60 * 60 * 24));
                                            if($fark==-1){
                                                echo "BUGÜN";
                                            }
                                            elseif ($fark==0){
                                                echo "YARIN";
                                            }
                                            else{
                                                echo ++$fark." Gun Kaldı";
                                            }
                                            ?> </p>
                                    </div>
                                    <?php
                                    $i++;
                                }//while end
                            }
                        }
                    }

                    ?>


                </div>
            </div>
        </div>
        <!--**************** SAG DUYURU  *****************-->
        <div class="sag_bosluk">
            <div id="serbestmodulslider" class="carousel slide" data-interval="<?php echo 1000;//$ayarBilgiGetir['sagDuyuru_sure']?>" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sagduyuru = "SELECT * FROM ekran_sagduyuru WHERE ekran_id=?";
                    $sagduyuruBaglanti = $conn->prepare($sagduyuru);
                    $sagduyuruBaglanti->execute([$ekran_id]);
                    if ($sagduyuruBaglanti->rowCount() > 0) {
                        $i=0;
                        while ($rowsagduyuruEkran = $sagduyuruBaglanti->fetch(PDO::FETCH_ASSOC)) {
                            $sqlSelectsagduyuru = "SELECT * FROM s_duyuru WHERE id_sduyuru=? AND bitis >= CURDATE()";
                            $preSagduyuru = $conn->prepare($sqlSelectsagduyuru);
                            $preSagduyuru->execute([$rowsagduyuruEkran['sagduyuru_id']]);
                            if ($preSagduyuru->rowCount() > 0) {
                                while ($rowsagduyuru = $preSagduyuru->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class='item <?php if($i==0)echo " active"; ?>'>
                                        <p class="sagbaslikalti sag_baslik"><?php echo $rowsagduyuru['baslik']; ?></p>
                                        <p class="sag_icerik_kucuk"><?php echo $rowsagduyuru['yazi']; ?></p>
                                    </div>
                                    <?php
                                    $i++;
                                }//while end
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="alt_endis">
        <div class="alt_kayanlar">
            <!--**************** DUYURU  *****************-->
            <div class="duyuruzemin duyuru_kutu">
                <img src="img/duyurubaslik.png" class="duyuru_icon"/>
                <marquee scrollamount="16" direction="left" class="duyuru_yazi">
                    <?php
                    $altduyuru = "SELECT * FROM ekran_altduyuru WHERE ekran_id=?";
                    $altduyuruBaglanti = $conn->prepare($altduyuru);
                    $altduyuruBaglanti->execute([$ekran_id]);
                    if ($altduyuruBaglanti->rowCount() > 0) {
                        while ($rowaltduyuruEkran = $altduyuruBaglanti->fetch(PDO::FETCH_ASSOC)) {
                            $sqlSelectsagduyuru = "SELECT * FROM a_duyuru WHERE id_aduyuru=? AND bitis >= CURDATE()";
                            $prealtduyuru = $conn->prepare($sqlSelectsagduyuru);
                            $prealtduyuru->execute([$rowaltduyuruEkran['altduyuru_id']]);
                            if ($prealtduyuru->rowCount() > 0) {
                                while ($rowaltduyuru = $prealtduyuru->fetch(PDO::FETCH_ASSOC)) {
                                     echo $rowaltduyuru['yazi'];
                                     echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                }//while end
                            }
                            else{
                                echo "DUYURULAR..";
                            }
                        }
                    }
                    else{
                        echo "DUYURULAR..";
                    }
                    ?>
              &nbsp;&nbsp;</marquee>
            </div>

            <div class="haberbandizemin haberbandi_kutu">
                <marquee scrollamount="13" direction="left" class="haberbandi_yazi">
                    <?php
                    $ozelsql = "SELECT * FROM a_ozel WHERE kullanici_id=?";
                    $ozelBaglanti = $conn->prepare($ozelsql);
                    $ozelBaglanti->execute([$kullanici_id]);
                    $ozelBilgiGetir = $ozelBaglanti->fetch();
                    if($ozelBilgiGetir['yazi']!=NULL){
                        echo $ozelBilgiGetir['yazi'];
                    }
                    else{
                        echo "Duyuru Ekranına Hoş Geldiniz... GÜZEL GÜNLER DİLERİZ....";
                    }
                    ?>
                </marquee>
                <img src="../panel/pUser/<?php echo $kurumbilgiGetir['logo']; ?>" class="haberbandi_icon" />
                <img src="img/sagaltlogo1.png" class="haberbandi_dtlogo" />
            </div>
        </div>

        <div class="havadurumu_zemin havadurumu_kutu">
            <div id="havadurumuslider" class="carousel slide" data-interval="1000" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-inner">

                        <div class='item active'>
                            <p class="havadurumu_gun">BUGÜN</p>
                            <img src='https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/0d.png' class="havadurumu_icon" />
                            <p class="havadurumu_yer">MERKEZ</p>
                            <p class="havadurumu_derece">21&deg;</p>
                        </div>

                        <div class='item '>
                            <p class="havadurumu_gun">YARIN</p>
                            <img src='https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/0d.png' class="havadurumu_icon" />
                            <p class="havadurumu_yer">MERKEZ</p>
                            <p class="havadurumu_derece">20&deg;</p>
                        </div>

                        <div class='item '>
                            <p class="havadurumu_gun">Pazartesi</p>
                            <img src='https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/0d.png' class="havadurumu_icon" />
                            <p class="havadurumu_yer">MERKEZ</p>
                            <p class="havadurumu_derece">21&deg;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
