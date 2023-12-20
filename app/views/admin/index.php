<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row justify-content-between mb-4">
    <form action="<?= BASEURL; ?>/admin/index" method="post">
            <div class="col-9 d-flex gap-2 ">
                <div class="col-6">
                    <div class="input-group input-group-merge">
                        <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Cari Berita..."
                            aria-label="Search" />
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit" id="tombolCari"> Cari</button>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-icon btn-primary">
                        <i class='bx bx-refresh'></i>
                    </button>
                </div>
            </div>
        </form>
  </div>


  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr class="">
              <th>Waktu Publis</th>
              <th class="text-start">Judul</th>
              <th class="text-center">Jumlah Pengunjung</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-4">
          <?php foreach ($data['total_pengunjung'] as $berita) :?>
            <tr class="text-center align-baseline gap-5">
                <!-- Waktu Publis -->
                <td class="text-start">
                  <?= $berita['waktu_penulisan']?>
                </td>
                <!-- Judul -->
                <td class="text-start">
                  <?= $berita['judul_berita']?>
                </td>
                <td>       
                  <?= $berita['total_pengunjung']?>
                </td>
              </tr>
              <?php endforeach?>
        </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="formModalBerita" tabindex="-1" aria-labelledby="judulModalBerita" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalBerita">Tambah Berita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/berita/tambah" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="foto_berita" class="form-label">Gambar</label>
                      <input type="file" class="form-control" id="foto_berita" name= "foto_berita">
                      <input type="hidden" class="form-control" id="e_foto_berita" name= "e_foto_berita">
                  </div>
                  <div class="mb-3">
                      <label for="judul_berita" class="form-label">Judul Berita</label>
                      <input type="judul_berita" class="form-control" id="judul_berita" name="judul_berita">
                  </div>
                  <div class="mb-3">
                      <label for="penulis_berita" class="form-label">Penulis Berita</label>
                      <input type="penulis_berita" class="form-control" id="penulis_berita" name="penulis_berita" >
                  </div>
                  <textarea id="teks" name="isi_berita">Isi Berita Anda</textarea>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>