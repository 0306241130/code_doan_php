<?php
require_once(__DIR__."/difine.php");
function connect(){
    $sever_Name=SERVER;
    $username=USERNAME;
    $pass="";
    $dbname=DB;
    return mysqli_connect($sever_Name, $username, $pass, $dbname);
}
?>