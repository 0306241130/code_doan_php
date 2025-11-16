<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $con=connect();
$ten_san_pham = isset($_POST['ten_san_pham']) ? $_POST['ten_san_pham'] : '';
$mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';
$ma_thuong_hieu = isset($_POST['ma_thuong_hieu']) ? $_POST['ma_thuong_hieu'] : '';
$gia_ban = isset($_POST['gia_ban']) ? $_POST['gia_ban'] : '';
$giam_gia = isset($_POST['giam_gia']) ? $_POST['giam_gia'] : '';
$mau_san_pham = isset($_POST['mau_san_pham']) ? $_POST['mau_san_pham'] : '';
$size = isset($_POST['size']) ? $_POST['size'] : '';

$result=mysqli_query($con,"SELECT MAX(IFNULL(ma_san_pham,0)) AS ma_san_pham FROM san_pham");
$row=mysqli_fetch_assoc($result);
$ma_san_pham=$row['ma_san_pham']+1;

$mau_san_pham = explode(",", $mau_san_pham);
$size=explode(",",$size);



mysqli_query($con,"INSERT INTO san_pham VALUES(".$ma_san_pham.",'".$ten_san_pham."','".$mo_ta."',".$ma_thuong_hieu.",".$gia_ban.",".$giam_gia.",1)");

foreach($mau_san_pham AS $value){
    mysqli_query($con,"INSERT INTO mau_san_pham VALUES(".$ma_san_pham.",'".$value."')");
}
foreach($size AS $value){
    mysqli_query($con,"INSERT INTO size_san_pham VALUES(".$ma_san_pham.",".(int)$value.")");
}


// Xử lý file hình ảnh nếu có
$hinh_anh = "";
if(isset($_FILES['hinh_anh'])){
     //Thư mục bạn lưu file upload
     $target_dir = "D:/0306241130/PHP/phan_mem_xampp/htdocs/code_doan_php/user/img/";
     //Đường dẫn lưu file trên server
     $target_file   = $target_dir . basename($_FILES["hinh_anh"]["name"]);
     $allowUpload   = true;
    
     
     //Kích thước file lớn nhất được upload (bytes)
     $maxfilesize   = 10000000;//10MB

     //1. Kiểm tra file có bị lỗi không?
     if ($_FILES["hinh_anh"]['error'] != 0) {
         echo "<br>The uploaded file is error or no file selected.";
         die;
     }

     
     //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
     if ($_FILES["hinh_anh"]["size"] > $maxfilesize) {
         echo "<br>Size of the uploaded file must be smaller than $maxfilesize bytes.";
         $allowUpload = false;
     }

     //4. Kiểm tra file đã tồn tại trên server chưa?
     if (file_exists($target_file)) {
         echo "<br>The file name already exists on the server.";
         $allowUpload = false;
     }

     if ($allowUpload) {
         //Lưu file vào thư mục được chỉ định trên server
         if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
             echo "<br>File ". basename( $_FILES["hinh_anh"]["name"])." uploaded successfully.";
             echo "The file saved at " . $target_file;

         } else {
              echo "<br>An error occurred while uploading the file.";
         }
     }
    
}
header("Location: ". URL_ADMIN . "san-pham.php");
exit();
} 
?>