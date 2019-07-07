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
        <h5><b><i class="fa fa-dashboard"> </i> Sayaç </b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <div class="w3-container  w3-white w3-margin w3-padding ">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
                    <label for="yazi">Sayaç Yazisi:</label>
                    <textarea class="form-control col-6" id="yazi" rows="4" name="yazi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="bitis">Bitiş Tarihi:</label>
                    <input class="form-control col-6" name="bitis" type="date"  id="bitis" required>
                </div>

                <button type="submit" class="btn btn-primary" name="resimsizKayit">Sayac ekle</button>
            </form>
            <?php
            if(isset($_POST["resimsizKayit"])) {
                $yazi = $_POST['yazi'];
                $bitis = $_POST['bitis'];
                $sqlresimsiz = "INSERT INTO s_sayac (kullanici_id,yazi,bitis) VALUES (?,?,?)";
                $resimsiz=$conn->prepare($sqlresimsiz);
                $checkResimsiz=$resimsiz->execute([$idKullanici,$yazi,$bitis]);
                if($checkResimsiz) {
                    $sayacekran= $conn->lastInsertId();
                    $ekran_id=$_SESSION['ekran_id'];
                    $sql = "INSERT INTO ekran_sagsayac (ekran_id,sagsayac_id) VALUES (?,?)";
                    $kayitsql = $conn->prepare($sql);
                    $kayitsql->execute([$ekran_id,$sayacekran]);
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Sayac Basariyla Eklendi!
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
            $resimsizid=$_POST["resimsizID"];
            $sqlSil="DELETE FROM s_sayac WHERE id_sayac=?";
            $ResimsizSil=$conn->prepare($sqlSil);
            $checkSil= $ResimsizSil->execute([$resimsizid]);
            if($checkSil) {
                $sqlekrandansil="DELETE FROM ekran_sagsayac WHERE sagsayac_id=?";
                $ekranSil=$conn->prepare($sqlekrandansil);
                $ekranSil->execute([$resimsizid]);
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Sayac Basariyla Silindi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
            else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Hata! Sayac Silinemedi.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
        }
        ?>
        <div class="w3-container w3-margin w3-padding ">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Yazi</th>
                    <th scope="col">Bitis</th>
                    <th scope="col">Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sqlSelectResimsiz = "SELECT * FROM s_sayac WHERE kullanici_id=?";
                $preResimsiz=$conn->prepare($sqlSelectResimsiz);
                $preResimsiz->execute([$idKullanici]);
                if ($preResimsiz->rowCount() > 0) {
                    while ($rowResimsiz = $preResimsiz->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $rowResimsiz['yazi'] . "</td>";
                        echo "<td>" . $rowResimsiz['bitis'] . "</td>";

                        echo "<td>";?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="resimsizID" value="<?php echo $rowResimsiz['id_sayac']?>">
                            <button name="sil" class="w3-button w3-circle w3-red" onclick="return confirm('Silmek istiyor musunuz?');">X</button>
                        </form>
                        <?php  echo"</td>";

                        echo "</tr>";
                    }//while end

                }else {
                    echo "</tbody></table><div class=\"alert alert-info\">
      Sayac Mevcut Degil.
  </div>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>