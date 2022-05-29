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
