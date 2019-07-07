<?php
session_start();
if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
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
        <h5><b><i class="fa fa-dashboard"> </i> Kullanıcı Ekleme </b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <div class="w3-container  w3-white w3-margin w3-padding">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="email">Email Adresi:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Sifre:</label>
                    <input type="password" class="form-control" id="pwd" name="sifre" required>
                </div>
                <div class="form-group">
                    <label for="name">Ad Soyad:</label>
                    <input type="text" class="form-control" id="name" name="adsoyad" required>
                </div>
                <div class="form-group">
                    <label for="tel">Telefon:</label>
                    <input class="form-control" type="tel" id="tel" name="telefon" required>
                </div>
                <div class="form-group">
                    <label for="yetki">Yetki:</label>
                    <select class="form-control" id="yetki" name="yetki" required>
                        <option value="0">Kullanici Yetkisi</option>
                        <option value="1">Admin Yetkisi</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="uyeKayit">Uye Ekle</button>
            </form>
            <?php
            if(isset($_POST["uyeKayit"])) {
                $email = $_POST['email'];
                $sifre = $_POST['sifre'];
                $adsoyad = $_POST['adsoyad'];
                $telefon = $_POST['telefon'];
                $yetki = $_POST['yetki'];
                $sqlUyekayit = "INSERT INTO kullanici (mail,sifre,adsoyad,telefon,yetki) VALUES (?,?,?,?,?)";
                $uyeKayit=$conn->prepare($sqlUyekayit);
                $checkUyeKayit=$uyeKayit->execute([$email,$sifre,$adsoyad,$telefon,$yetki]);
                if($checkUyeKayit) {
                    if(!$yetki) {
                        $kullaniciId = $conn->lastInsertId();

                        $sqlKurumKayit = "INSERT INTO kurum (kullanici_id,ad_soyad,mail,telefon) VALUES (?,?,?,?)";
                        $kurumKayit = $conn->prepare($sqlKurumKayit);
                        $kurumKayit->execute([$kullaniciId, $adsoyad, $email, $telefon]);

                        $sqlEkranKayit = "INSERT INTO ekran (kullanici_id) VALUES (?)";
                        $ekranKayit = $conn->prepare($sqlEkranKayit);
                        $ekranKayit->execute([$kullaniciId]);

                        $sqlAyarlarKayit = "INSERT INTO ayarlar (kullanici_id) VALUES (?)";
                        $ayarlarKayit = $conn->prepare($sqlAyarlarKayit);
                        $ayarlarKayit->execute([$kullaniciId]);

                        $sqlOZelAlanKayit = "INSERT INTO a_ozel (kullanici_id) VALUES (?)";
                        $OzelAlanKayit = $conn->prepare($sqlOZelAlanKayit);
                        $OzelAlanKayit->execute([$kullaniciId]);
                    }
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Uye Basariyla Eklendi!
                         <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      </div>";
                }else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                }

            }?>
        </div>
        <?php
        if(isset($_POST["sil"])){
            $kullaniciID=$_POST["kullaniciId"];
            $sqlSil="DELETE FROM kullanici WHERE id_kullanici=?";
            $kullaniciSil=$conn->prepare($sqlSil);
          $checkSil= $kullaniciSil->execute([$kullaniciID]);
          if($checkSil) {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Kullanici Basariyla Silindi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
          }
          else{
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Hata Kullanici Silinmedi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
          }
        }
        ?>
        <div class="w3-container w3-margin w3-padding ">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">Ad Soyad</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Yetki</th>
                    <th scope="col">Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sqlkullanici = "SELECT * FROM kullanici ORDER BY yetki DESC";
                $resultKullanici = $conn->query($sqlkullanici);
                if ($resultKullanici->rowCount() > 0) {
                    while ($rowKullanici = $resultKullanici->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $rowKullanici['adsoyad'] . "</td>";
                        echo "<td>" . $rowKullanici['mail'] . "</td>";
                        echo "<td>" . $rowKullanici['telefon'] . "</td>";
                        if($rowKullanici['yetki']){
                        echo "<td>Admin Yetkisi</td>";
                        }else{
                            echo "<td>Kullanici Yetkisi</td>";
                        }
                        echo "<td>";?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="kullaniciId" value="<?php echo $rowKullanici['id_kullanici']?>">
                            <button name="sil" class="w3-button w3-circle w3-red" <?php if($rowKullanici['yetki']){
                                echo "disabled";
                            } ?> onclick="return confirm('Silmek istiyor musunuz?');">X</button>
                        </form>
                        <?php  echo"</td>";

                        echo "</tr>";
                    }//while end

                }else {
                    echo "</tbody></table><div class=\"alert alert-info\">
     Kayitli Kullanici Yok
  </div>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>