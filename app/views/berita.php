<!-- Token Sale Start -->
<div class="container-xxl">
        <div class="container py-5">
            <div class="  wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Berita</h1>
                <p class="text-primary fs-5 mb-5"></p>
            </div>

            <div class="row g-4">
                <?php foreach ($data['berita'] as $berita) :?>
                    <div class="col-lg-4 col-md-6 mb-4 rounded wow fadeInUp" data-wow-delay="0.1s">
                        <div class=" bg-white  shadow-sm p-3">
                            <a href="<?=BASEURL?>/berita/detail/<?= $berita['id_berita']?>">
                                <img class="bi-image-fill img-fluid w-100 mb-2" src="<?= BASEURL?>/public/img/berita/<?= $berita['foto_berita']?>" alt="">
                                <h5 class=""><?= $berita['judul_berita']?></h5>
                                <p class="text-muted fw-bold"><?= $berita['waktu_penulisan']?></p>
                                <?php
                                    // Batasi isi_berita hanya menampilkan 60 kata
                                    $words = str_word_count($berita['isi_berita'], 1);
                                    $excerpt = implode(' ', array_slice($words, 3, 60));
                                ?>
                                <p class="text-muted lh-sm"><?= $excerpt ?></p>
                                <a href="<?=BASEURL?>/berita/detail/<?= $berita['id_berita']?>">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                            </a>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
    <!-- Token Sale Start -->