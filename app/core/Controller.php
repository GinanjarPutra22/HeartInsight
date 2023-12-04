<?php

class Controller{
    // pembuatan function untuk dipanggil pada class child Controllers
    // sehingga pada class child hanya perlu memanggil function view/model
    public function view($view,$data= [])
    {
        require_once 'app/views/' .$view . '.php';
    }

    public function model($model)
    {
        require_once 'app/models/' .$model. '.php';
        return new $model;
    }
}
?>