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
        <h5><b><i class="fa fa-dashboard"> </i> Genel Gorunum</b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <?php
        if(isset($_POST["guncelle"])) {
            $kurumad=$_POST['kurumad'];
            $adsoyad = $_POST['adsoyad'];
            $sehir=$_POST['sehir'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $adres = $_POST['adres'];
            if(isset( $_FILES["fileToUpload"] ) && !empty( $_FILES["fileToUpload"]["name"] )){
                $target_dir = "img/";
                $imgName = $kullaniciId ."-" . basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $imgName;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check == false) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
           HATA! Yüklenen Dosya JPG,JPEG veya PNG Formatlarinda Resim Olmalidir.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Check file size
                elseif ($_FILES["fileToUpload"]["size"] > 1024 * 1024 * 2) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
           HATA! Dosya boyutu max 2MB'tır.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Allow certain file formats
                elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Sadece  JPG, JPEG, PNG formatlarında resim yükleyebilirsiniz.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Check if $uploadOk is set to 0 by an error
                else {
                    if ($uploadOk == 0) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $sqlUyekayit = "UPDATE kurum SET kurumAd=?,ad_soyad=?,il=?,logo=?,mail=?,telefon=?,adres=? WHERE kullanici_id=?";
                            $uyeKayit=$conn->prepare($sqlUyekayit);
                            $checkUyeKayit=$uyeKayit->execute([$kurumad,$adsoyad,$sehir,$target_file,$email,$telefon,$adres,$kullaniciId]);
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

                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                        }
                    }
                }
            }
            else{
                $sqlUyekayit = "UPDATE kurum SET kurumAd=?,ad_soyad=?,il=?,mail=?,telefon=?,adres=? WHERE kullanici_id=?";
                $uyeKayit=$conn->prepare($sqlUyekayit);
                $checkUyeKayit=$uyeKayit->execute([$kurumad,$adsoyad,$sehir,$email,$telefon,$adres,$kullaniciId]);
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
                    <label for="sehir">Şehir:</label>
                    <select class="form-control" id="sehir" name="sehir" required>

                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email Adresi:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['mail'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="tel">Telefon:</label>
                    <input class="form-control" type="tel" id="tel" name="telefon" value="<?php echo $row['telefon'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="adres">Adres:</label>
                    <textarea class="form-control" id="adres" name="adres" rows="3"><?php if($row['adres']!=NULL){ echo $row['adres'];} ?></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="fileToUpload">Kurum Logo:</label>
                        <input type="file" name="fileToUpload" class="form-control-file col-4" id="fileToUpload" >
                        <div class="w3-col s4">
                            Mevcut Logo:
                            <img src="<?php echo $row['logo'];?>" class="w3-circle w3-margin-right" style="width:46px">
                        </div>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <button type="submit" class="btn btn-primary" name="guncelle">Guncelle</button>
            </form>

        </div>

    </div>
</body>
</html>