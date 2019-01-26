<?php
session_start();

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    header("Refresh:0;url=?c=home");
}

//echo 'SESSION : ';
//var_dump($_SESSION);
//echo '<br>-----------------------------------<br> POST : ';
//var_dump($_POST);
?>




