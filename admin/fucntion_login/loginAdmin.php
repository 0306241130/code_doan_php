<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['loginAdmin'])){
    if(isset($_POST['password']))$password= md5($_POST['password']);
    if(isset($_POST['username']))$username=$_POST['username'];
    $con=connect();
    $result=mysqli_query($con,"SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'");
    if(mysqli_num_rows($result)>0){
        session_unset();
        $_SESSION['ADMIN']=$username;
        header("Location: ". URL_ADMIN);
        exit();
    }else{
        $_SESSION['ERROR_ADMIN'] = '<div class="alert alert-danger p-1 mt-1" role="alert" style="color: #721c24;">Sai tên đăng nhập hoặc mật khẩu!</div>';
        header("Location: ". URL_LOGIN_ADMIN);
        exit();
    }

   
}
?>