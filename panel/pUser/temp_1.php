<?php require_once '../../baglan.php';
if(isset($_GET['id'])){
    $idtema=$_GET['id'];
    $sql = "SELECT firmaad,adres,telefon,baslik,metin,resimurl FROM template t,firma f,baslik b,metin m,resim r WHERE 
                                                                t.id_template='$idtema' AND 
                                                                t.id_baslik=b.id_baslik AND
                                                                t.id_metin=m.id_metin AND
                                                                t.id_resim=r.id_resim AND
                                                                t.id_firma=f.id_firma
                                                                ";
    $result = $conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);
    if ($result->rowCount() > 0) {
        $firmaad= $row['firmaad'];
        $fAdres=$row['adres'];
        $fTelefon=$row['telefon'];
        $baslik=$row['baslik'];
        $metin=$row['metin'];
        $resim=$row['resimurl'];
    }
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pano1</title>
    <style>
        body{
            margin: 0;
            background: #cccccc;
        }
        .main{
            display: flex;
            flex-wrap: wrap;
            height: 100vh;

        }
        .w3-theme-l5 {color:#000 !important; background-color:#fbfaf8 !important}
        .w3-theme-l4 {color:#000 !important; background-color:#f2eee8 !important}
        .w3-theme-l3 {color:#000 !important; background-color:#e5ddd1 !important}
        .w3-theme-l2 {color:#000 !important; background-color:#d8ccba !important}
        .w3-theme-l1 {color:#000 !important; background-color:#ccbba4 !important}
        .w3-theme-d1 {color:#fff !important; background-color:#b39a78 !important}
        .w3-theme-d2 {color:#fff !important; background-color:#a78a62 !important}
        .w3-theme-d3 {color:#fff !important; background-color:#957954 !important}
        .w3-theme-d4 {color:#fff !important; background-color:#7f6848 !important}
        .w3-theme-d5 {color:#fff !important; background-color:#6a573c !important}

        .w3-theme-light {color:#000 !important; background-color:#fbfaf8 !important}
        .w3-theme-dark {color:#fff !important; background-color:#6a573c !important}
        .w3-theme-action {color:#fff !important; background-color:#6a573c !important}

        .w3-theme {color:#000 !important; background-color:#c0ab8e !important}
        .w3-text-theme {color:#c0ab8e !important}
        .w3-border-theme {border-color:#c0ab8e !important}

        .w3-hover-theme:hover {color:#000 !important; background-color:#c0ab8e !important}
        .w3-hover-text-theme:hover {color:#c0ab8e !important}
        .w3-hover-border-theme:hover {border-color:#c0ab8e !important}
        .img2 {
            float: right;
        }
        div p#date,p#time{
            margin: 0;
        }
        #date
        {

            color: #e7e7e7;
            font-size:30px;
            width:80%;
        }
        #time
        {
            font-size:70px;
            color: #e7e7e7;
            width:80%;
        }
        .firmaadi{
            font-family: "Courier New", Courier, monospace;
            color: #e7e7e7;
            font-size:40px;
        }
        .adres{
            font-family: "Courier New", Courier, monospace;
            color: #959595;
            font-size:30px;
        }</style>
</head>
<body>
<div class="main w3-theme-l4">
    <div class="w3-col s4 w3-theme-l4 w3-center">
        <div class="w3-container w3-theme-l3">
            <span class="firmaadi w3-theme-d4">

            <?php
            echo $firmaad;
            ?>

            </span>
            <br>
            <span class="w3-theme-d4 adres">
                <?php
                echo  $fAdres."<br/>";
                echo $fTelefon;
                ?>
            </span>
        </div>
        <div class="w3-container w3-theme-l2">
           <span class="w3-theme-d5" id="date"> </span>
           <span class="w3-theme-d5" id="time"> </span>
        </div>
        <div class="w3-container w3-theme-l1">
            <a class="weatherwidget-io" href="https://forecast7.com/tr/39d7537d02/sivas/" data-label_1="SIVAS" data-label_2="WEATHER" data-theme="desert" data-basecolor="#ccbba4" data-shadow="rgba(10, 10, 10, 0.31)" data-accent="rgba(15, 15, 15, 0.05)" data-textcolor="#010100" data-highcolor="#f80a4b" data-lowcolor="#0375fb" data-suncolor="#866304" >SIVAS Hava Durumu</a>
            <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
        </div>
<div class="w3-container  w3-col s8 w3-theme-l4 w3-text-black w3-center w3-cell-middle">
    <h1><?php
        echo  $baslik;
        ?>
    </h1>
    <div class="w3-container">
        <img class="img2" src="<?php echo $resim; ?>" alt="Resim" width="300" height="300">
        <span class="">
                <?php
                echo $metin;
                ?>
            </span>
    </div>
</div>
</div>
<script type="text/javascript">
    window.onload = setInterval(clock,1000);
    var datem=document.getElementById("date");
    var time=document.getElementById("time");
    function clock()
    {
        var d = new Date();
        var date = d.getDate();
        var month = d.getMonth();
        var montharr =["Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara"];
        month=montharr[month];
        var year = d.getFullYear();
        var day = d.getDay();
        var dayarr =["Paz","Pzt","Sal","Çar","Per","Cum","Cmt"];
        day=dayarr[day];
        var hour =d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();
        if (hour < 10)
        {
            hour = "0" + hour;
        }
        if (min < 10)
        {
            min = "0" + min;
        }
        if (sec < 10)
        {
            sec = "0" + sec;
        }
        datem.textContent =day+" "+date+" "+month+" "+year;
        time.textContent =hour+":"+min+":"+sec;
    }
</script>
</body>
</html>