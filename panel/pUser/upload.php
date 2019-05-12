<?php
session_start();
require_once "../../baglan.php";
require_once "yondendir.php";
$userid=$_SESSION['id'];
$sql = "SELECT COUNT(id_resim) FROM resim WHERE id_kullanici='$userid'";
$result = $conn->query($sql)->fetchColumn();

$target_dir = "img/";
$imgName= $userid."-".++$result."-".basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir .$imgName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Yüklenen Dosya Resim değildir.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1024*1024*2) {
    echo "Üzgünüz, Dosya boyutu max 2MB'tır.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Üzgünüz, Sadece  JPG, JPEG, PNG & GIF formatlarında dosya yükleyebilirsiniz.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Üzgünüz Dosya Yüklenemedi. Tekrar yüklemek için yönlendiriliyorsunuz.";
    $url="ilanEkle.php";
    yonlendir($url,3);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $baslik=$_POST['baslik'];
        $metin=$_POST['metin'];
        $firma=$_POST['firma'];

        $sqlbaslik = "INSERT INTO baslik (baslik)
    VALUES ('$baslik')";
        $conn->exec($sqlbaslik);
        $last_id_baslik = $conn->lastInsertId();

        $sqlmetin = "INSERT INTO metin (metin)
    VALUES ('$metin')";
        $conn->exec($sqlmetin);
        $last_id_metin = $conn->lastInsertId();

        $sqlresim = "INSERT INTO resim (id_kullanici,resimurl)
    VALUES ('$userid','$target_file')";
        $conn->exec($sqlresim);
        $last_id_resim = $conn->lastInsertId();

        $sqlilan = "INSERT INTO template (id_kullanici,id_baslik,id_metin,id_resim,id_firma)
    VALUES ('$userid','$last_id_baslik','$last_id_metin','$last_id_resim','$firma')";
        $conn->exec($sqlilan);

        $url="pUser.php";
        yonlendir($url,3);
        echo "<h3 style='text-align: center;color: green'>Ekleme Başarılı, 3 saniye sonra yönlendirileceksiniz.</h3>";
    } else {
        $url="ilanEkle.php";
        yonlendir($url,3);
        echo "Üzgünüz bir hata oluştu lütfen tekrar deneyiniz! Yönlendirme işlemi için bekleyiniz.";
    }
}
?>