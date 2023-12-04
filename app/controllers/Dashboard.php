<?php

class Dashboard extends Controller{
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
        //judul
        $data['judul'] = "Dashboard";
        
        $data['berita'] = $this->model('Berita_model')->getAllBerita();
        
        //menampilkan view
        $this->view('componens/header',$data);
        $this->view('index',$data);
        $this->view('componens/footer',$data);
    }
}
?>