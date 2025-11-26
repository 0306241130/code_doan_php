<!DOCTYPE html>
<?php require_once(__DIR__. "/../function_kho_san_pham/khosp.php") ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card mt-4" style="min-width:400px;">
    <div class="card-header">
      <h5>Cập nhật kho sản phẩm</h5>
    </div>
    <div class="card-body">
      <form method="post" action="khosanpham.php">
        <div class="mb-3">
          <div class="mb-3">
            <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
            <input 
              type="text" 
              class="form-control" 
              id="ma_san_pham" 
              name="ma_san_pham" 
              value="<?php echo isset($masp) ? $masp : ""; ?>"
              readonly
            >
          </div>
          <div class="mb-3">
            <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
            <input 
              type="text" 
              class="form-control" 
              id="ten_san_pham" 
              name="ten_san_pham" 
              required
              placeholder="Nhập tên sản phẩm"
              value="<?php echo isset($tensp) ? $tensp : ''; ?>"
            >
          </div>
          <div class="mb-3">
            <label for="mau_san_pham" class="form-label">Màu sản phẩm</label>
            <input 
              type="text" 
              class="form-control" 
              id="mau_san_pham" 
              name="mau_san_pham" 
              required
              placeholder="Nhập màu sản phẩm"
              value="<?php echo isset($mauSac) ? $mauSac : ''; ?>"
            >
          </div>
          <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input 
              type="text" 
              class="form-control" 
              id="size" 
              name="size" 
              required
              placeholder="Nhập size sản phẩm"
              value="<?php echo isset($size) ? $size : ''; ?>"
            >
          </div>
          <div class="mb-3">
            <label for="so_luong" class="form-label">Số lượng</label>
            <input 
              type="number" 
              class="form-control" 
              id="so_luong" 
              name="so_luong" 
              min="0"
              required
              placeholder="Nhập số lượng"
              value="<?php echo isset($soLuong) ? $soLuong : ''; ?>"
            >
          </div>
        <button type="submit" name="updateKho" class="btn btn-primary w-100">Lưu</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>