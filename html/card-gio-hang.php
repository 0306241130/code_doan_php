<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masp = $_POST['masp'];
    // Sửa lỗi dấu ngoặc trong chuỗi và escape dấu ngoặc kép
    echo '
    <div class="card-shoes pb-2">
      <div class="tile-and-img">
        <button class="out-card" type="submit">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <img src="../img/adidas2.jpg" alt="" />
        <article class="price-shoes px-2" style="position: relative">
          <strong style="position: relative" class="price-new">
            900.000<small style="position: absolute">đ</small>
          </strong><br />
          <strong style="position: relative" class="price-old">
            <s>1.000.000 </s>
            <small style="position: absolute"><s>đ</s></small>
            <span class="text-danger ms-3">-10%</span>
          </strong>
        </article>
      </div>
      <form action="#" method="get" class="px-2">
        <div class="d-flex gap-2">
          <input
            type="radio"
            class="btn-check"
            name="Size"
            id="size-39"
            autocomplete="off"
            value="39"
          />
          <label class="btn btn-outline-success" for="size-39">size 39</label>
          <input
            type="radio"
            class="btn-check"
            name="Size"
            id="size-40"
            autocomplete="off"
            value="40"
          />
          <label class="btn btn-outline-success" for="size-40">size 40</label>
          <input
            type="radio"
            class="btn-check"
            name="Size"
            id="size-41"
            autocomplete="off"
            value="41"
          />
          <label class="btn btn-outline-success" for="size-41">size 41</label>
        </div>
        <div class="d-flex gap-2 mt-2">
          <input
            type="radio"
            class="btn-check"
            name="color"
            id="do"
            autocomplete="off"
            value="Đỏ"
          />
          <label class="btn btn-outline-danger" for="do">Đỏ</label>
          <input
            type="radio"
            class="btn-check"
            name="color"
            id="xanh"
            autocomplete="off"
            value="Xanh"
          />
          <label class="btn btn-outline-success" for="xanh">Xanh</label>
          <input
            type="radio"
            class="btn-check"
            name="color"
            id="vang"
            autocomplete="off"
            value="Vàng"
          />
          <label class="btn btn-outline-warning" for="vang">Vàng</label>
        </div>
        <input
          type="number"
          name="quantity"
          id="quantity"
          placeholder="Số lượng"
          class="form-control mt-2"
          min="1"
          max="10"
          value="1"
        />
        <div class="d-grid gap-2">
          <button
            class="btn btn-danger mt-2 add-card"
            type="submit"
            name="gio-hang"
            value="masp01"
          >
            <i class="fa fa-shopping-cart"></i>
          </button>
        </div>
      </form>
    </div>
    ';
}
?>