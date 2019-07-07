<?php
session_start();

if (!isset($_SESSION['id'])) {
    require_once "yondendir.php";
    yonlendir("../../index.php",0);
    exit();
}
$kullaniciId=$_SESSION['id'];
require_once "../../baglan.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kulanıcı Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="../../css/afteredit.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">
<!--***************** Sidebar  ****************-->
<?php require_once "sidebar.php"; ?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"> </i> Kurum Ayarları </b></h5>
    </header>
    <!-- CONTENT CONTAINER -->
    <div class="w3-container w3-white w3-margin w3-padding">
        <?php
        if(isset($_POST["guncelle"])) {
            $kurumad=$_POST['kurumad'];
            $adsoyad = $_POST['adsoyad'];
            $sehir=$_POST['sehir'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $adres = $_POST['adres'];
            if(isset( $_FILES["fileToUpload"] ) && !empty( $_FILES["fileToUpload"]["name"] )){
                $target_dir = "img/";
                $imgName = $kullaniciId ."-" . basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $imgName;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check == false) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
           HATA! Yüklenen Dosya JPG,JPEG veya PNG Formatlarinda Resim Olmalidir.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Check file size
                elseif ($_FILES["fileToUpload"]["size"] > 1024 * 1024 * 2) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
           HATA! Dosya boyutu max 2MB'tır.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Allow certain file formats
                elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Sadece  JPG, JPEG, PNG formatlarında resim yükleyebilirsiniz.
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                    $uploadOk = 0;
                } // Check if $uploadOk is set to 0 by an error
                else {
                    if ($uploadOk == 0) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $sqlUyekayit = "UPDATE kurum SET kurumAd=?,ad_soyad=?,il=?,logo=?,mail=?,telefon=?,adres=? WHERE kullanici_id=?";
                            $uyeKayit=$conn->prepare($sqlUyekayit);
                            $checkUyeKayit=$uyeKayit->execute([$kurumad,$adsoyad,$sehir,$target_file,$email,$telefon,$adres,$kullaniciId]);
                            if($checkUyeKayit) {
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Ayarlar Basariyla Guncellendi!
                         <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      </div>";
                            }else {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                            }

                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                        }
                    }
                }
            }
            else{
                $sqlUyekayit = "UPDATE kurum SET kurumAd=?,ad_soyad=?,il=?,mail=?,telefon=?,adres=? WHERE kullanici_id=?";
                $uyeKayit=$conn->prepare($sqlUyekayit);
                $checkUyeKayit=$uyeKayit->execute([$kurumad,$adsoyad,$sehir,$email,$telefon,$adres,$kullaniciId]);
                if($checkUyeKayit) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Ayarlar Basariyla Guncellendi!
                         <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      </div>";
                }else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Üzgünüz bir hata oluştu lütfen tekrar deneyiniz!
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        </div>";
                }

            }

        }?>
        <div class="w3-container  w3-white w3-margin w3-padding">
            <?php
            $sehir=array(34=>"istanbul",6=>"ankara",35=>"izmir",1=>"adana",2=>"adıyaman",3=>"afyon",4=>"ağrı",68=>"aksaray",5=>"amasya",
                7=>"antalya",75=>"ardahan",8=>"artvin",9=>"aydın",10=>"balıkesir",74=>"bartın",72=>"batman",69=>"bayburt",11=>"bilecik",
                12=>"bingöl",13=>"bitlis",14=>"bolu",15=>"burdur",16=>"bursa",17=>"çanakkale",18=>"çankırı",19=>"çorum",20=>"denizli",
                21=>"diyarbakır",81=>"düzce",22=>"edirne",23=>"elazığ",24=>"erzincan",25=>"erzurum",26=>"eskişehir",27=>"gaziantep",
                28=>"giresun",29=>"gümüşhane",30=>"hakkari",31=>"hatay",76=>"ığdır",32=>"ısparta",33=>"içel",78=>"karabük",70=>"karaman",
                36=>"kars",37=>"kastamonu",38=>"kayseri",71=>"kırıkkale",39=>"kırklareli",40=>"kırşehir",79=>"kilis",41=>"kocaeli",42=>"konya",
                43=>"kütahya",44=>"malatya",45=>"manisa",46=>"maraş",47=>"mardin",48=>"muğla",49=>"muş",50=>"nevşehir",51=>"niğde",
                52=>"ordu",80=>"osmaniye",53=>"rize",54=>"sakarya",55=>"samsun",56=>"siirt",57=>"sinop",58=>"sivas",73=>"şırnak",
                59=>"tekirdağ",60=>"tokat",61=>"trabzon",62=>"tunceli",63=>"şanlıurfa",64=>"uşak",65=>"van",77=>"yalova",66=>"yozgat",
                67=>"zonguldak");
            $KullaniciSelect = "SELECT * FROM kurum WHERE kullanici_id=?";
            $stmt = $conn->prepare($KullaniciSelect);
            $stmt->execute([$kullaniciId]);
            $row = $stmt->fetch(); ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="kurumad">Kurum Adi:</label>
                    <input type="text" class="form-control" id="kurumad" name="kurumad" <?php if($row['kurumAd']!=NULL){?> value=<?php echo "\""; echo $row['kurumAd']; echo "\"";  } ?> required>
                </div>
                <div class="form-group">
                    <label for="name">Yönetici Ad Soyad:</label>
                    <input type="text" class="form-control" id="name" name="adsoyad" value="<?php echo $row['ad_soyad'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="sehir">Şehir:</label>
                    <select class="form-control" id="sehir" name="sehir" required>
                        <?php foreach($sehir as $key => $value){?>
                            <option value="<?php echo $value;?>" <?php if($row['il']!=NULL){ if($value==$row['il']){echo ' selected';}}?>><?php echo $value;?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email Adresi:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['mail'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="tel">Telefon:</label>
                    <input class="form-control" type="tel" id="tel" name="telefon" value="<?php echo $row['telefon'];  ?>" required>
                </div>
                <div class="form-group">
                    <label for="adres">Adres:</label>
                    <textarea class="form-control" id="adres" name="adres" rows="3"><?php if($row['adres']!=NULL){ echo $row['adres'];} ?></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="fileToUpload">Kurum Logo:</label>
                        <input type="file" name="fileToUpload" class="form-control-file col-4" id="fileToUpload" >
                        <div class="w3-col s4">
                            Mevcut Logo:
                            <img src="<?php echo $row['logo'];?>" class="w3-circle w3-margin-right" style="width:46px">
                        </div>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Logo Seçiniz Dosya Boyutu:Mak:2 Mb Dosya Türü:(.png, .jpeg, .jpg) olmalıdır. Düzgün Görünmesi İçin En az 400px önerilir.</small>
                </div>
                <button type="submit" class="btn btn-primary" name="guncelle">Güncelle</button>
            </form>

        </div>

    </div>
</body>
</html>