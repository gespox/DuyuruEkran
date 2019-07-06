<?php
session_start();
if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
$idKullanici=$_SESSION['id'];
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
        <div class="w3-container  w3-white w3-margin w3-padding ">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="baslik">Baslik:</label>
                    <input type="text" class="form-control col-6" id="baslik" name="baslik" required>
                </div>
                <div class="form-group">
                    <label for="yazi">Duyuru Icerigi:</label>
                    <textarea class="form-control col-6" id="yazi" rows="4" name="yazi" required></textarea>
                </div>
                    <div class="form-group">
                        <label class="form-label" for="fileToUpload">Resim Secin:</label>
                        <input type="file" name="fileToUpload" class="form-control-file col-6" id="fileToUpload" required>

                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <div class="form-group">
                    <label for="bitis">Bitis Tarihi:</label>
                    <input class="form-control col-6" name="bitis" type="date"  id="bitis" required>
                </div>

                <button type="submit" class="btn btn-primary" name="resimliKayit">Duyuru Kaydet</button>
            </form>
        <?php
        if(isset($_POST["resimliKayit"])) {
            $baslik = $_POST['baslik'];
            $yazi = $_POST['yazi'];
            $bitis = $_POST['bitis'];
            $target_dir = "img/ResimliDuyuru/";
            $imgName = $idKullanici . "-" . basename($_FILES["fileToUpload"]["name"]);
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
                        $sqlresimli = "INSERT INTO o_resimli (kullanici_id,baslik,yazi,resim_url,bitis) VALUES (?,?,?,?,?)";
                        $resimli=$conn->prepare($sqlresimli);
                        $checkResimli=$resimli->execute([$idKullanici,$baslik,$yazi,$target_file,$bitis]);
                        if($checkResimli) {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Resimli Duyuru Basariyla Eklendi!
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
        }?>

        </div>
        <?php
        if(isset($_POST["sil"])){
            $resimliID=$_POST["resimliID"];
            $sqlSil="DELETE FROM o_resimli WHERE id_resimli=?";
            $ResimliSil=$conn->prepare($sqlSil);
            $checkSil= $ResimliSil->execute([$resimliID]);
            if($checkSil) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Resimli Duyuru Basariyla Silindi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
            else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Hata! Resimli Duyuru Silinemedi.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
        }
        ?>
        <div class="w3-container w3-margin w3-padding ">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">Baslik</th>
                    <th scope="col">Yazi</th>
                    <th scope="col">Bitis</th>
                    <th scope="col">Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $sqlSelectResimli = "SELECT * FROM o_resimli WHERE kullanici_id=?";
                $preResimli=$conn->prepare($sqlSelectResimli);
                $preResimli->execute([$idKullanici]);
                if ($preResimli->rowCount() > 0) {
                    while ($rowResimli = $preResimli->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $rowResimli['baslik'] . "</td>";
                        echo "<td>" . $rowResimli['yazi'] . "</td>";
                        echo "<td><img id='myImg' src='" . $rowResimli["resim_url"] . "' width='100' height='100'> </img</td>";
                        echo "<td>" . $rowResimli['bitis'] . "</td>";
                        echo "<td>";?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="resimliID" value="<?php echo $rowResimli['id_resimli']?>">
                            <button name="sil" class="w3-button w3-circle w3-red" onclick="return confirm('Silmek istiyor musunuz?');">X</button>
                        </form>
                        <?php  echo"</td>";
                        echo "</tr>";
                    }//while end

                }else {
                    echo "</tbody></table><div class=\"alert alert-info\">
      Resimli Duyuru Mevcut Degil.
  </div>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="closeModal">&times;</span>

        <!-- Modal Content (The Image) -->
        <img src="" class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>

    <script src="js/pUserjs.js"></script>'
</body>
</html>