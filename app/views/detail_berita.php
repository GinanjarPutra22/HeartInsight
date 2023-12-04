    <div class="container my-4">
        <div class="row">
            <!-- Kolom utama untuk berita (col-8) -->
            <div class="col-md-8">
                <div class="news-item mb-4">
                    <img src="<?= BASEURL?>/public/img/berita/<?=$data['berita']['foto_berita'] ?>" alt="Berita 1" class="img-fluid">
                    <h2><?= $data['berita']['judul_berita']?></h2>
                    <p><?= $data['berita']['waktu_penulisan']?>,<?= $data['berita']['penulis_berita']?></p>
                    <p><?= $data['berita']['isi_berita']?></p>
                </div>

                <!-- Tambahkan berita lainnya sesuai kebutuhan -->
            </div>

            <!-- Kolom rekomendasi berita (col-4) -->
            <div class="col-md-4">
                <div class="recommended-news bg-light p-3 rounded">
                    <h2>Rekomendasi Berita</h2>
                    <?php foreach ($data['rekomendasi'] as $rkm):?>
                        <div class=" bg-white  shadow-sm p-3">
                            <a href="<?=BASEURL?>/berita/detail/<?= $rkm['id_berita']?>">
                                <img class="bi-image-fill img-fluid w-100 mb-2" src="<?= BASEURL?>/public/img/berita/<?= $rkm['foto_berita']?>" alt="">
                                <h5 class=""><?= $rkm['judul_berita']?></h5>
                                <p class="text-muted fw-bold"><?= $rkm['waktu_penulisan']?></p>
                                <?php
                                    // Batasi isi_berita hanya menampilkan 60 kata
                                    $words = str_word_count($rkm['isi_berita'], 1);
                                    $excerpt = implode(' ', array_slice($words, 3, 60));
                                ?>
                                <p class="text-muted lh-sm"><?= $excerpt ?></p>
                                <a href="<?=BASEURL?>/berita/detail/<?= $rkm['id_berita']?>">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                            </a>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
