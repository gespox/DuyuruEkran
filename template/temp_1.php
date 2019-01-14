<?php require_once '../baglan.php'; ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/css.css" rel="stylesheet" type="text/css">
    <title>Pano1</title>
</head>
<body>
<div class="main">
    <div class="sag">
        <div class="firma">
            <span class="firmaadi">
            <?php
            $id=1;
            $firma = $conn->query("Select * from firma WHERE id_firma=$id", PDO::FETCH_ASSOC);
            foreach ($firma as $row) {
                echo  $row["firmaad"];
            ?>
            </span>
            <br>
            <span class="adres">
                <?php
                echo  $row["adres"];
                }
                ?>
            </span>
        </div>
        <div class="saat">
           <p id="date"></p>
           <p id="time"></p>
        </div>
        <div class="havadrm">
            <a class="weatherwidget-io" href="https://forecast7.com/tr/39d7537d02/sivas/" data-label_1="SIVAS" data-label_2="Hava Durumu" data-theme="original" >SIVAS Hava Durumu</a>
            <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
        </div>
<div class="orta">
<h1><?php
    $id=1;
    $firma = $conn->query("Select * from baslik WHERE id_baslik=$id", PDO::FETCH_ASSOC);
    foreach ($firma as $row) {

    echo  $row["baslik"];

    ?>
</h1>
    <div class="clearfix">
        <h1><span class="">
                <?php
                echo  $row["btext"];
                }
                ?>


            </span></h1>
        <img class="img2" src="<?php
        $id=1;
        $firma = $conn->query("Select * from resim WHERE id_resim=$id", PDO::FETCH_ASSOC);
        foreach ($firma as $row) {
            echo $row["resimurl"];
        }
        ?>" alt="Resim" width="300" height="300">
        <span class="">
                <?php
                $id=1;
                $firma = $conn->query("Select * from metin WHERE id_metin=$id", PDO::FETCH_ASSOC);
                foreach ($firma as $row) {

                    echo $row["metin"];

                }
                ?>


            </span>
    </div>
</div>
</div>
<script type="text/javascript">
    window.onload = setInterval(clock,1000);
    var datem=document.getElementById("date")
    var time=document.getElementById("time")
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