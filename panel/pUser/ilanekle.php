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
            <h1>İlan Ekleme</h1>
            <div id="box">
                <div class="box-top">Eklemek İstediğiniz İlan Bilgilerini Girin</div>
                <div class="box-panel">
                    <form >
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">

                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>



<?php
}
    ?>