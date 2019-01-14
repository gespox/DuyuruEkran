<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbase= "bitirme";
*/
$servername = "localhost";
$username = "gespox";
$password = "123456";
$dbase="bitirme";

try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbase;charset=utf8","$username","$password");
}catch (PDOException $error){
    echo "VERI TABANI BAGLANTISI SAGLANAMADI !";
    die($error->getMessage());
}
?>
