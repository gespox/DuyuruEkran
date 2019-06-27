<?php
    function yonlendir($url, $time)
    {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $geturl = explode('/', $actual_link);
        array_pop($geturl);
        $gidenurl = implode('/', $geturl);
        $gidenurl .= "/" . $url;

        if (!headers_sent()) {
            header("refresh:" . $time . ";url=" . $gidenurl . "");
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { window.location.href= '" . $gidenurl . "';}," . $time . ");";
            echo '</script>';
            echo '<meta http-equiv="refresh" content="' . $time . ';url=' . $gidenurl . '" />';
        }
    }
?>