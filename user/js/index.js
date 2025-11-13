$(document).ready(function () {
  $(".add-to-card").on("click", function (e) {
    e.preventDefault();
    $(".card-shoes").remove();
    let masp = $(this).data("masp");
    $.ajax({
      url: "../function_index/card-gio-hang.php",
      type: "POST",
      data: { masp: masp },
      success: function (response) {
        $("body").append(response);
      },
      error: function (xhr, status, error) {
        console.log("Lỗi AJAX!", error);
      },
    });
  });
});

$(document).ready(() => {
  $(document).on("click", ".out-card", function () {
    $(".card-shoes").remove();
  });

  // Sử dụng biến toàn cục hoặc cập nhật trực tiếp khi submit
  $(document).on("click", ".add-card", function (e) {
    // Luôn luôn ngăn submit mặc định để tránh gửi GET
    // Chỉ ngăn submit mặc định nếu đã đăng nhập
    if ($("#user").length > 0) {
      e.preventDefault();
      // Lấy size, color đúng từ radio đang chọn
      const size = $("input.check-size:checked").val();
      const color = $("input.check-color:checked").val();
      const soLuong = $("#quantity").val();
      const masp = $(this).val();

      if (!size || !color || !soLuong || !masp) {
        alert("Vui lòng chọn size, màu sắc và số lượng hợp lệ.");
        return;
      }

      // Gửi AJAX POST
      $.ajax({
        url: "../function_gio_hang/add_gio_hang.php",
        type: "POST",
        data: { size: size, color: color, soLuong: soLuong, masp: masp },
        success: function (response) {
          $(".card-shoes").remove();
        },
        error: function (xhr, status, error) {
          alert("Lỗi AJAX: " + error);
        },
      });
    }
  });
});

$(document).ready(() => {
  $(".cho-giao-hang ,.da-giao, .tra-hang ,.da-huy,.cho-lay-hang").hide();
  $(".nav-item .btn").on("click", function () {
    $(".nav-item .btn").removeClass("btn-info").addClass("btn-secondary");
    $(this).addClass("btn-info");
    if ($(this).val() == "cho-xac-nhan") {
      $(".cho-xac-nhan").show();
      $(".cho-giao-hang ,.da-giao, .tra-hang ,.da-huy,.cho-lay-hang").hide();
    } else if ($(this).val() == "cho-lay-hang") {
      $(".cho-lay-hang").show();
      $(".cho-giao-hang ,.da-giao, .tra-hang ,.da-huy,.cho-xac-nhan").hide();
    } else if ($(this).val() == "cho-giao-hang") {
      $(".cho-giao-hang").show();
      $(".cho-lay-hang ,.da-giao, .tra-hang ,.da-huy,.cho-xac-nhan").hide();
    } else if ($(this).val() == "da-giao") {
      $(".da-giao").show();
      $(
        ".cho-lay-hang ,.cho-giao-hang, .tra-hang ,.da-huy,.cho-xac-nhan"
      ).hide();
    } else if ($(this).val() == "tra-hang") {
      $(".tra-hang").show();
      $(
        ".cho-lay-hang ,.cho-giao-hang, .da-giao ,.da-huy,.cho-xac-nhan"
      ).hide();
    } else if ($(this).val() == "da-huy") {
      $(".da-huy").show();
      $(
        ".cho-lay-hang ,.cho-giao-hang, .da-giao ,.tra-hang,.cho-xac-nhan"
      ).hide();
    }
  });
});
