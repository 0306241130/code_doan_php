<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function render_card_new(){
    global $con;
    if($con){
        $sql="SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE mo_ta='new' ORDER BY ma_san_pham LIMIT 6";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo'<div class="card" style="width: 18rem">
            <img src="../img/'.$row['ten_san_pham'].'.jpg" class="card-img-top" alt="'.$row['ten_san_pham'].'" />
            <div class="card-body">
              <p class="card-text fw-bold">'.$row['ten_san_pham'].'</p>
              <span class="fw-bold">'.number_format( $row['gia_sau_khi_giam'],0,"",".").'₫</span><br />
              <strong class="price-old"
                ><s>'.number_format( $row['gia_ban'],0,"").'₫</s> <span>-'.$row['giam_gia'].'%</span></strong
              >
              <div class="d-flex gap-2 coulmn-6 mx-auto">
                <a href="buy.php?masp='.$row['ma_san_pham'].'" class="btn btn-outline-success pull-right">
                  Buy
                </a>
                <a
                  data-masp="'.$row['ma_san_pham'].'"
                  class="btn btn-danger pull-right fw-bold ms-1 add-to-card"
                >
                  <i class="fa fa-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>';
        }
    }
}
function render_card_hot(){
    global $con;
    if($con){
        $sql="SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE mo_ta='hot' ORDER BY ma_san_pham LIMIT 6";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo'<div class="card" style="width: 18rem">
            <img src="../img/'.$row['ten_san_pham'].'.jpg" class="card-img-top" alt="'.$row['ten_san_pham'].'" />
            <div class="card-body">
              <p class="card-text fw-bold">'.$row['ten_san_pham'].'</p>
              <span class="fw-bold">'.number_format( $row['gia_sau_khi_giam'],0,"",".").'₫</span><br />
              <strong class="price-old"
                ><s>'.number_format( $row['gia_ban'],0,"").'₫</s> <span>-'.$row['giam_gia'].'%</span></strong
              >
              <div class="d-flex gap-2 coulmn-6 mx-auto">
                <a href="buy.php?masp='.$row['ma_san_pham'].'" class="btn btn-outline-success pull-right">
                  Buy
                </a>
                <a
                  data-masp="'.$row['ma_san_pham'].'"
                  class="btn btn-danger pull-right fw-bold ms-1 add-to-card"
                >
                  <i class="fa fa-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>';
        }
    }
}
?>