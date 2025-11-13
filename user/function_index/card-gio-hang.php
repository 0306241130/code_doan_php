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
      $size.='<input
            type="radio"
            class="btn-check check-size"
            name="Size"
            id="size-'.$row1['size'].'"
            autocomplete="off"
            value="'.$row1['size'].'"
            required
          />
          <label class="btn btn-outline-success" for="size-'.$row1['size'].'">size '.$row1['size'].'</label>';
    }

    $reslut2=mysqli_query($con,"SELECT * FROM mau_san_pham WHERE ma_san_pham='".$masp."'");
    $color="";
   while ($row2=mysqli_fetch_assoc($reslut2)) {
     $color.='<input
            type="radio"
            class="btn-check check-color"
            name="color"
            id="'.$row2['mau_sac'].'"
            autocomplete="off"
            value="'.$row2['mau_sac'].'"
            required
          />
          <label class="btn btn-outline-success" for="'.$row2['mau_sac'].'">'.$row2['mau_sac'].'</label>';
   }

    echo '
    <div class="card-shoes pb-2">
      <div class="tile-and-img">
        <button class="out-card" type="button">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <img src="../img/'.$row['ten_san_pham'].'.jpg" alt="" />
        <article class="price-shoes px-2" style="position: relative">
          <strong style="position: relative" class="price-new">
            '.number_format( $row['gia_sau_khi_giam'],0,"",".").'<small style="position: absolute">đ</small>
          </strong><br />
          <strong style="position: relative" class="price-old">
            <s>'.number_format( $row['gia_ban'],0,"",".").'</s>
            <small style="position: absolute"><s>đ</s></small>
            <span class="text-danger ms-3">-10%</span>
          </strong>
        </article>
      </div>
      <form action="#" method="get" class="px-2">
        <div class="d-flex gap-2">
          '.$size.'
        </div>
        <div class="d-flex gap-2 mt-2">
          '.$color.'
        </div>
        <input
          type="number"
          name="quantity"
          id="quantity"
          placeholder="Số lượng"
          class="form-control mt-2"
          min="1"
          max="10"
          value="1"
        />
        <div class="d-grid gap-2">
          <button
            class="btn btn-danger mt-2 add-card"
            type="submit"
            name="gio-hang"
            value="'.$masp.'"
          >
            <i class="fa fa-shopping-cart"></i>
          </button>
        </div>
      </form>
    </div>
    ';
}
?>