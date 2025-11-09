<?php
require_once(__DIR__ . "/../../difen_connect_php/connect.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['email']))$email=$_POST['email'];
    $con=connect();
    if($con){
        $sql="SELECT * FROM nguoi_dung WHERE email='".$email."'";
        $result=mysqli_query($con,$sql);
        if($result){
                if(mysqli_num_rows($result) > 0){
                    echo '<div class="alert alert-warning m-0 p-0" role="alert" style="color: #856404;">Email đã tồn tại!</div>';
                }
        }
    }
}
?>