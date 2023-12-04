<?php
//pada class APP ini melakukan pemecahan sebuah url yang diketikkan menjadi beberapa bagian
// yakni container/method/param
// container sebagai class/method sebagai function/dan param untuk sebuah value yang digunakan

class App {
    //membuat sebuah url dafault ketika web dijalankan
    protected $controller = 'Dashboard';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //pemecahan url untuk digunakan
        $url = $this->parseURL(); // sebelumnya kita pecah URL menggunakan function parseURL
        // var_dump($url);

        //controller
        if (isset($url[0])){
            if( file_exists('app/controllers/' . $url[0] .'.php' )){
                $this->controller = $url[0]; // merubah controller default dengan controller yang baru
                unset($url[0]);
            }
        }

        //menggunakan controller yang ada untuk dihalankan
        require_once 'app/controllers/' . $this->controller . '.php'; //memanggil controller baru
        $this->controller = new $this->controller; //menjalankan controller baru yang sesuai 
        

        //method
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];// merubah method/func default dengan method/func yang baru
                unset($url[1]);
            }
        }

        //paramter
        if (!empty($url)) {
            // var_dump($url);
            array_values($url); //memasukkan value setelah method kedalam array params[]
            $this->params = array_values($url);
        }

        //jalankan controller dan method serta kirimkan params jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    //pemecahan url menjadi array
    public function parseURL(){
        if(isset($_GET['url'])){
            // menghilangkan / untuk menjadi array
            $url= rtrim($_GET['url'], '/'); // menghapus "/" pada akhir/ujung url untuk membersihkan URL
            $url= filter_var($url,FILTER_SANITIZE_URL);
            $url= explode('/',$url);// memecah menjadi bentuk array
            return $url;
        }
    }
}
?>