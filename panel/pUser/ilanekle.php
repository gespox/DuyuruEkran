<?php session_start();
require_once "../../baglan.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>İlan Ekleme</title>
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
<body class="w3-light-grey ilanekleme">
<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"> </i> İlan Yükleme</b></h5>
    </header>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="w3-container w3-card-4 w3-light-grey">
        <p>
            <label for="baslik">Duyuru Başlığı</label>
            <input id="baslik" class="w3-input w3-border w3-round-large" name="baslik" type="text" required></p>
        <p>
            <label for="metin">Duyuru Metni</label>
            <textarea id="metin" class="w3-input w3-border w3-round-large" name="metin" style="resize:none" required> </textarea>
        <p>
            <label for="firma">Duyurunun Yayınlanacağı Firma</label>
            <?php
            $userid=$_SESSION['id'];
            $sql = "SELECT firmaad,id_firma FROM firma WHERE id_kullanici=$userid";
            $result = $conn->query($sql);
            ?>
            <select id="firma" name="firma" class="w3-select w3-border w3-round-large" required>
                <option value="" disabled selected>Firma Seçin</option>
            <?php
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo " <option value='".$row['id_firma']."' >".$row['firmaad']."</option> ";
                }//while end
            }else{
                ?>
                <option value="" disabled selected>Ekli Firma Yok.</option>
                <?php
            }
            ?>
            </select>
        </p>
        <p>
            <label for="fileToUpload">Yüknelecek Fotoğraf <b>:</b> </label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
        </p>
        <div class="w3-center"><p>
        <input type="submit" value="Gonder" name="submit" class="w3-btn w3-teal" style="width:30%"></p>
        </div>
    </form>
</div>
<script src="js/sidebar.js"></script>
</body>
</html>