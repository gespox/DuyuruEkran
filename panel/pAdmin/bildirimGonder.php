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
        <h5><b><i class="fa fa-dashboard"> </i> Genel Gorunum</b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <div class="w3-container  w3-white w3-margin w3-padding">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="bildirim">Bildirim Yazisi:</label>
                    <input type="text"  class="form-control" id="bildirim" name="bildirimText" required>
                </div>
                <button type="submit" class="btn btn-primary" name="bildirim">Bildirim Gonder</button>
            </form>
            <?php
            if(isset($_POST["bildirim"])) {
                $bildirim = $_POST['bildirimText'];

                $sqlbildirim = "INSERT INTO bildirim (bildirimText) VALUES (?)";
                $bildirimKayit=$conn->prepare($sqlbildirim);
                $checkBildirimKayit=$bildirimKayit->execute([$bildirim]);
                if($checkBildirimKayit) {

                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Bildirim Gonderildi!
                         <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      </div>";
                }else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Bildirim Gonderilirken Hata Olustu!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                }

            }?>
        </div>
        <?php
        if(isset($_POST["sil_bildirim"])){
            $bildirim_id=$_POST["bildirim_id"];
            $delete_Bildirim="DELETE FROM bildirim WHERE id_bildirim=?";
            $bildirim_sil=$conn->prepare($delete_Bildirim);
            $checkBildirimSil= $bildirim_sil->execute([$bildirim_id]);
            if($checkBildirimSil) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Bildirim Silindi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
            else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Hata Bildirim Silinmedi!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
            }
        }
        ?>
        <div class="w3-container w3-margin w3-padding ">
            <table class="table table-hover">
                <thead>
                <tr>

                    <th scope="col">Bildirim</th>
                    <th scope="col">Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $selectBildirim = "SELECT * FROM bildirim";
                $resultBildirim = $conn->query($selectBildirim);
                if ($resultBildirim->rowCount() > 0) {
                    while ($rowBildirim = $resultBildirim->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $rowBildirim['bildirimText'] . "</td>";
                        echo "<td>";?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="bildirim_id" value="<?php echo $rowBildirim['id_bildirim']?>">
                            <button name="sil_bildirim" class="w3-button w3-circle w3-red" onclick="return confirm('Silmek istiyor musunuz?');">X</button>
                        </form>
                        <?php  echo"</td>";

                        echo "</tr>";
                    }//while end

                }else {
                    echo "</tbody></table><div class=\"alert alert-info\">
     Mevcut Bildirim Yok
  </div>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>