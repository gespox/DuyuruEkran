<?php session_start();
require_once "../../baglan.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Firma Bilgileri</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="../../css/afteredit.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey firmabilgi">
<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"> </i> Firma Bilgileri</b></h5>
    </header>
    <div style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Firma adı</th>
                <th>Adres</th>
                <th>Telefon</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
            </thead>
            <?php
            $id = $_SESSION['id'];
            $sql = "SELECT *  FROM firma  WHERE id_kullanici=$id";
            $resultt = $conn->query($sql);
            if ($resultt->rowCount() > 0) {
                // output data of each row
                while ($rowt = $resultt->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $rowt['firmaad'] . "</td>";
                    echo "<td>" . $rowt['adres'] . "</td>";
                    echo "<td>" . $rowt['telefon'] . "</td>";
                    echo "<td>".$rowt['id_firma']. " </td>";
                    echo "<td><a href='deletefirma.php?id=".$rowt['id_firma']."' ><i class=\"fas fa-trash-alt\"></i> </a> </td>";
                    echo "</tr>";
                    echo "</tbody>";

                }
                echo "</table>";
            }
            else {
            echo "Sonuç Bulunamadı";
            }
            ?>
    </div>
    <h3 style="text-align: center">Firma Ekleyin</h3>
    <form  method="post" enctype="multipart/form-data" class="w3-container w3-card-4 w3-light-grey">
        <p>
            <label for="firmaad">Firma Adı</label>
            <input id="firmaad" class="w3-input w3-border w3-round-large" name="firmaad" type="text" required></p>
        <p>
            <label for="adres">Adres</label>
            <textarea id="adres" class="w3-input w3-border w3-round-large" name="adres" style="resize:none" required> </textarea>
        <p>
        <p>
            <label for="telefon">Telefon</label>
            <input id="telefon" class="w3-input w3-border w3-round-large" name="telefon" type="number" required></p>

        <div class="w3-center"><p>
                <input type="submit" value="ekle" name="ekle" class="w3-btn w3-teal" style="width:30%"></p>
        </div>
        <h4 style="text-align: center; color: green"><b>
                <?php
                if(isset($_POST['ekle'])) {
                    try{
                    $firmaad=$_POST['firmaad'];
                    $adres=$_POST['adres'];
                    $telefon=$_POST['telefon'];

                    $sql = "INSERT INTO firma (id_kullanici,firmaad, adres, telefon)
    VALUES ('$id', '$firmaad', '$adres','$telefon')";
                    $conn->exec($sql);
                    echo "Firma Başarıyla Eklendı!";
                    require_once "yondendir.php";
                    yonlendir("firmaBilgi.php",2);
                    }
                catch(PDOException $e)
                    {
                    echo $sql . "<br style='color: red'>" . $e->getMessage();
                    }
                    }
                ?>
            </b></h4>
    </form>

</div>
<script src="js/sidebar.js"></script>
</body>
</html>