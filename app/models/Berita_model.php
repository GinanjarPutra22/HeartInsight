<?php

class Berita_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //untuk fetch data login
    public function getBeritaById($id)
    {
        $this->db->query('UPDATE pengunjung SET total_pengunjung = total_pengunjung + 1 WHERE id_berita = :id');
        $this->db->bind('id', $id);

        $this->db->execute();

        $this->db->query('SELECT * FROM berita
                            WHERE berita.id_berita=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }
    public function getDataBeritaById($id)
    {
        $this->db->query('SELECT * FROM berita
                            WHERE id_berita=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }
    public function getAllBerita()
    {
        $this->db->query('SELECT * FROM berita');

        return $this->db->resultSet();
    }

    public function getRekomendasiBerita($id)
    {
        $this->db->query('SELECT * FROM berita 
                            INNER JOIN pengunjung ON berita.id_berita = pengunjung.id_berita 
                            WHERE berita.id_berita != :id
                            ORDER BY total_pengunjung DESC 
                            LIMIT 3');

        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    //ketika registt
    public function tambahDataBerita($data)
    {
        // var_dump($data);die;
        try {
            $this->db->beginTransaction(); // Mulai transaksi
            $query = "INSERT INTO berita (id_berita, judul_berita, penulis_berita, waktu_penulisan,isi_berita,foto_berita)
                        VALUES 
                    ('', :judul_berita, :penulis_berita, :waktu_penulisan, :isi_berita, :foto_berita)";

            date_default_timezone_set('Asia/Jakarta');
            $data['waktu_penulisan'] = date('Y-m-d H:i:s');

            $data['foto_berita'] = $this->tambahGambar();

            $this->db->query($query);
            $this->db->bind('judul_berita', $data['judul_berita']);
            $this->db->bind('penulis_berita', $data['penulis_berita']);
            $this->db->bind('waktu_penulisan', $data['waktu_penulisan']);
            $this->db->bind('isi_berita', $data['isi_berita']);
            $this->db->bind('foto_berita', $data['foto_berita']);
            $this->db->execute();

            $id_table1 = $this->db->getLastInsertId();
            $total_pengunjung = 0;

            $query = "INSERT INTO pengunjung (id_pengunjung, id_berita, total_pengunjung)
                        VALUES 
                    ('', :id_berita, :total_pengunjung)";

            $this->db->query($query);
            $this->db->bind('id_berita', $id_table1);
            $this->db->bind('total_pengunjung', $total_pengunjung);
            $this->db->execute();

            $this->db->commit();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: " . $e->getMessage());
        }
    }

    public function ubahDataBerita($data)
    {
        // var_dump($data);die;
        $query = "UPDATE berita
            SET 
            judul_berita = :judul_berita, 
            penulis_berita = :penulis_berita,
            isi_berita = :isi_berita,
            foto_berita = :foto_berita
            WHERE id_berita = :id_berita";

        $fotolama = $data['e_foto_berita'];

        if ($_FILES['foto_berita']['error'] === 4) {
            $data['foto_berita'] = $fotolama;
        } else {
            echo "Error code: " . $_FILES['foto_berita']['error'];
            if ($fotolama === "1.png") {
                $data['foto_berita'] = $this->tambahGambar();
            } else {
                $tempat = "public/img/asset/" . $fotolama;
                unlink($tempat);
                $data['foto_berita'] = $this->tambahGambar();
            }
        }

        $this->db->query($query);
        $this->db->bind('id_berita', $data['id_berita']);
        $this->db->bind('judul_berita', $data['judul_berita']);
        $this->db->bind('penulis_berita', $data['penulis_berita']);
        $this->db->bind('isi_berita', $data['isi_berita']);
        $this->db->bind('foto_berita', $data['foto_berita']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBerita($id) {
        try {
            $this->db->beginTransaction();
    
            // Delete from 'pengunjung' table first to respect foreign key constraint
            $queryPengunjung = "DELETE FROM pengunjung WHERE id_berita = :id";
            $this->db->query($queryPengunjung);
            $this->db->bind('id', $id);
            $this->db->execute();
    
            // Now you can safely delete from 'Berita' table
            $queryBerita = 'DELETE FROM Berita WHERE id_berita = :id';
            $this->db->query($queryBerita);
            $this->db->bind('id', $id);
            $this->db->execute();
    
            $this->db->commit();
    
            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback jika terjadi kesalahan
            die("Error: " . $e->getMessage());
        }
    }
    


    public function tambahGambar()
    {
        $namafile = $_FILES['foto_berita']['name'];
        $ukuranfile = $_FILES['foto_berita']['size'];
        $error = $_FILES['foto_berita']['error'];
        $tmpname = $_FILES['foto_berita']['tmp_name'];

        // cek apakah ada gambar yang diupload
        if ($error === 4) {
            return false;
        }

        // cek yang diupload ekstensinya apkah gambar atau bukan
        $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensigambar = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
        //  contohnya ferdy.png maka menjadi ['ferdy','png']
        $ekstensigambar = strtolower(end($ekstensigambar)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
        // end mengambil explode yang paling akhir

        if (!in_array($ekstensigambar, $ekstensigambarValid)) { // melakukan pengecekan string didalam array
            // fungsi ini menghasilkan true jika ada false jika tidak
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranfile > 5000000000) { //dalam bentuk byte
            return false;
        }

        //lolos pengecekan gambar siap diupload

        // generate nama gambar random baruu
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        // mengirim kedalam directory 
        move_uploaded_file($tmpname, 'public/img/berita/' . $namafilebaru);

        return $namafilebaru;
    }

}
?>