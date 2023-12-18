<?php

class Pengunjung_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //untuk fetch data login
    public function getPengunjungById($id)
    {
        $this->db->query('SELECT * FROM pengunjung
                            WHERE pengunjung.id_berita=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function getAllPengunjung()
    {
        $this->db->query('SELECT * FROM pengunjung
                            INNER JOIN berita ON pengunjung.id_berita = berita.id_berita');

        return $this->db->resultSet();
    }

    public function cari(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM pengunjung
                    INNER JOIN berita ON pengunjung.id_berita = berita.id_berita 
                    WHERE berita.judul_berita LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        
        return $this->db->resultSet();
    }    
}
?>