<?php
if(isset($_POST['girisbtn']))
{
    require_once "baglan.php";
    $email=$_POST["email"];
    $psw=$_POST["psw"];
    $hatirla=$_POST["hatirla"];
    $sorgu=$conn->prepare("SELECT * FROM kullanici WHERE mail=? and sifre=?"); // sql yazarak verilerin doğruluğunu kontrol ediyoruz.
    $sorgu->execute(array($email,$psw)); //Kontrol edilecek olan değişkenleri yazdık
    $islem=$sorgu->fetch(); // Burada sorguyu parcalayarak girilen bilgilerin karşılığı varmı dedik

    if($islem) // Karşığılı varsa buraya gir dedik
    {
        if($hatirla){
        session_start();
        $_SESSION['mail'] = $islem['mail']; // Giriş yaptığımız kullanici adımızı SEssion atadık
        $_SESSION['id'] = $islem['id_kullanici'];
        }
        header('Location: '."panel/teknikerpanel.php");
    }
    else//Eğer girilen bilgiler eşleşmiyorsa
    {
        $alert = "Kullanıcı Adınız veya Şifreniz Yanlış";
        echo "<script type='text/javascript'>alert('$alert');</script>";
    }
}

?>