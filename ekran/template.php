<?php
if(isset($_GET['eId'])){

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--  Kurum Adi -->
    <title>
        Cumhuriyet Universitesi Bilgisayar Muhendisligi Kanalı | DuyuruTV
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stil_yeni.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet" type="text/css" />
    <!--  Css Ayar -->
    <link id="csstasarim" href="css/stil_yesil.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="img/ico.png" />
    <script type="text/javascript">
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
            <div id="marketslider" class="carousel-fade carousel slide" data-interval="1000" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <!--**************** TANITIM EKRANI  *****************-->
                    <div class='item active'><img src = 'img/fon.png' class='fon' />
                        <div class='ilkekran_yazi_kutu'>
                            <p class='ilkekran_yazi'>Cumhuriyet Universitesi Bilgisayar Muhendisligi<br/> KANALINA HOŞ GELDİNİZ...<br/> <br/></p>
                        </div>
                    </div>
                    <!--**************** RESIMLI DUYURU  *****************-->
                    <div class='item'><img src='img/fon.png'  class='fon' />
                        <p class='slidersola fon_sayfa_baslik'>Yonetici Modulu test</p>
                        <img src = 'img/4379_9030371.png' class='yoneticimesaji_resim'>
                        <p class='yoneticimesaji_resim_yazi' > Yonetici Modulu test <br/> Yonetici Ad SAoyad</p>
                        <p class='yoneticimesaji_yazi' style='font-size: 2.4vw'>asjdgjhgasdhgadsjh asjdgjhgasdhgadsjh asjdgjhgasdhgadsjh asjdgjhgasdhgadsjh asjdgjhgasdhgadsjh </p>
                    </div>
                    <!--**************** SLIDER  *****************-->


                    <div class='item'><img src='img/fon.png'  class='fon' /><p class='slidersola fon_sayfa_baslik'>Resimli Modul 2</p><img src= 'img/4379_3596186.jpg' class='resimlimmodul_resim'><p class='resimlimodul_yazi' >Resimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsfResimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsfResimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsfResimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsf</p></div>

                    <div class='item'><img src='img/fon.png'  class='fon' /><p class='slidersola fon_sayfa_baslik'>Resimli Modul</p><img src= 'img/4379_1986047.jpg' class='resimlimmodul_resim'><p class='resimlimodul_yazi' >Resimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsf Resimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsf Resimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsf Resimli Duyuru modul yazisia dsm gajgsdg hjhgajd fdfa bdfbmdf bmd fufkhfkjfldsf </p></div>

                    <div class='item'><img src='img/fon.png'  class='fon' /><p class='slidersola' style='text-align:right; width: 75%; position: absolute; top: 11%; right: 0px;padding-right: 3%; font-size: 2.3vw'>deneme resimsiz baslik222</p><div style= 'font-size: 1.7vw; text-align: left; position: absolute; padding-left: 5%; top: 27%;'><p style='float: none;font-size:2.7vw'>vahmet veli sait mehmet ali deli kun belli ahmet veli sait mehmet ali deli kun belli ahmet veli sait mehmet ali deli kun belli ahmet veli sait mehmet ali deli kun belli ahmet veli sait mehmet ali deli kun </p></div></div>

                    <div class='item'><img src='img/fon.png'  class='fon' /><p class='slidersola' style='text-align:right; width: 75%; position: absolute; top: 11%; right: 0px;padding-right: 3%; font-size: 2.3vw'>deneme resimsiz baslik</p><div style= 'font-size: 1.7vw; text-align: left; position: absolute; padding-left: 5%; top: 27%;'><p style='float: none;font-size:2.7vw'>deneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshadsdeneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshadsdeneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshadsdeneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshadsdeneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshadsdeneme resimsiz yazi adshakjsdhhhhhhhhhhhhhhhhhhhhajhadshads</p></div></div>
                </div>
            </div>

        </div>
    </div>
    <!--**************** LOGO  *****************-->
    <img class='orta_logo' src='img/4379_4997656.png'/>
    <!--**************** SAG  *****************-->
    <div class="sag_bolum_zemin sag_bolum">
        <p class="sagbolum_ust_cizgi"></p>

        <!--**************** TARIH-SAAT  *****************-->
        <div class="sag_tarih_saat_kutu">
            <p class="sag_tarih_gun">
                22 Haziran 2019
                Cumartesi
            </p>
            <div class="sag_saat" id="saatim"></div>
        </div>
        <!--**************** SAG SLIDER  *****************-->
        <div id='resimkosesislider' class='carousel slide' data-interval='1000' data-ride='carousel'>
                <div class='carousel-inner'>
                    <div class='item active'>
                        <img src='img/4379_393273.jpg' style='width:100%; height: 100%'/>
                    </div>
                    <div class='item'><img src='img/4379_814932.jpg' style='width:100%; height: 100%'/>
                    </div>
                </div>
            </div>
        <!--**************** SAYAC  *****************-->
        <div class="sag_bosluk">
            <div id="sayacslider" class="carousel slide" data-interval="1000" data-ride="carousel">
                <div class="carousel-inner">

                    <div class='item active'>
                        <p class="sagbaslikalti sag_baslik">2INDİRİM DUYURU 2</p>
                        <p class="sag_icerik_orta">YARIN </p>
                    </div>

                    <div class='item '>
                        <p class="sagbaslikalti sag_baslik">INDİRİM DUYURU 1</p>
                        <p class="sag_icerik_orta">BUGÜN </p>
                    </div>

                </div>
            </div>
        </div>
        <!--**************** SAG DUYURU  *****************-->
        <div class="sag_bosluk">
            <div id="serbestmodulslider" class="carousel slide" data-interval="1000" data-ride="carousel">
                <div class="carousel-inner">

                    <div class='item active'>
                        <p class="sagbaslikalti sag_baslik">Sagduyuru22</p>
                        <p class="sag_icerik_kucuk">ilan duyurusu basligi 2 </p>
                    </div>

                    <div class='item '>
                        <p class="sagbaslikalti sag_baslik">Sagduyuru</p>
                        <p class="sag_icerik_kucuk">Sagduyuru icerik </p>
                    </div>

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
                    222DUYURU METNİ 22DUYURU METNİ  DUYURU METNİ DUYURU METNİ22  22.06.2019&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DUYURU METNİ DUYURU METNİ  DUYURU METNİ DUYURU METNİ 22.06.2019&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</marquee>
            </div>

            <div class="haberbandizemin haberbandi_kutu">
                <marquee scrollamount="13" direction="left" class="haberbandi_yazi">
                    CUMHURİYET UNİVERSİTESİ BİLGİSAYAR MUHENDİSLİGİ KANALINI İZLİYORSUNUZ... GÜZEL GÜNLER DİLERİZ.......
                </marquee>
                <img src="img/4379_4997656.png" class="haberbandi_icon" />
                <img src="img/sagaltlogo.png" class="haberbandi_dtlogo" />
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
