<?php
require_once(__DIR__ . "/../../difen_connect_php/connect.php");

?>
<?php

    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['register'])){
        if(isset($_POST['logname']))$fullName=$_POST['logname'];
        if(isset($_POST['logemail']))$email=$_POST['logemail'];
        if(isset($_POST['logpass'])) $passWord = password_hash($_POST['logpass'], PASSWORD_DEFAULT);
        $con=connect();
        if($con){
            $sql="INSERT INTO nguoi_dung(email,mat_khau_hash,ho_ten)";
            $sql.="VALUES('".$email."','".$passWord."','".$fullName."')";
            $result=mysqli_query($con,$sql);
            if($result){
                header("Location: " . URL . "login.php");
                exit();
            }
         
        }
    
}
?>