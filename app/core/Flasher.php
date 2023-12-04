<?php

class Flasher{

    //membuat class flash untuk memberikan pesan ketika menjalankan aksi
    // parameter nama untuk memberi tau data apa yang diolah
    public static function seFlash($nama,$pesan,$aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'nama' => $nama,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash(){
        if (isset($_SESSION['flash'])) {
            // bisa edit flash disini
            echo '  <div class="custom-alert alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                        ' . $_SESSION['flash']['nama'] . '
                        <strong> ' . $_SESSION['flash']['pesan'] . '</strong>
                        ' . $_SESSION['flash']['aksi'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                unset($_SESSION['flash']);
        }
    }
}
?>