<?php
session_start();

if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
$kullaniciId=$_SESSION['id'];
require_once "../../baglan.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kulanıcı Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="../../css/afteredit.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">
<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"> </i> Ekran Ayarları</b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <?php
        if(isset($_POST["guncelle"])) {
            $yenileme=$_POST['yenileme'];
            $tema = $_POST['tema'];
            $orta=$_POST['orta'];
            $sagSlider = $_POST['sagSlider'];
            $sagduyuru = $_POST['sagDuyuru'];
            $sagSayac = $_POST['sagSayac'];
                $sqlUyekayit = "UPDATE ayarlar SET yenileme_time=?,tema=?,orta_Sure=?,sagSlider_sure=?,sagDuyuru_sure=?,sagSayac_sure=? WHERE kullanici_id=?";
                $uyeKayit=$conn->prepare($sqlUyekayit);
                $checkUyeKayit=$uyeKayit->execute([$yenileme,$tema,$orta,$sagSlider,$sagduyuru,$sagSayac,$kullaniciId]);
                if($checkUyeKayit) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Ayarlar Basariyla Guncellendi!
                         <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      </div>";
                }else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                }
        }?>
        <div class="w3-container  w3-white w3-margin w3-padding">
            <?php
            $KullaniciSelect = "SELECT * FROM ayarlar WHERE kullanici_id=?";
            $stmt = $conn->prepare($KullaniciSelect);
            $stmt->execute([$kullaniciId]);
            $row = $stmt->fetch(); ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="yenileme">Ekran Yenileme Zamani:</label>
                    <select class="form-control" id="yenileme" name="yenileme" required>
                        <option value="900000"<?php if ($row['yenileme_time']==900000) echo " selected";?>>15 Dakika</option>
                        <option value="1800000"<?php if ($row['yenileme_time']==1800000) echo " selected";?>>30 Dakika</option>
                        <option value="3600000"<?php if ($row['yenileme_time']==3600000) echo " selected";?>>1 Saat</option>
                        <option value="21600000"<?php if ($row['yenileme_time']==21600000) echo " selected";?>>6 Saat</option>
                        <option value="43200000"<?php if ($row['yenileme_time']==43200000) echo " selected";?>>12 Saat</option>
                        <option value="86400000"<?php if ($row['yenileme_time']==86400000) echo " selected";?>>1 Gün</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tema">Ekran Temasi Secin:</label>
                    <select class="form-control" id="tema" name="tema" required>
                        <option value="yesil"<?php if ($row['tema']=="yesil") echo " selected";?>>Yeşil</option>
                        <option value="bordo"<?php if ($row['tema']=="bordo") echo " selected";?>>Bordo</option>
                        <option value="gri"<?php if ($row['tema']=="gri") echo " selected";?>>Gri</option>
                        <option value="koyuyesil"<?php if ($row['tema']=="koyuyesil") echo " selected";?>>Koyu Yeşil</option>
                        <option value="lacivert"<?php if ($row['tema']=="lacivert") echo " selected";?>>Lacivert</option>
                        <option value="mavi"<?php if ($row['tema']=="mavi") echo " selected";?>>Mavi</option>
                        <option value="mor"<?php if ($row['tema']=="mor") echo " selected";?>>Mor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="orta">Orta Kısım Geçiş Süresi:</label>
                    <select class="form-control" id="orta" name="orta" required>
                        <option value="10000"<?php if ($row['orta_Sure']==10000) echo " selected";?>>10 Saniye</option>
                        <option value="20000"<?php if ($row['orta_Sure']==20000) echo " selected";?>>20 Saniye</option>
                        <option value="30000"<?php if ($row['orta_Sure']==30000) echo " selected";?>>30 Saniye</option>
                        <option value="60000"<?php if ($row['orta_Sure']==60000) echo " selected";?>>1 Dakika</option>
                        <option value="120000"<?php if ($row['orta_Sure']==120000) echo " selected";?>>2 Dakika</option>
                        <option value="300000"<?php if ($row['orta_Sure']==300000) echo " selected";?>>5 Dakika</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sagSlider">Sağ Resim Köşesi Geçiş Süresi:</label>
                    <select class="form-control" id="sagSlider" name="sagSlider" required>
                        <option value="10000"<?php if ($row['sagSlider_sure']==10000) echo " selected";?>>10 Saniye</option>
                        <option value="20000"<?php if ($row['sagSlider_sure']==20000) echo " selected";?>>20 Saniye</option>
                        <option value="30000"<?php if ($row['sagSlider_sure']==30000) echo " selected";?>>30 Saniye</option>
                        <option value="60000"<?php if ($row['sagSlider_sure']==60000) echo " selected";?>>1 Dakika</option>
                        <option value="120000"<?php if ($row['sagSlider_sure']==120000) echo " selected";?>>2 Dakika</option>
                        <option value="300000"<?php if ($row['sagSlider_sure']==300000) echo " selected";?>>5 Dakika</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sagDuyuru">Sağ Duyuru Geçiş Süresi:</label>
                    <select class="form-control" id="sagDuyuru" name="sagDuyuru" required>
                        <option value="10000"<?php if ($row['sagDuyuru_sure']==10000) echo " selected";?>>10 Saniye</option>
                        <option value="20000"<?php if ($row['sagDuyuru_sure']==20000) echo " selected";?>>20 Saniye</option>
                        <option value="30000"<?php if ($row['sagDuyuru_sure']==30000) echo " selected";?>>30 Saniye</option>
                        <option value="60000"<?php if ($row['sagDuyuru_sure']==60000) echo " selected";?>>1 Dakika</option>
                        <option value="120000"<?php if ($row['sagDuyuru_sure']==120000) echo " selected";?>>2 Dakika</option>
                        <option value="300000"<?php if ($row['sagDuyuru_sure']==300000) echo " selected";?>>5 Dakika</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sagSayac">Sağ Sayaç Geçiş Süresi:</label>
                    <select class="form-control" id="sagSayac" name="sagSayac" required>
                        <option value="10000"<?php if ($row['sagSayac_sure']==10000) echo " selected";?>>10 Saniye</option>
                        <option value="20000"<?php if ($row['sagSayac_sure']==20000) echo " selected";?>>20 Saniye</option>
                        <option value="30000"<?php if ($row['sagSayac_sure']==30000) echo " selected";?>>30 Saniye</option>
                        <option value="60000"<?php if ($row['sagSayac_sure']==60000) echo " selected";?>>1 Dakika</option>
                        <option value="120000"<?php if ($row['sagSayac_sure']==120000) echo " selected";?>>2 Dakika</option>
                        <option value="300000"<?php if ($row['sagSayac_sure']==300000) echo " selected";?>>5 Dakika</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="guncelle">Güncelle</button>
            </form>

        </div>

    </div>
</body>
</html>