<?php

class Cek_Jantung extends Controller {
    protected $data = [];


    public function index() {
        // var_dump($_POST);die;
        //data untuk navbar
        $data['judul'] = "Cek Jantung";

        //menampilkan view
        $this->view('componens/header', $data);
        $this->view('Cek_Jantung', $data);
        $this->view('componens/footer', $data);
    }

}
?>