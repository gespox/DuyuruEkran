<?php
session_start();
require_once "yondendir.php";
if(!isset($_SESSION['id'])) {
    yonlendir("../../index.php");
}
else{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
       <!-- <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>!-->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Duyuru Duzenleme Paneli</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="panelUser.css">
    </head>
    <body>
        <div id="header">
            <?php
            //Header Ekleme
            include "header.php";
            ?>
        </div>
        <div id="container">
            <?php
            //Sidebar Ekleme
            include "sidebar.php";

            ?>
            <div class="content">
                <h1>Gorunum Paneli</h1>
                <div id="box">
                    <div class="box-top">Olusturulan Template'lar</div>
                    <div class="box-panel">
                        <?php require_once"../../baglan.php"?>

                        <div style="overflow-x:auto;">
                            <table>
                                <tr>
                                    <th>Firma</th>
                                    <th>Baslik</th>
                                    <th>Metin</th>
                                    <th>Resim</th>
                                </tr>
                                <?php
                                $id=$_SESSION['id'];
                                $sql = "SELECT firmaad,baslik,metin,resimurl FROM template t,firma f,baslik b,metin m,resim r WHERE 
                                                            t.id_kullanici='$id' AND 
                                                            t.id_baslik=b.id_baslik AND
                                                            t.id_metin=m.id_metin AND
                                                            t.id_resim=r.id_resim AND
                                                            t.id_firma=f.id_firma
                                                            ";
                                $result = $conn->query($sql);
                                if ($result->rowCount() > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['firmaad'] . "</td>";
                                        echo "<td>" . $row["baslik"] . "</td>";
                                        echo "<td>" . $row["metin"] . "</td>";
                                        echo "<td><img id='myImg' src='" . $row["resimurl"] . "' width='100' height='100'> </img</td>";
                                        echo "</tr>";
                                    }//while end
                                }else {//if end
                               ?>
                            </table>
                            <?php

                                    echo "Sonuç Bulunamadı";
                                }
                                $conn = null;
                                ?>
                        </div>

                    </div>
                </div>
            </div>
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
        <script src="pUserjs.js"></script>
    </body>
    </html>
    <?php
}
?>