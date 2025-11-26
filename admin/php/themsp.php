<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card mt-5 mb-4" style="min-width: 400px;">
    <div class="card-header">
      <h5>Thêm sản phẩm mới</h5>
    </div>
    <div class="card-body">
      <form action="../function_san_pham/them_san_pham.php" method="post">
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" required>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="mo_ta" class="form-label">Mô tả</label>
          <input class="form-control" id="mo_ta" name="mo_ta" required></input>
        </div>
        
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="ma_thuong_hieu" class="form-label">Mã thương hiệu</label>
            <input type="number" max="2" min="1" class="form-control" id="ma_thuong_hieu" name="ma_thuong_hieu" required>
          </div>
          <div class="col-md-4">
            <label for="gia_ban" class="form-label">Giá bán</label>
            <input type="number" class="form-control" id="gia_ban" name="gia_ban" min="0" required>
          </div>
          <div class="col-md-4">
            <label for="giam_gia" class="form-label">Giảm giá (%)</label>
            <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" value="0" required>
          </div>
        </div>
        
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="mau_san_pham" class="form-label">Màu sản phẩm (cách nhau bởi dấu phẩy)</label>
            <input type="text" class="form-control" id="mau_san_pham" name="mau_san_pham" placeholder="Ví dụ: đỏ,xanh,đen" required>
          </div>
          <div class="col-md-6">
            <label for="size" class="form-label">Size (cách nhau bởi dấu phẩy)</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="Ví dụ: 38,39,40,41" required>
          </div>
          <div class="col-md-6 mt-3">
            <label for="so_luong_san_pham" class="form-label">Số lượng sản phẩm (cách nhau bởi dấu phẩy)</label>
            <input type="text" class="form-control" id="so_luong_san_pham" name="so_luong_san_pham" placeholder="Nhập số lượng sản phẩm" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="hinh_anh" class="form-label">Hình ảnh sản phẩm (tên file phải giống tên sản phẩm và đuôi là jpg)</label>
          <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept=".jpg" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>