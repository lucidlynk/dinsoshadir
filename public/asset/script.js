$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id").val($(this).data("id"));
  $(".modal-body #noka").val($(this).data("noka"));
  $(".modal-body #kk").val($(this).data("kk"));
  $(".modal-body #nik").val($(this).data("nik"));
  $(".modal-body #nama").val($(this).data("nama"));
  $(".modal-body #pisat").val($(this).data("pisat"));
  $(".modal-body #tmp_lahir").val($(this).data("tmp_lahir"));
  $(".modal-body #tgl_lahir").val($(this).data("tgl_lahir"));
  $(".modal-body #jk").val($(this).data("jk"));
  $(".modal-body #stts").val($(this).data("stts"));
  $(".modal-body #alamat").val($(this).data("alamat"));
  $(".modal-body #kd_pos").val($(this).data("kd_pos"));
  $(".modal-body #kecamatan").val($(this).data("kecamatan"));
  $(".modal-body #desa").val($(this).data("desa"));
});

$(document).on("click", "#btn-ppks", function () {
  $(".modal-body #id").val($(this).data("id"));
  $(".modal-body #noka").val($(this).data("noka"));
  $(".modal-body #kk").val($(this).data("kk"));
  $(".modal-body #nik").val($(this).data("nik"));
  $(".modal-body #nama").val($(this).data("nama"));
  $(".modal-body #pisat").val($(this).data("pisat"));
  $(".modal-body #tmp_lahir").val($(this).data("tmp_lahir"));
  $(".modal-body #tgl_lahir").val($(this).data("tgl_lahir"));
  $(".modal-body #jk").val($(this).data("jk"));
  $(".modal-body #stts").val($(this).data("stts"));
  $(".modal-body #alamat").val($(this).data("alamat"));
  $(".modal-body #kd_pos").val($(this).data("kd_pos"));
  $(".modal-body #kecamatan").val($(this).data("kecamatan"));
  $(".modal-body #desa").val($(this).data("desa"));
  $(".modal-body #pmks").val($(this).data("pmks"));
});

const flashData = $(".flash-data").data("flashdata");
if (flashData) {
  Swal.fire({
    tittle: "Data Usulan KIS",
    text: flashData,
    icon: "success",
  });
}

//tombol hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data usulan akan di hapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus Data!",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

$(document).on("click", "#btn-sub", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data usulan akan di hapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus Data",
  }).then((result) => {
    if (result.isConfirmed) {
      $("#myForm").submit();
    }
  });
});

//create function active menu sidebar in class nav-item active
$(document).ready(function () {
  var url = window.location;
  $("ul li.nav-item a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .addClass("active");
  $("ul li.nav-item #collapseTwo a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .addClass("active");
  $("ul li.nav-item #collapseTwo a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .parent()
    .addClass("active");
  $("ul li.nav-item #collapseTwo a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .addClass("show");
  $("ul li.nav-item #collapseUtilities a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .addClass("active");
  $("ul li.nav-item #collapseUtilities a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .parent()
    .addClass("active");

  $("ul li.nav-item #collapseUtilities a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .addClass("show");
  $("ul li.nav-item #collapseUtilities3 a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .addClass("active");
  $("ul li.nav-item #collapseUtilities3 a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .parent()
    .addClass("active");

  $("ul li.nav-item #collapseUtilities3 a")
    .filter(function () {
      // alert(this.href);
      return this.href == url;
    })
    .parent()
    .parent()
    .addClass("show");
}); // end function active menu sidebar in class nav-item active

//create chart bar from database
$(document).ready(function () {
  $.ajax({
    url: "chart_bar",
    method: "GET",
    success: function (data) {
      var nama = [];
      var jumlah = [];

      for (var i in data) {
        nama.push(data[i].nama);
        jumlah.push(data[i].jumlah);
      }

      var chartdata = {
        labels: nama,
        datasets: [
          {
            label: "Jumlah Usulan KIS",
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: "rgba(255, 99, 132, 1)",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(255, 99, 132, 0.4)",
            hoverBorderColor: "rgba(255, 99, 132, 1)",
            data: jumlah,
          },
        ],
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: "bar",
        data: chartdata,
      });
    },
  });
}); // end function create chart bar from database

const judul = document.getElementById("dataTable");
judul.style.fontSize = "15px";
// judul.style.color = "red";
