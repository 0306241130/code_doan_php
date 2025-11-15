<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masp = $_POST['masp'];
    $sql="SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE ma_san_pham='".$masp."'";
    $reslut=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($reslut);

    $reslut1=mysqli_query($con,"SELECT * FROM size_san_pham WHERE ma_san_pham='".$masp."'");
    $size="";
    while($row1=mysqli_fetch_assoc($reslut1)){
      $size .= '<input
            type="radio"
            class="btn-check check-size"
            name="Size"
            id="size-'.$row1['size'].'"
            autocomplete="off"
            value="'.$row1['size'].'"
          />
          <label class="btn btn-outline-primary btn-size rounded-pill px-3 py-1 fw-semibold mx-1 mb-1" for="size-'.$row1['size'].'">Size '.$row1['size'].'</label>';
    }

    $reslut2 = mysqli_query($con,"SELECT * FROM mau_san_pham WHERE ma_san_pham='".$masp."'");
    $color = "";
    while ($row2 = mysqli_fetch_assoc($reslut2)) {
      $color .= '<input
            type="radio"
            class="btn-check check-color"
            name="color"
            id="color-'.$row2['mau_sac'].'"
            autocomplete="off"
            value="'.$row2['mau_sac'].'"
          />
          <label class="btn btn-outline-warning btn-color rounded-pill px-3 py-1 fw-semibold mx-1 mb-1 text-capitalize" for="color-'.$row2['mau_sac'].'">'.$row2['mau_sac'].'</label>';
    }

    echo '
    <div class="card-shoes p-3 rounded-4 shadow-lg bg-white">
      <div class="tile-and-img d-flex flex-row align-items-center mb-3">
        <button class="out-card btn-close ms-auto bg-danger text-light p-2 rounded-circle" type="button" style="font-size:1.2rem;">
        </button>
        <img src="../img/'.$row['ten_san_pham'].'.jpg" alt="" class="rounded-3 shadow ms-3" style="width:110px;height:90px;object-fit:cover;" />
        <article class="price-shoes px-3 ms-3">
          <strong class="price-new d-block fs-4 mb-1 text-danger fw-bolder">
            '.number_format( $row['gia_sau_khi_giam'],0,"",".").'<small class="ms-1" style="font-size:85%;">đ</small>
          </strong>
          <strong class="price-old d-block text-muted fs-6 mb-2">
            <s>'.number_format( $row['gia_ban'],0,"",".").'</s>
            <small><s>đ</s></small>
            <span class="text-danger ms-2">'.($row['giam_gia']??10).'% OFF</span>
          </strong>
        </article>
      </div>
      <form action="../function_gio_hang/add_gio_hang.php" method="get" class="px-2">
        <div class="d-flex flex-wrap gap-2 mb-2">
          '.$size.'
        </div>
        <div class="d-flex flex-wrap gap-2 mt-2 mb-2">
          '.$color.'
        </div>
        <input
          type="number"
          name="quantity"
          id="quantity"
          placeholder="Số lượng"
          class="form-control mt-2 border-success w-50 mx-auto rounded-pill text-center fs-5"
          min="1"
          value="1"
        />
        <div class="d-grid mt-4">
          <button
            class="btn btn-danger add-card fw-bold py-2 rounded-pill"
            type="submit"
            name="gio-hang"
            value="'.$masp.'"
          >
            <i class="fa fa-shopping-cart me-2"></i>Thêm vào giỏ hàng
          </button>
        </div>
      </form>
    </div>
    ';
}
?>