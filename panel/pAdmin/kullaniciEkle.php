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

<body class="w3-light-grey ilanekleme">


<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
    </header>

    <!-- **************Table******** -->
    <form action="upload.php" method="post" enctype="multipart/form-data" class="w3-container w3-card-4 w3-light-grey">
        <p>
            <label for="kullanici_adi">Kullanıcı Adı</label>
            <input id="kullanici_adi" class="w3-input w3-border w3-round-large" name="kullanici_adi" type="text" required></p>
        <p>
            <label for="mail">Mail</label>
            <textarea id="mail" class="w3-input w3-border w3-round-large" name="mail" style="resize:none" required> </textarea>
        <p>
            <label for="sifre">Şifre</label>
            <textarea id="sifre" class="w3-input w3-border w3-round-large" name="sifre" style="resize:none" required> </textarea>
        <p>
            <label for="yetki">Yetki</label>

            <select id="yetki" name="yetki" class="w3-select w3-border w3-round-large" required>
                <option value="" disabled selected>Yetki Seçin</option>

                <option value='0' >Kullanıcı Yetkisi</option>
                <option value='1' >Admin Yetkisi</option>

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