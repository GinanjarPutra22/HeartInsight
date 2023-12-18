<?php 

class Admin extends Controller{
    protected $data = [];

    public function __construct()
    {
        if (!isset($_SESSION['id_login'])) {
            header('Location: ' . BASEURL .'/auth/index');
        }
        Flasher::flash();
    }

    public function index()
    {
        // var_dump($_POST);die;
        //data untuk navbar
        $data['judul'] = "Dashboard Admin";

        $data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_login']);
        
        if (isset($_POST['keyword'])) {
            $data['total_pengunjung']= $this->model('Pengunjung_model')->cari();
        }else{
            $data['total_pengunjung']= $this->model('Pengunjung_model')->getAllPengunjung();
        }
        // var_dump($data['total_pengunjung']);die;

        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/index',$data);
        $this->view('admin/componens/footer',$data);
    }

    public function berita(){
        //data untuk navbar
        $data['judul'] = "Berita";

        $data['login'] = $this->model('Auth_model')->getLoginById($_SESSION['id_login']);
        // var_dump($_POST['keyword']);die;
        //mengambil data kelas
        if (isset($_POST['keyword'])) {
            $data['berita'] = $this->model('Berita_model')->cari();
        }else{
            $data['berita'] = $this->model('Berita_model')->getAllBerita();
        }


        //menampilkan view
        $this->view('admin/componens/header',$data);
        $this->view('admin/berita/index',$data);
        $this->view('admin/componens/footer',$data);
    }

    // public function data_kelas()
    // {
    //     //data untuk navbar
    //     $data['judul'] = "Data Kelas";
    //     if (isset ($_SESSION['id_profile'])) {
    //         $data['login'] = $this->data['login'];
    //     }

    //     //menampilkan data kelas
    //     if (isset($_POST['keyword'])) {
    //         $data['kelas'] = $this->model('Kelas_model')->cariDataKelas();
    //     }else {
    //         $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
    //     }

    //     //data kategori
    //     $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        
        
    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/kelas/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }

    // public function data_mentor()
    // {
    //     //data untuk navbar
    //     $data['judul'] = "Data Mentor";
    //     if (isset ($_SESSION['id_profile'])) {
    //         $data['login'] = $this->data['login'];
    //     }

    //     //data yang ditampilkan
    //     if (isset($_POST['keyword'])||isset($_POST['pilihan'])) {
    //         $data['mentor'] = $this->model('Mentor_model')->cariDataMentor();
    //         $data['b_mentor'] = $this->model('Mentor_model')->getMentorBelumMasuk();
    //     }else {
    //         $data['mentor'] = $this->model('Mentor_model')->getAllMentor();
    //         $data['b_mentor'] = $this->model('Mentor_model')->getMentorBelumMasuk();
    //     }
        
    //     //mengambil data kelas
    //     $data['kelas']= $this->model('Kelas_model')->getAllKelas();

    //     //menampilkan view
    //     $this->view('admin/componens/header',$data);
    //     $this->view('admin/mentor/index',$data);
    //     $this->view('admin/componens/footer',$data);
    // }

}
?>