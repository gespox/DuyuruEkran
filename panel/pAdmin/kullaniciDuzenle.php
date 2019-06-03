<?php session_start();
require_once "../../baglan.php";
?>
<!DOCTYPE html>
<html>
<title>Kulanıcı Paneli</title>
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

<body class="w3-light-grey ilanduzenle">


<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
    </header>

    <!-- **************Table******** -->
    <div style="overflow-x:auto;">
        <table>
            <tr>
                <th>Kullanıcı Id</th>
                <th>Kullanıcı Adı</th>
                <th>Mail</th>
                <th>Şifre</th>
                <th>Yetki</th>
                <th>Düzenle</th>
            </tr>
            <?php

            $id = $_SESSION['id'];
            $sql = "SELECT * FROM kullanici" ;
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                // output data of each row
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";
                    echo "<td>" . $row['id_kullanici'] . "</td>";
                    echo "<td>" . $row["kullanici_adi"] . "</td>";
                    echo "<td>" . $row["mail"] . "</td>";
                    echo "<td>" . $row["sifre"] . "</td>";
                    echo "<td>" . $row["yetki"] . "</td>";
                    echo "<td><a style='text-align: center' href='temp_1.php?id=".$row['id_template']."' target='_blank' ><i class=\"fas fa-eye\"></i></a> </td>";
                    echo "</tr>";
                }//while end

            }else {//if end
            ?>
        </table>
        <?php

        echo "Sonuç Bulunamadı";
        }
        $conn = null;

        ?>
    </div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
<script src="js/modal.js"></script>
<script src="js/sidebar.js"></script>

</body>
</html>
