<?php
ob_start();
if(isset($_POST['girisbtn']))
{
    require_once "baglan.php";
    $email=$_POST["email"];
    $psw=$_POST["psw"];
    if(isset($_POST["hatirla"])){
        $hatirla=1;
    }else{
        $hatirla=0;
    }
    $sorgu=$conn->prepare("SELECT * FROM kullanici WHERE mail=? and sifre=?"); // sql yazarak verilerin doğruluğunu kontrol ediyoruz.
    $sorgu->execute(array($email,$psw)); //Kontrol edilecek olan değişkenleri yazdık
    $islem=$sorgu->fetch(); // Burada sorguyu parcalayarak girilen bilgilerin karşılığı varmı dedik

    if($islem) // Karşığılı varsa buraya gir dedik
    {
        if($hatirla){
        $_SESSION['mail'] = $islem['mail']; // Giriş yaptığımız kullanici adımızı SEssion atadık
        $_SESSION['id'] = $islem['id_kullanici'];

        }

        if($islem['yetki']) {
            yonlendir("panel/pAdmin/panelAdmin.php");
            //header('Location: ' . "panel/teknikerpanel.php");
        }else{
            yonlendir("panel/pUser/panelUser.php");

        }
    }
    else//Eğer girilen bilgiler eşleşmiyorsa
    {
        $alert = "Kullanıcı Adınız veya Şifreniz Yanlış";
        echo "<script type='text/javascript'>alert('$alert');</script>";
    }
}
function yonlendir($url){
    if (!headers_sent()){
        header('Location: '.$url);
        exit;
    }
    else{
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>