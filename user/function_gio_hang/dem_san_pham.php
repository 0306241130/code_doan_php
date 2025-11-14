<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
function dem(){
 $con=connect();
 $query=mysqli_query($con,"SELECT COUNT(*) AS soLuong FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
 $count=mysqli_fetch_assoc($query);  
 if($count['soLuong']>0){
        
        echo' <span class="position-absolute top-0  start-100 translate-middle badge rounded-pill bg-danger">
              '.$count['soLuong'].'
            </span>';
    }else{
        echo"";
    }
    
}
?>