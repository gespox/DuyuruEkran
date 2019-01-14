<?php
/**
 * Created by PhpStorm.
 * User: Gespox
 * Date: 12.01.2019
 * Time: 18:56
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image:url("img/bb.jpg");
        }

        form {
            border:2px solid #202e40;
            background-color: #e2e2e2;
        }

        input[type=text], input[type=password] {
            width:70%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #202e40;
            box-sizing: border-box;
        }

        .login {

            background-color: #3566af;
            border: 2px solid #202e40;
            color: white;
            padding: 10px;
            margin: 8px 0;

            cursor: pointer;
            width: 40%;
        }

        button:hover {
            opacity: 0.8;
        }
        .container {
            padding: 16px;
            text-align: center;
        }

        .login {

            padding-top: 16px;
        }
        .main{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 90vh;
        }

    </style>
</head>
<body>
<div class="div main">
<form method="post" action="template/temp_1.php">


    <div class="container">
        <label for="kadi"><b>Kullanici Adi</b></label>
        <br>
        <input type="text" placeholder="Kullanici adi girin" name="kadi" required>
        <br>
        <label for="sifre"><b>Sifre</b></label>
        <br>
        <input type="password" placeholder="Sifre Girin" name="sifre" required>
        <br>
        <button type="submit" class="login">Giris</button>
    </div>


</form>
</div>
</body>
</html>

