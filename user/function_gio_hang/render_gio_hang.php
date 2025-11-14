<?php 
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con =connect();
function render_Gio_Hang(){
    global $con;
    if ($con) {
        $sql = "SELECT * FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."";
        $result = mysqli_query($con, $sql);
        $result1=mysqli_query($con,"SELECT SUM(gia) AS tong FROM gio_hang  WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
        $row1=mysqli_fetch_assoc($result1);
        if (mysqli_num_rows($result) > 0) {
                    echo '
                        <div class="table-responsive">
                            <table class="table table-hover align-middle table-bordered shadow-sm">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center" style="width:170px;">Sản phẩm</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th class="text-center" style="width:120px;">Số lượng</th>
                                        <th class="text-center" style="width:160px;">Giá tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                    <tr>
                                        <td class="text-center">
                                            <img
                                                src="../img/'.$row['ten_san_pham'].'.jpg"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-width: 140px; height: 80px; object-fit:cover;"
                                                alt="'.$row['ten_san_pham'].'"
                                            />
                                        </td>
                                        <td>
                                            <div class="fw-semibold mb-1">'.$row['ten_san_pham'].'</div>
                                            <div class="text-muted small">Size: '.$row['kich_co'].'</div>
                                            <div class="text-muted small">Màu: '.$row['mau_sac'].'</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex flex-column align-items-center gap-2">
                                                <span class="badge bg-success fs-6 px-3 py-2">'.$row['so_luong'].'</span>
                                                <div class="btn-group" role="group">
                                                    <a href="sua_gio_hang.php?masp='.$row['ma_san_pham'].'" rel="tooltip" class="btn btn-outline-info btn-sm" title="Sửa">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="../function_gio_hang/delete_gio_hang.php?masp='.$row['ma_san_pham'].'" class="btn btn-outline-danger btn-sm" title="Xóa">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center position-relative fw-bold fs-5">
                                            '.number_format($row['gia'],0,"",".").'
                                            <small class="text-muted ms-1" style="font-size:80%;">đ</small>
                                        </td>
                                    </tr>
                                        ';
                    }
                    echo '
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                <h4>
                                    Tổng thành tiền: 
                                    <span class="text-danger fw-bold" id="tong-thanh-tien">
                                    '.number_format($row1['tong'],0,"",".") .'₫
                                    </span>
                                </h4>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <a href="buyGioHang.php" class="btn btn-lg btn-primary">
                                    Đặt hàng
                                    <i class="fa fa-chevron-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    ';
                }else {
                    echo '<h1 class="text-danger text-center mt-5">Không có sản phẩm</h1>';
                }
    } 
}
?>