<?php

class Tentang_kami extends Controller{
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
        //navbarr
        $data['judul'] = "Tentang Kami";
        
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('tentang_kami',$data);
        $this->view('componens/footer',$data);
    }
}
?>