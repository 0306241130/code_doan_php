<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['masp']))$masp=$_REQUEST['masp'];
function render_Size(){
    global $con,$masp;
    $result1=mysqli_query($con,"SELECT * FROM size_san_pham WHERE ma_san_pham=".$masp."");
    $size="";
    while($row1=mysqli_fetch_assoc($result1)){
        // Đổi class để giao diện lựa chọn Size đẹp hơn
        $size.='<input
                    type="radio"
                    class="btn-check"
                    name="Size"
                    id="size-'.$row1['size'].'"
                    autocomplete="off"
                    value="'.$row1['size'].'"
                    required
                  />
                  <label class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold shadow-sm me-2 mb-1" for="size-'.$row1['size'].'"
                    >Size '.$row1['size'].'</label>';
    }
    return $size;
}
function render_Mau(){
    global $con,$masp;
    $result2=mysqli_query($con,"SELECT * FROM mau_san_pham WHERE ma_san_pham=".$masp."");
    $mau="";
    while($row2=mysqli_fetch_assoc($result2)){
        $mau.='  <input
                    type="radio"
                    class="btn-check"
                    name="Color"
                    id="color-'.$row2['mau_sac'].'"
                    autocomplete="off"
                    value="'.$row2['mau_sac'].'"
                    required
                  />
                  <label class="btn btn-outline-warning rounded-pill px-4 py-2 fw-semibold shadow-sm me-2 mb-1 text-dark border-2" for="color-'.$row2['mau_sac'].'"
                    >'.$row2['mau_sac'].'</label>';
    }
    return $mau;
}
function table_Buy(){
    global $con,$masp;
    $result=mysqli_query($con,"SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_giam FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);
    if($row['trang_thai_san_pham']==1){
    echo '<table class="table table-bordered align-middle shadow mt-3">
                    <thead class="table-info">
                      <tr>
                        <th class="text-center" style="width:180px;">Sản phẩm</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center" style="width:160px;">Giá tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">
                          <img
                            src="../img/'.$row['ten_san_pham'].'.jpg"
                            class="img-thumbnail shadow"
                            style="width: 180px; height: 100px; object-fit:cover;"
                          />
                        </td>
                        <td>
                          <div class="fw-bold mb-2 fs-5">'.$row['ten_san_pham'].'</div>
                        </td>
                        <td class="text-center position-relative fs-5 fw-semibold">
                          '.number_format( $row['gia_giam'],0,"",".").'<small class="text-muted ms-1" style="font-size: 90%; position: absolute; top: 5px;">đ</small>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6" style="border: none;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-end fw-semibold">Thành Tiền</td>
                        <td class="text-center position-relative fs-5 text-info">
                          '.number_format( $row['gia_giam'],0,"",".").'<small class="text-muted ms-1" style="font-size: 90%; position: absolute; top: 5px;">đ</small>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-end fw-semibold">Phí vận chuyển</td>
                        <td class="text-center position-relative fs-6 text-secondary">
                          10.000<small class="text-muted ms-1" style="font-size: 90%; position: absolute; top: 5px;">đ</small>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-end">
                          <strong class="fs-5 text-primary">Tổng thành Tiền</strong>
                        </td>
                        <td class="text-center position-relative fs-4 fw-bold text-danger">
                          '.number_format( $row['gia_giam']+10000,0,"",".").'<small class="text-muted ms-1" style="font-size:90%; position: absolute; top: 5px;">đ</small>
                        </td>
                      </tr>
                    </tbody>
                  </table>';
    }else{
      echo '<div class="d-flex justify-content-center align-items-center" style="height:120px;">
              <span class="badge bg-danger fs-5 px-4 py-3 text-center">Sản phẩm đã hết hàng</span>
            </div>';
    }
}

function from_Buy(){
    global $masp,$con;
    $result=mysqli_query($con,"SELECT * FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);
    if($row['trang_thai_san_pham']==1){
    echo '<form action="buy.php" method="post" class="p-4 bg-white shadow rounded-3 mt-3">
              <div class="mb-3">
                <label for="inputName" class="form-label fw-semibold fs-6"
                  >Tên người nhận</label>
                <input
                  type="text"
                  class="form-control shadow-sm"
                  id="inputName"
                  aria-describedby="emailHelp"
                  name="username"
                  required
                  placeholder="Nhập tên người nhận"
                />
              </div>
              <div class="mb-3">
                <label for="inputPhone" class="form-label fw-semibold fs-6"
                  >Số điện thoại</label>
                <input
                  type="text"
                  class="form-control shadow-sm"
                  id="inputPhone"
                  name="numberPhone"
                  required
                  minlength="10"
                  placeholder="Nhập số điện thoại"
                />
              </div>
              <div class="mb-3">
                <label for="inputAddress" class="form-label fw-semibold fs-6"
                  >Địa chỉ</label>
                <input type="text" name="adress" class="form-control shadow-sm" id="inputAddress" required placeholder="Nhập địa chỉ giao hàng" />
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold fs-6"
                  >Size</label>
                <div class="d-flex flex-wrap gap-1">
                    '.render_Size().'
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold fs-6"
                  >Màu sắc</label>
                
                <div class="d-flex flex-wrap gap-1">
                '.render_Mau().'
                 </div>
              </div>
              <div class="mb-3">
               <label for="payment-method" class="form-label fw-semibold fs-6"
                  >Phương thức thanh toán</label>
                <select class="form-select shadow-sm" id="payment-method" name="payment-method" required>
                  <option value="tiền mặt">Thanh toán khi nhận hàng</option>
                </select>
              </div>
              <div class="text-end">
                  <button
                    type="submit"
                    class="btn btn-success btn-lg fw-bold px-5 mt-2"
                    value="'.$masp.'"
                    name="Buy"
                  >
                    Đặt hàng
                  </button>
              </div>
            </form>
';
    }
}
?>
