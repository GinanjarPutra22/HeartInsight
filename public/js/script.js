$(function () {
  //admin data_Kelas tambah Berita
  $(".ModalTambahBerita").on("click", function () {
    $("#judulModalBerita").html("Tambah Data Berita");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#judul_berita").val("");
    $("#penulis_berita").val("");
    $("#e_foto_berita").val("");
    $("#id_berita").val("");
  });

  //ubah data Berita
  $(".ModalUbahBerita").on("click", function () {
    $("#judulModalBerita").html("Ubah Data Berita");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/HeartInsight/Berita/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/HeartInsight/Berita/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_berita").val(data.id_berita);
        $("#e_foto_berita").val(data.e_foto_berita);
        $("#judul_berita").val(data.judul_berita);
        $("#penulis_berita").val(data.penulis_berita);
      },
    });
  });
});
