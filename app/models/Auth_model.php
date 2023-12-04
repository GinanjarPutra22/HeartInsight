<?php

class Auth_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //untuk fetch data login
    public function getLoginById($id)
    {
        $this->db->query('SELECT * FROM login WHERE login.id_login=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    // public function getLoginByIdMentor($id)
    // {
    //     $this->db->query('SELECT * FROM mentor 
    //                         INNER JOIN login ON login.id_profile_mentor = mentor.id_profile_mentor
    //                         WHERE mentor.id_profile_mentor=:id');
    //     $this->db->bind('id',$id);
    //     return $this->db->single();
    // }

    //ketika registt
    public function tambahDataLogin($data)
    {
        $query = "INSERT INTO login (id_login, nama, username, password)
                    VALUES 
                ('', :nama, :username, :password)";
        
        $this->db->query($query);
        // $this->db->bind('id_profile', $data['id_profile']); //$data[]'nama'] dari name form
        // $this->db->bind('id_profile_mentor', $data['id_profile_mentor']); //$data[]'nama'] dari name form
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password',password_hash($data['password'], PASSWORD_DEFAULT) ); 
        $this->db->execute();

        return $this->db->rowCount();
    }

    //ketika mengubah profile
    // public function ubahDataUser($data){
    //     // var_dump($data);die;
    //     try {
    //         $this->db->beginTransaction(); // Mulai transaksi
    //         // var_dump($data);die;
    //         $query = "UPDATE ". $this->table . "
    //                     SET 
    //                     nama_user = :nama_user, 
    //                     email = :email,
    //                     nomor_hp = :nomor_hp,
    //                     foto_user = :foto_user,
    //                     alamat = :alamat,
    //                     provinsi = :provinsi,
    //                     kota = :kota 
    //                     WHERE id_profile = :id_profile";

    //         $fotolama = $data['e_foto_user'];
        
    //         if ($_FILES['foto_user']['error'] === 4) {
    //             $data['foto_user'] = $fotolama;
    //         } else {
    //             echo "Error code: " . $_FILES['foto_user']['error'];
    //             if ($fotolama === "1.png") {
    //                 $data['foto_user'] = $this->tambahGambar();
    //             }else{
    //                 $tempat = "public/img/asset/" . $fotolama;
    //                 unlink($tempat);
    //                 $data['foto_user'] = $this->tambahGambar();
    //             }
    //         }

    //         // var_dump($data);die;
    //         $this->db->query($query);
    //         $this->db->bind('id_profile', $data['id_profile']); //$data[]'nama'] dari name form
    //         $this->db->bind('nama_user', $data['nama_user']); //$data[]'nama'] dari name form
    //         $this->db->bind('email', $data['email']); //$data[]'nama'] dari name form
    //         $this->db->bind('nomor_hp', $data['nomor_hp']); 
    //         $this->db->bind('foto_user',$data['foto_user'] ); 
    //         $this->db->bind('alamat', $data['alamat']); 
    //         $this->db->bind('provinsi', $data['provinsi']); 
    //         $this->db->bind('kota', $data['kota']); 

    //         $this->db->execute();

    //         $query2 = "UPDATE login SET
    //                     username = :username,
    //                     password = :password
    //                     WHERE id_profile = :id_profile";

    //         $this->db->query($query2);

    //         $this->db->bind('id_profile', $data['id_profile']); 
    //         $this->db->bind('username',$data['username'] ); 
    //         $this->db->bind('password',password_hash($data['password'], PASSWORD_DEFAULT) ); 
    //         $this->db->execute();

    //         $this->db->commit();

    //         return $this->db->rowCount();
            
    //     } catch (PDOException $e) {
    //         $this->db->rollBack(); // Rollback jika terjadi kesalahan
    //         die("Error: " . $e->getMessage());
    //     }

    // }


    //untuk set login dan set session
    public function login($username, $password)
    {
        $query = "SELECT * FROM login WHERE username = :username";
        $this->db->query($query);

        $this->db->bind('username',$username);

        $this->db->execute();

        $user = $this->db->single();

        // if ($user && $password) {
        if ($user && password_verify($password, $user['password'])) {
            // var_dump($user);die;
                $_SESSION['id_login'] = $user['id_login'];
            return $user; // Login berhasil
        }

        return false; // Login gagal
    }

    // public function tambahGambar(){
    //     $namafile = $_FILES['foto_user']['name'];
    //     $ukuranfile = $_FILES['foto_user']['size'];
    //     $error = $_FILES['foto_user']['error'];
    //     $tmpname = $_FILES['foto_user']['tmp_name'];
    
    //     // cek apakah ada gambar yang diupload
    //     if ($error === 4) {
    //         return false;
    //     }
    
    //     // cek yang diupload ekstensinya apkah gambar atau bukan
    //     $ekstensigambarValid = ['jpg', 'png', 'jpeg'];
    //     $ekstensigambar = explode('.', $namafile); // sebagai pemisah antara nama file dengan ekstensi
    //     //  contohnya ferdy.png maka menjadi ['ferdy','png']
    //     $ekstensigambar = strtolower(end($ekstensigambar)); // strtolower merubah nama file menjadi lowercase/ huruf kecil
    //     // end mengambil explode yang paling akhir
    
    //     if (!in_array($ekstensigambar, $ekstensigambarValid)) { // melakukan pengecekan string didalam array
    //         // fungsi ini menghasilkan true jika ada false jika tidak
    //         return false;
    //     }
    
    //     // cek jika ukurannya terlalu besar
    //     if ($ukuranfile > 5000000000) { //dalam bentuk byte
    //         return false;
    //     }
    
    //     //lolos pengecekan gambar siap diupload
    
    //     // generate nama gambar random baruu
    //     $namafilebaru = uniqid();
    //     $namafilebaru .= '.';
    //     $namafilebaru .= $ekstensigambar;
    
    //     // mengirim kedalam directory 
    //     move_uploaded_file($tmpname, 'public/img/profile/' . $namafilebaru);
    
    //     return $namafilebaru;
    // }

}
?>