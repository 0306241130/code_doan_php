<?php 
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['masp']))$masp=isset($_REQUEST['masp']);
function render_Size($con,$Size){
    global $masp;
    $result1=mysqli_query($con,"SELECT * FROM size_san_pham WHERE ma_san_pham=".$masp."");
    $size="";
    while($row1=mysqli_fetch_assoc($result1)){
        // Cải thiện class cho đẹp hơn với Bootstrap và bố cục flex
        $size.='<div class="form-check form-check-inline p-0 m-0">
                    <input
                        type="radio"
                        class="btn-check"
                        name="Size"
                        id="size-'.$row1['size'].'"
                        autocomplete="off"
                        value="'.$row1['size'].'"
                        required
                        '.(($row1['size'] == $Size) ? 'checked' : '').'
                    />
                    <label class="btn btn-outline-primary btn-sm mx-1" for="size-'.$row1['size'].'"
                        style="min-width:48px;font-weight:500;"
                    >'.$row1['size'].'</label>
                </div>';
    }
    return $size;
}
function render_Mau($con,$Color){
    global $masp;
    $result2=mysqli_query($con,"SELECT * FROM mau_san_pham WHERE ma_san_pham=".$masp."");
    $mau="";
    while($row2=mysqli_fetch_assoc($result2)){
        $mau.='<div class="form-check form-check-inline p-0 m-0">
                    <input
                        type="radio"
                        class="btn-check"
                        name="Color"
                        id="color-'.$row2['mau_sac'].'"
                        autocomplete="off"
                        value="'.$row2['mau_sac'].'"
                        required
                        '.(($row2['mau_sac'] == $Color) ? 'checked' : '').'
                    />
                    <label class="btn btn-outline-warning btn-sm mx-1 text-capitalize" for="color-'.$row2['mau_sac'].'"
                        style="min-width:70px;font-weight:500;"
                    >'.$row2['mau_sac'].'</label>
              </div>';
    }
    return $mau;
}

function sua_gio_hang(){
    global $masp;
    $con=connect();
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_san_pham=".$masp." AND ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row=mysqli_fetch_assoc($result);
    echo ' <form action="../function_gio_hang/update_gio_hang.php" method="POST" class="p-4 bg-light rounded shadow">
              <div class="mb-4">
                <label class="form-label fw-bold text-secondary">Size</label>
                <div class="d-flex flex-wrap gap-2">
                  '.render_Size($con,$row['kich_co']).'
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label fw-bold text-secondary">Color</label>
                <div class="d-flex flex-wrap gap-2">
                    '.render_Mau($con,$row['mau_sac']).'
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label fw-bold text-secondary">Số lượng</label>
                <input
                  type="number"
                  class="form-control w-50 border-info"
                  name="quantity"
                  required
                  min="1"
                  value="'.$row['so_luong'].'"
                />
              </div>
              <div class="d-flex justify-content-end">
                <button
                  type="submit"
                  class="btn btn-success px-4 fw-bold"
                  name="edit_card"
                  value="'.$masp.'"
                >
                  Xác nhận
                </button>
              </div>
            </form>';
}
function sua_gio_hang1 (){
    global $masp;
    $masp=$_REQUEST['masp'];
    $con=connect();
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_san_pham=".$masp." AND ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row3=mysqli_fetch_assoc($result);
    echo '<table class="table table-bordered table-hover align-middle shadow rounded bg-white">
            <thead class="table-info text-center">
                <tr>
                    <th style="width: 200px;">Sản phẩm</th>
                    <th style="width: 270px;">Tên sản phẩm</th>
                    <th style="width: 150px;">Giá tiền</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>
                        <img
                            src="../img/'.$row3['ten_san_pham'].'.jpg"
                            class="img-fluid rounded shadow border border-2"
                            style="width: 200px; height: 120px; object-fit:cover;"
                        />
                    </td>
                    <td class="align-middle">
                        <strong class="text-primary fs-5">'.$row3['ten_san_pham'].'</strong>
                    </td>
                    <td class="align-middle" style="position: relative">
                        <span class="fw-bold text-danger fs-5">'
                            .number_format($row3['gia'],0,"",".").'
                            <small style="font-size:15px;position: relative; top: -3px"
                                >đ</small
                            >
                        </span>
                    </td>
                </tr>
            </tbody>
          </table>';
}

?>
