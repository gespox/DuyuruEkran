<?php
ob_start();
if(isset($_POST['girisbtn'])) {
    require_once "baglan.php";
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $sorgu = $conn->prepare("SELECT * FROM kullanici WHERE mail=? and sifre=?"); // sql yazarak verilerin doğruluğunu kontrol ediyoruz.
    $sorgu->execute(array($email, $psw)); //Kontrol edilecek olan değişkenleri yazdık
    $islem = $sorgu->fetch(); // Burada sorguyu parcalayarak girilen bilgilerin karşılığı varmı dedik

    if ($islem) // Karşığılı varsa buraya gir dedik
    {

        $_SESSION['mail'] = $islem['mail']; // Giriş yaptığımız kullanici adımızı SEssion atadık
        $_SESSION['id'] = $islem['id_kullanici'];
        $_SESSION['adsoyad'] = $islem['adsoyad'];
        $_SESSION['bildirim'] =1;
        if ($islem['yetki']) {
            yonlendir("panel/pAdmin/panelAdmin.php");

        } else {
            $_SESSION['bildirim'] =1;
            $ekranid = "SELECT id_ekran FROM ekran WHERE kullanici_id=?";
            $stmt = $conn->prepare($ekranid);
            $stmt->execute([$islem['id_kullanici']]);
            $row = $stmt->fetch();
            $_SESSION['ekran_id']=$row['id_ekran'];
            yonlendir("panel/pUser/pUser.php");

        }
    } else//Eğer girilen bilgiler eşleşmiyorsa
    {
        ?>
        <script>
            var hatamesaji = document.getElementById('hatamesaji');
            hatamesaji.innerText = "Kullanıcı Adınız veya Şifreniz Yanlış";

            hatamesaji.style.display = 'block';
            $(document).ready(function () {
                // Show the Modal on load
                $("#exampleModalCenter").modal("show");

            });
        </script>

        <?php
    }
}
else{
    yonlendir("index.php");
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