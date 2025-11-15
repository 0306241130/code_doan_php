<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_SESSION['ADMIN'])){
    session_unset();
    header("Location: ".URL_LOGIN_ADMIN);
    exit();
}
?>