<?php 
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['masp']))$masp=isset($_REQUEST['masp']);
function render_Size($con,$Size){
    global $masp;
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
                  '.(($row1['size'] == $Size) ? 'checked' : '').'
                  />
                  <label class="btn btn-outline-success" for="size-'.$row1['size'].'"
                    >size '.$row1['size'].'</label
                  >';
    }
    return $size;
}
function render_Mau($con,$Color){
    global $masp;
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
                    '.(($row2['mau_sac'] == $Color) ? 'checked' : '').'
                  />
                  <label class="btn btn-outline-success" for="color-'.$row2['mau_sac'].'"
                    >'.$row2['mau_sac'].'</label
                  >';
    }
    return $mau;
}

function sua_gio_hang(){
    global $masp;
    $con=connect();
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_san_pham=".$masp." AND ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row=mysqli_fetch_assoc($result);
    echo ' <form action="../function_gio_hang/update_gio_hang.php" method="POST">
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Size</label
                >
                <div class="d-flex gap-2">
                  '.render_Size($con,$row['kich_co']).'
              </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Color</label
                >
                <div class="d-flex gap-2">
                    '.render_Mau($con,$row['mau_sac']).'
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
                  value="'.$row['so_luong'].'"
                />
              </div>
              <button
                type="submit"
                class="btn btn-success pull-right fw-bold mt-2"
                name="edit_card"
                value='.$masp.'
              >
                Xác nhận
              </button>
            </form>';
}
function sua_gio_hang1 (){
    global $masp;
    $masp=$_REQUEST['masp'];
    $con=connect();
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_san_pham=".$masp." AND ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row3=mysqli_fetch_assoc($result);
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
                            src="../img/'.$row3['ten_san_pham'].'.jpg"
                            class="img-cart"
                            style="width: 400px; height: 200px"
                          />
                        </td>
                        <td>
                          <strong>'.$row3['ten_san_pham'].'</strong>
                        </td>
                        <td style="position: relative">
                        '.number_format($row3['gia'],0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>';
}

?>