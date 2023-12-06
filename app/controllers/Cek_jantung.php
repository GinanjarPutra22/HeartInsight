<?php

class Cek_jantung extends Controller{
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
        $data['judul'] = "Jantung";
        
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('cek_jantung',$data);
        $this->view('componens/footer',$data);
    }
}
?>