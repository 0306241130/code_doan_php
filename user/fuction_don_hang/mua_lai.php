<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");

$con=connect();
if(isset($_REQUEST['mact'])&&isset($_REQUEST['mdh'])){
    $mact=$_REQUEST['mact'];
    $madh=$_REQUEST['mdh'];
    
 

    
    header("Location: ". URL ."donhang.php");
    exit();
}
?>