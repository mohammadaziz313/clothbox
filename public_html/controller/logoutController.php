<?php
    session_start();
    session_unset();
    session_destroy();
    $location = "\clothbox\index.php";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'].$location);
?>