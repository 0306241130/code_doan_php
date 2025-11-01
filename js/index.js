$(document).ready(function () {
  $(".add-to-card").on("click", function (e) {
    e.preventDefault();
    $(".card-shoes").toggle();
    // let masp = $(this).data("masp");
    // $.ajax({
    //   url: "card-gio-hang.php",
    //   type: "POST",
    //   data: { masp: masp },
    //   success: function (response) {
    //     console.log("Server trả về:", response);
    //     $("body").append(response);
    //   },
    //   error: function (xhr, status, error) {
    //     console.log("Lỗi AJAX!", error);
    //   },
    // });
  });
});

$(document).ready(() => {
  $(".out-card").on("click", function (e) {
    $(".card-shoes").toggle();
  });

  $(".add-card").on("click", function (e) {
    e.preventDefault();
    // $(".card-shoes").toggle();
    // let masp = $(this).val();
    // $.ajax({
    //   url: "card-gio-hang.php",
    //   type: "POST",
    //   data: { masp: masp },
    //   success: function (response) {
    //     console.log("Server trả về:", response);
    //     $("body").append(response);
    //   },
    //   error: function (xhr, status, error) {
    //     console.log("Lỗi AJAX!", error);
    //   },
    // });
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
