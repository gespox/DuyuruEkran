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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <div class="w3-container w3-margin w3-padding">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="fileToUpload">Resim Secin</label>
                        <input type="file" name="fileToUpload" class="form-control-file col-4" id="fileToUpload" required>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Bitis Tarihi</label>
                        <div class="col-3">
                            <input class="form-control" name="bitis" type="date"  id="example-date-input" required>
                        </div>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Yukle</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST["submit"])) {
            $userid = $_SESSION['id'];
            $target_dir = "img/SagSlider/";
            $imgName = $userid ."-" . basename($_FILES["fileToUpload"]["name"]);
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
                        $bitis = $_POST['bitis'];
                        $sqlslider = "INSERT INTO s_slider (kullanici_id,resim_url,bitis) VALUES ('$userid','$target_file','$bitis')";
                        $conn->exec($sqlslider);
                        $sagsliderekran= $conn->lastInsertId();
                        $ekran_id=$_SESSION['ekran_id'];
                        $sql = "INSERT INTO ekran_sagslider (ekran_id,sagslider_id) VALUES (?,?)";
                        $kayitsql = $conn->prepare($sql);
                        $kayitsql->execute([$ekran_id,$sagsliderekran]);
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Resim Basariyla Eklendi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    }
                }
            }
        }?>
        <?php
        if(isset($_POST["sil"])){
            $sliderID=$_POST["sliderID"];
            $sqlSil="DELETE FROM s_slider WHERE id_sslider='$sliderID'";
            $conn->exec($sqlSil);
            $sqlekrandansil="DELETE FROM ekran_sagslider WHERE sagslider_id=?";
            $ekranSil=$conn->prepare($sqlekrandansil);
            $ekranSil->execute([$sliderID]);
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Slider Basariyla Silindi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
        }
        ?>
        <div class="w3-container w3-margin w3-padding ">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">Resim</th>
                    <th scope="col">Bitis Tarihi</th>
                    <th scope="col">Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM s_slider s WHERE s.kullanici_id='$id'";
                $result = $conn->query($sql);
                if ($result->rowCount() > 0) {
                    // output data of each row
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td><img id='myImg' src='" . $row["resim_url"] . "' width='100' height='100'> </img</td>";
                        echo "<td>" . $row['bitis'] . "</td>";
                        echo "<td>";?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="sliderID" value="<?php echo $row['id_sslider']?>">
                            <button name="sil" class="w3-button w3-circle w3-red" onclick="return confirm('Silmek istiyor musunuz?');">X</button>
                        </form>
                        <?php  echo"</td>";

                        echo "</tr>";
                    }//while end

                }else {
                    echo "</tbody></table><div class=\"alert alert-info\">
     Kayitli Slider Yok.
  </div>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="closeModal">X</span>

        <!-- Modal Content (The Image) -->
        <img src="" class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>

    <script src="js/pUserjs.js"></script>
</body>
</html>