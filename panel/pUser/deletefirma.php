<?php
session_start();
require_once "../../baglan.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM firma WHERE id_firma=$id";
    $conn->exec($sql);
    require_once "yondendir.php";
    yonlendir("firmaBilgi.php", 1);
    echo "<h2 style='color: green; text-align: center'>Firma Basarılı Şekilde Silindi!</h2>";
}
?>