<?php

class Berita extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (isset($_SESSION['id_login'])) {
            header('Location: ' . BASEURL .'/admin/index');
        }
        Flasher::flash();
    }

    public function index()
    {
        //mempersiapkan data yang digunakan
        $data['judul'] = "Berita";
        $data['berita'] = $this->model('Berita_model')->getAllBerita();

        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('berita',$data);
        $this->view('componens/footer',$data);
    }


    //tambah Berita
    public function tambah(){
        if ( $this->model('Berita_model')->tambahDataBerita($_POST) > 0) { //memanggil Berita_model untuk mengolah data
            Flasher::seFlash('Berita','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas');
            exit;
        }
        else {
            Flasher::seFlash('Berita','Gagal','ditambahkan','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas');
            exit;
        }
    }

    //ubah data
    public function ubah(){
        if ( $this->model('Berita_model')->ubahDataBerita($_POST) > 0) { //memanggil Berita_model untuk mengolah data
            Flasher::seFlash('Berita','Berhasil','diubah','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_Kelas');
            exit;
        }
        else {
            Flasher::seFlash('Berita','Gagal','diubah','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_Kelas');
            exit;
        }
    }

    //get data
    public function getUbah()
    {
        echo json_encode( $this->model('Berita_model')->getBeritaById($_POST['id']));
    }

    //detail Berita
    public function detail($id)
    {
        //set session  navbarr
        $data['judul'] = "Detail Berita";
        
        $data['berita'] = $this->model('Berita_model')->getBeritaById($id);

        $data['rekomendasi'] = $this->model('Berita_model')->getRekomendasiBerita($id);

        // var_dump($data['login']);die;

        // var_dump($data['kelas']);die;
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('detail_berita',$data);
        $this->view('componens/footer',$data);
    }

    public function hapus($id){
        if ( $this->model('Berita_model')->hapusDataBerita($id) > 0) { //memanggil Berita_model untuk mengolah data
            Flasher::seFlash('Berita','Berhasil','dihapus','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas/');
            exit;
        }
        else {
            Flasher::seFlash('Berita','Gagal','dihapus','danger');// mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/admin/data_kelas/');
            exit;
        }
    }
}