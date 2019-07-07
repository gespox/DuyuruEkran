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
        <h5><b><i class="fa fa-dashboard"> </i> Özel Duyuru </b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <?php
        if(isset($_POST["guncelle"])) {
            $yazi=$_POST['yazi'];
            $sqlUyekayit = "UPDATE a_ozel SET yazi=? WHERE kullanici_id=?";
            $uyeKayit=$conn->prepare($sqlUyekayit);
            $checkUyeKayit=$uyeKayit->execute([$yazi,$kullaniciId]);
            if($checkUyeKayit) {
                $ozelalanSQL = "SELECT id_aozel FROM a_ozel WHERE kullanici_id=?";
                $ozelpre = $conn->prepare($ozelalanSQL);
                $ozelpre->execute([$kullaniciId]);
                $satir = $ozelpre->fetch();
                $altDuyuru= $satir['id_aozel'];
                $ekran_id=$_SESSION['ekran_id'];
                $sql = "INSERT INTO ekran_altozel (ekran_id,altozel_id) VALUES (?,?)";
                $kayitsql = $conn->prepare($sql);
                $kayitsql->execute([$ekran_id,$altDuyuru]);
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Ozel Alan Basariyla Guncellendi!
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
            $KullaniciSelect = "SELECT * FROM a_ozel WHERE kullanici_id=?";
            $stmt = $conn->prepare($KullaniciSelect);
            $stmt->execute([$kullaniciId]);
            $row = $stmt->fetch(); ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="yazi">Özel Alan Yazisi:</label>
                    <input type="text" class="form-control" id="yazi" name="yazi" <?php if($row['yazi']!=NULL){ echo "value=".$row['yazi'];} ?> required>
                </div>
                <button type="submit" class="btn btn-primary" name="guncelle">Alt Yazi Guncelle</button>
            </form>

        </div>

    </div>
</body>
</html>