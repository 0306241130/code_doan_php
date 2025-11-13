<?php
require_once(__DIR__ ."/../../difen_connect_php/connect.php");
session_start();
if(isset($_SESSION['USER'])){
    unset($_SESSION['USER'], $_SESSION['MA_USER']);
    header("Location: ".URL);
    exit();
}
?>