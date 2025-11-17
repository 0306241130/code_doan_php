<?php

                function khachHang() {
                    // Kết nối database
                    require_once(__DIR__ . "/../../difen_connect_php/connect.php");
                    $con = connect();

                    // Lấy thông tin khách hàng và số đơn hàng
                    $sql = "SELECT 
                              nd.ma_nguoi_dung, 
                              nd.email, 
                              nd.ho_ten, 
                              nd.ngay_dang_ky,
                              (SELECT COUNT(*) FROM don_hang dh WHERE dh.ma_nguoi_dung = nd.ma_nguoi_dung) as so_don_hang
                            FROM nguoi_dung nd";

                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>
                              <td>{$row['ma_nguoi_dung']}</td>
                              <td>{$row['email']}</td>
                              <td>{$row['ho_ten']}</td>
                              <td>{$row['ngay_dang_ky']}</td>
                              <td>{$row['so_don_hang']}</td>
                              <td>
                                <a href='chi-tiet-don-hang.php?makh={$row['ma_nguoi_dung']}' class='btn btn-info btn-sm'>Xem chi tiết</a>
                              </td>
                            </tr>";
                    }
                }
                ?>