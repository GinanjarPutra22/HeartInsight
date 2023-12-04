<?php
if (!session_id()) { //jika session id tidak ada maka jalankan
    session_start();
}
// bootstraping memanggil seluruh aplikasi mvc
require_once 'app/init.php';

$app = new App();