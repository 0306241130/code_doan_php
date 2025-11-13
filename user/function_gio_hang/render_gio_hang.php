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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                    ';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
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
                                            <p class="m-0">Size : '.$row['kich_co'].'</p>
                                            <p class="m-0">màu : '.$row['mau_sac'].'</p>
                                        </td>
                                        <td>
                                            <article>
                                                <p>'.$row['so_luong'].  '</p>
                                                <a href="sua_gio_hang.php?masp='.$row['ma_san_pham'].'" rel="tooltip" class="btn btn-default">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="../function_gio_hang/delete_gio_hang.php?masp='.$row['ma_san_pham'].'" class="btn btn-primary">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </article>
                                        </td>
                                        <td style="position: relative">
                                            '.number_format($row['gia'],0,"",".").'
                                            <small style="position: absolute; top: 0">đ</small>
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
                                    <span class="text-danger" id="tong-thanh-tien">
                                    '.number_format($row1['tong'],0,"",".") .'₫
                                    </span>
                                </h4>
                            </div>
                            <a href="buy.php" class="btn btn-primary pull-right">
                                Đặt hàng
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    ';
                }else {
                    echo '<h1 class="text-danger">Không có sản phẩm</h1>';
                }
    } 
}
?>