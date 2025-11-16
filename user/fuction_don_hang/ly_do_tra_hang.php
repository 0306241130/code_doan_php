<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $madh=$_POST['madh'];
    $mact=$_POST['mact'];
    echo'<div id="traHang" class="position-fixed" >
    <button type="button" id="out" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
    <form action="../fuction_don_hang/tra_hang.php" method="POST" style="background: #f8f9fa; padding: 32px 24px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); min-width: 330px;">
      <h5 class="text-center mb-4"><strong>Chọn lý do trả hàng</strong></h5>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="lydo1" name="lydo[]" value="Sản phẩm bị lỗi">
        <label class="form-check-label" for="lydo1">
          Sản phẩm bị lỗi
        </label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="lydo2" name="lydo[]" value="Giao sai hàng">
        <label class="form-check-label" for="lydo2">
          Giao sai hàng
        </label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="lydo3" name="lydo[]" value="Không còn nhu cầu sử dụng">
        <label class="form-check-label" for="lydo3">
          Không còn nhu cầu sử dụng
        </label>
      </div>
      <input class="d-none" value="'.$madh.'" type="number" name="ma-don-hang">
      <input class="d-none" value="'.$mact.'" type="number" name="ma-chi-tiet">
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-2" name="traHang">Gửi lý do</button>
      </div>
      
    </form>
  </div>';
}
?>