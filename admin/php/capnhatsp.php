<!DOCTYPE html>
<?php require_once(__DIR__. "/../function_san_pham/cap_nhat_san_pham.php") ?>
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
      <h5>Cập nhật sản phẩm</h5>
    </div>
    <div class="card-body">
      <form action="../function_san_pham/cap_nhat_san_pham.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="ma_san_pham_cap_nhat" class="form-label">Mã sản phẩm cần cập nhật</label>
          <input 
            type="number" 
            class="form-control" 
            id="ma_san_pham_cap_nhat" 
            name="ma_san_pham" 
            required 
            min="1" 
            placeholder="Nhập mã sản phẩm"
            value="<?php echo isset($masp) ? $masp : ''; ?>"
            readonly
          >
        </div>
        <div class="mb-3">
          <label for="ten_san_pham_cap_nhat" class="form-label">Tên sản phẩm</label>
          <input 
            type="text" 
            class="form-control" 
            id="ten_san_pham_cap_nhat" 
            name="ten_san_pham" 
            required
            value="<?php echo isset($tenSanPham) ? $tenSanPham : ''; ?>"
          >
        </div>
        <div class="mb-3">
          <label for="mo_ta_cap_nhat" class="form-label">Mô tả sản phẩm</label>
          <input 
            class="form-control" 
            id="mo_ta_cap_nhat" 
            name="mo_ta" 
            required
            value="<?php echo isset($moTa) ? $moTa : ''; ?>"
          >
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="ma_thuong_hieu_cap_nhat" class="form-label">Mã thương hiệu</label>
            <input 
              type="number" 
              max="2" 
              min="1" 
              class="form-control" 
              id="ma_thuong_hieu_cap_nhat" 
              name="ma_thuong_hieu" 
              required
              value="<?php echo isset($maThuongHieu) ? $maThuongHieu : ''; ?>"
            >
          </div>
          <div class="col-md-4">
            <label for="gia_ban_cap_nhat" class="form-label">Giá bán</label>
            <input 
              type="number" 
              class="form-control" 
              id="gia_ban_cap_nhat" 
              name="gia_ban" 
              min="0" 
              required
              value="<?php echo isset($giaBan) ? $giaBan : ''; ?>"
            >
          </div>
          <div class="col-md-4">
            <label for="giam_gia_cap_nhat" class="form-label">Giảm giá (%)</label>
            <input 
              type="number" 
              class="form-control" 
              id="giam_gia_cap_nhat" 
              name="giam_gia" 
              min="0" 
              max="100" 
              value="<?php echo isset($giamGia) ? $giamGia : '0'; ?>" 
              required
            >
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="mau_san_pham_cap_nhat" class="form-label">Màu sản phẩm (cách nhau bởi dấu phẩy)</label>
            <input 
              type="text" 
              class="form-control" 
              id="mau_san_pham_cap_nhat" 
              name="mau_san_pham" 
              placeholder="Ví dụ: đỏ,xanh,đen"
              required
              value="<?php echo isset($mau) ? $mau : ''; ?>"
            >
          </div>
          <div class="col-md-6">
            <label for="size_cap_nhat" class="form-label">Size (cách nhau bởi dấu phẩy)</label>
            <input 
              type="text" 
              class="form-control" 
              id="size_cap_nhat" 
              name="size" 
              placeholder="Ví dụ: 39,40,41,42" 
              required
              value="<?php echo isset($size) ? $size : ''; ?>"
            >
          </div>
        </div>
        <div class="mb-3">
          <label for="hinh_anh_cap_nhat" class="form-label">Hình ảnh sản phẩm (tên file phải giống tên sản phẩm và đuôi là jpg, để trống nếu không muốn thay đổi)</label>
          <input type="file" class="form-control" id="hinh_anh_cap_nhat" name="hinh_anh" accept=".jpg">
        </div>
        <button type="submit" class="btn btn-warning">Cập nhật sản phẩm</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>