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
        <h5><b><i class="fa fa-dashboard"> </i> Kullanıcı Ayarları </b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <?php
        if(isset($_POST["guncelle"])) {
            $email = $_POST['email'];
            $sifre = $_POST['sifre'];
            $adsoyad = $_POST['adsoyad'];
            $telefon = $_POST['telefon'];
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

                            $sqlUyekayit2 = "UPDATE kullanici SET avatar=? WHERE id_kullanici=?";
                            $uyeKayit2=$conn->prepare($sqlUyekayit2);
                            $uyeKayit2->execute([$target_file,$kullaniciId]);

                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                        }
                    }
                }
            }
            $sqlUyekayit = "UPDATE kullanici SET mail=?,sifre=?,adsoyad=?,telefon=? WHERE id_kullanici=?";
            $uyeKayit=$conn->prepare($sqlUyekayit);
            $checkUyeKayit=$uyeKayit->execute([$email,$sifre,$adsoyad,$telefon,$kullaniciId]);
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

           $KullaniciSelect = "SELECT * FROM kullanici WHERE id_kullanici=?";
            $stmt = $conn->prepare($KullaniciSelect);
            $stmt->execute([$kullaniciId]);
            $row = $stmt->fetch(); ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email Adresi:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['mail'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Sifre:</label>
                    <input type="password" class="form-control" id="pwd" name="sifre" value="<?php echo $row['sifre'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Ad Soyad:</label>
                    <input type="text" class="form-control" id="name" name="adsoyad" value="<?php echo $row['adsoyad'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="tel">Telefon:</label>
                    <input class="form-control" type="tel" id="tel" name="telefon" value="<?php echo $row['telefon'];  ?>" required>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="fileToUpload">Profil Fotografi:</label>
                        <input type="file" name="fileToUpload" class="form-control-file col-4" id="fileToUpload" >
                        <div class="w3-col s4">
                            Mevcut Fotograf:
                        <img src="<?php echo $row['avatar'];?>" class="w3-circle w3-margin-right" style="width:46px">
                        </div>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Dosya boyutu max 2MB'tır.Sadece JPG, JPEG, PNG formatlarında resim yükleyebilirsiniz.</small>
                </div>

                <button type="submit" class="btn btn-primary" name="guncelle">Güncelle</button>
            </form>

        </div>

    </div>
</body>
</html>