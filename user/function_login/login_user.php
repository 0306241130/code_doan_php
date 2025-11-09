<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    if(isset($_POST['loginemail']))$emailLogin=$_POST['loginemail'];
    if(isset($_POST['loginpass']))$passWord=$_POST['loginpass'];
    $con=connect();
    if($con){
        $sql="SELECT * FROM nguoi_dung WHERE email='".$emailLogin."'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $passUser = mysqli_fetch_assoc($result);
            session_unset();
            if(password_verify($passWord, $passUser['mat_khau_hash'])){
                $user=$passUser['ho_ten'] ;
                $_SESSION['USER']=$user;
                header("Location: ".URL);
                exit;
            }else{
                $_SESSION['error_Login']='<div class="alert alert-warning m-0 p-0" role="alert" style="color: #856404;">Email hoặc mật khẩu không đúng!</div>';
                header("Location: ".URL_LOGIN_USER);
            }

        }else{
            session_unset();
            $_SESSION['error_Login']='<div class="alert alert-warning m-0 p-0 " role="alert" style="color: #856404;">Email hoặc mật khẩu không đúng!</div>';
            header("Location: ".URL_LOGIN_USER);
        }
    }
}
?>