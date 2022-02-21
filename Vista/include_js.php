<?php
echo "<script src='https://code.jquery.com/jquery-3.6.0.js'></script>";
echo "<script src='https://cdn.tailwindcss.com'></script>";

if (isset($_GET["error"])) {
    echo "<script> alert('".$_GET['error']."')</script>";
}