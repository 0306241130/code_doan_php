<!DOCTYPE html>
<?php require_once(__DIR__ . "/../../difen_connect_php/connect.php"); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post" enctype="multipart/form-data">
      <input type="file" name="file-data" accept=".csv"/>
      <input type="submit" name="data" id="" value="nhập" >
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['data'])){
      $file_Name = $_FILES['file-data']['tmp_name'];
      if($_FILES['file-data']['error']!=0){
        echo"loi file";
        die;
      }
      if($_FILES['file-data']['size']<=0){
        echo"file rong";
        die;      
      }
      $file=fopen($file_Name,"r");
      $headers=fgetcsv($file);
      $con=connect();
      while(($row=fgetcsv($file,1000,","))!=FALSE){
        $masp=$row[0];
        $row = array_combine($headers, $row);
        $tensp=$row['ten_san_pham'];
        $mota=$row['mo_ta'];
        $thuonghieu=$row['ma_thuong_hieu'];
        $gia=$row['gia_ban'];
        $giam_Gia=$row['giam_gia'];
        $trangthaisp=$row['trang_thai_san_pham'];
        $size=$row['size'];
        $soluong=$row['so_luong'];
        $mau=$row['mau'];
        $arrysize=explode(",", $size);
        $arrymau=explode(",", $mau);
        $sql="INSERT INTO san_pham VALUES('".$masp."','".$tensp."','".$mota."','".$thuonghieu."','".$gia."','".$giam_Gia."','".$trangthaisp."')";
        mysqli_query($con,$sql);
        for($i=0;$i<count($arrysize);$i++){
          mysqli_query($con, "INSERT INTO size_san_pham VALUES('".$masp."','".$arrysize[$i]."')");
          mysqli_query($con, "INSERT INTO mau_san_pham VALUES('".$masp."','".$arrymau[$i]."')");
          for($j=0;$j<count($arrymau);$j++){
            $sql="INSERT INTO so_luong_ton(ma_san_pham,size,mau_sac,soluong) VALUES('".$masp."','".$arrysize[$i]."','".$arrymau[$j]."','".$soluong."')";
            mysqli_query($con,$sql);
          }
        }
        
      }
    }
    ?>
  </body>
</html>
