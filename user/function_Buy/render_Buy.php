<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['masp']))$masp=$_REQUEST['masp'];
function render_Size(){
    global $con,$masp;
    $result1=mysqli_query($con,"SELECT * FROM size_san_pham WHERE ma_san_pham=".$masp."");
    $size="";
    while($row1=mysqli_fetch_assoc($result1)){
        $size.='<input
                    type="radio"
                    class="btn-check"
                    name="Size"
                    id="size-'.$row1['size'].'"
                    autocomplete="off"
                    value="'.$row1['size'].'"
                    required
                  />
                  <label class="btn btn-outline-success" for="size-'.$row1['size'].'"
                    >size '.$row1['size'].'</label
                  >';
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
                  <label class="btn btn-outline-success" for="color-'.$row2['mau_sac'].'"
                    >'.$row2['mau_sac'].'</label
                  >';
    }
    return $mau;
}
function table_Buy(){
    global $con,$masp;
    $result=mysqli_query($con,"SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_giam FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);
    echo '<table class="table">
                    <thead>
                      <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img
                            src="../img/'.$row['ten_san_pham'].'.jpg"
                            class="img-cart"
                            style="width: 400px; height: 200px"
                          />
                        </td>
                        <td>
                          <strong>'.$row['ten_san_pham'].'</strong>
                        </td>
                        <td style="position: relative">
                          '.number_format( $row['gia_giam'],0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">Thành Tiền</td>
                        <td style="position: relative">
                          '.number_format( $row['gia_giam'],0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">Phí vận chuyển</td>
                        <td style="position: relative">
                          10.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">
                          <strong>Tổng thành Tiền</strong>
                        </td>
                        <td style="position: relative">
                          '.number_format( $row['gia_giam']+10000,0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>';
}

function from_Buy(){
    global $masp;
    echo '<form action="../function_Buy/dat_hang.php" method="post">;
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Tên người nhận</label
                >
                <input
                  type="text"
                  class="form-control"
                  aria-describedby="emailHelp"
                  name="username"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Số điện thoại</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="numberPhone"
                  required
                  minlength="10"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Địa chỉ</label
                >
                <input type="text" name="adress" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Size</label
                >
                <div class="d-flex gap-2">
                    '.render_Size().'
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Color</label
                >
                
                <div class="d-flex gap-2">
                '.render_Mau().'
                 </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Số lượng</label
                >
                <input
                  type="number"
                  class="form-control"
                  name="quantity"
                  required
                  min="1"
                  value="1"
                />
              </div>
              <div class="mb-3">
               <label for="payment-method" class="form-label"
                  >Phương thức thanh toán</label
                >
                <select class="form-select" id="payment-method" name="payment-method" required>
                  <option value="tiền mặt">Thanh toán khi nhận hàng</option>
                </select>
              </div>
              <button
                type="submit"
                class="btn btn-success pull-right fw-bold mt-2"
                value="'.$masp.'"
                name="Buy"
              >
                Đặt hàng
              </button>
            </form>
';
}
?>
