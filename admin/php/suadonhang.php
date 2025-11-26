<!DOCTYPE html>
<?php  require_once(__DIR__. "/../fucntion_chitiet/lay_du_lieu_sua_chi_tiet.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <form class="p-4 border rounded shadow-sm bg-white" method="post" action="../fucntion_chitiet/sua_chi_tiet.php">
            <div class="mb-3">
                <label for="ngay" class="form-label">Ngày</label>
                <input type="date" class="form-control" id="ngay" name="ngay" value="<?php echo isset($ngay_dat_hang) ? $ngay_dat_hang : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="phi_van_chuyen" class="form-label">Phí vận chuyển</label>
                <input type="number" class="form-control" id="phi_van_chuyen" name="phi_van_chuyen" placeholder="Nhập phí vận chuyển" value="<?php echo isset($phi_van_chuyen) ? $phi_van_chuyen : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng" value="<?php echo isset($so_luong) ? $so_luong : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="Nhập tên sản phẩm" value="<?php echo isset($tensp) ? $tensp : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="trang_thai_thanh_toan" class="form-label">Trạng thái thanh toán</label>
                <select class="form-select" id="trang_thai_thanh_toan" name="trang_thai_thanh_toan">
                    <option value="">-- Chọn trạng thái --</option>
                    <option value="Chưa thanh toán" <?php echo (isset($trang_thai_thanh_toan) && (strtolower($trang_thai_thanh_toan) == 'chưa thanh toán')) ? 'selected' : ''; ?>>Chưa thanh toán</option>
                    <option value="Đã thanh toán" <?php echo (isset($trang_thai_thanh_toan) && (strtolower($trang_thai_thanh_toan) == 'đã thanh toán')) ? 'selected' : ''; ?>>Đã thanh toán</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dia_chi_giao_hang" class="form-label">Địa chỉ giao hàng</label>
                <input type="text" class="form-control" id="dia_chi_giao_hang" name="dia_chi_giao_hang" placeholder="Nhập địa chỉ giao hàng" value="<?php echo isset($dia_chi_giao_hang) ? $dia_chi_giao_hang : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="thanh_tien" class="form-label">Thành tiền</label>
                <input type="number" class="form-control" id="thanh_tien" name="thanh_tien" placeholder="Nhập thành tiền" value="<?php echo isset($gia) ? $gia : ''; ?>">
            </div>
            <input type="hidden" name="ma_chi_tiet" value="<?php echo isset($_REQUEST['mact']) ? $_REQUEST['mact'] : ''; ?>">
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="number" class="form-control" id="size" name="size" placeholder="Nhập size" value="<?php echo isset($kich_co) ? $kich_co : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="update">Lưu</button>
        </form>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>