<?php 

class Auth extends Controller{

    public function __construct()
    {
        if (isset($_SESSION['id_login'])) {
            header('Location: ' . BASEURL .'/admin/');
        }
        Flasher::flash();
    }

    public function index(){
        //mempersiapkan data yang digunakan
        $data['judul'] = "Login";
    
        //menampilkan view
        $this->view('auth/login',$data);
    }
    

    // halaman mendaftar
    public function regist(){
        //mempersiapkan data yang digunakan
        $data['judul'] = "Regist";
    
        //menampilkan view
        $this->view('auth/regist',$data);
    }

    // menambah/ registrasi
    public function pendaftaran(){
        if ( $this->model('Auth_model')->tambahDataLogin($_POST) > 0) { //memanggil Auth_model untuk mengolah data
            Flasher::seFlash('Data','Berhasil','ditambahkan','success'); // mengirimkan parameter untuk dikelolah flasher
            header('Location: ' . BASEURL .'/auth/index');
            exit;
        }
        else {
            Flasher::seFlash('Data','Gagal','ditambahkan','danger');
            header('Location: ' . BASEURL .'/auth/regist');
            exit;
        }
    }

    // public function ubah(){
    //     if ( $this->model('Auth_model')->ubahDataUser($_POST) > 0) { //memanggil Auth_model untuk mengolah data
    //         Flasher::seFlash('Data','Berhasil','Diubah','success'); // mengirimkan parameter untuk dikelolah flasher
    //         header('Location: ' . BASEURL .'/profile/index');
    //         exit;
    //     }
    //     else {
    //         Flasher::seFlash('Data','Gagal','Diubah','danger');
    //         header('Location: ' . BASEURL .'/profile/index');
    //         exit;
    //     }
    // }


    // cek data atau login ke dalam aplikasi
    public function login()
    {
        // mengelola hasil POST yang diberikan 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //pengecekan data login
            $user = $this->model('Auth_model')->login($username, $password);

            // jika ada jalankan perintah berikut
           header("Location: ". BASEURL ."/Admin/index"); // Arahkan ke tampilan admin
           exit;
        }
    }

    public function logout() {
        
        // Hapus semua data sesi
        session_unset();
        
        // Hancurkan sesi
        session_destroy();

       
        // Arahkan pengguna ke halaman login
        header("Location:". BASEURL ."/dashboard/index"); // Ganti login.php dengan halaman login Anda
        exit();
    }
}
?>