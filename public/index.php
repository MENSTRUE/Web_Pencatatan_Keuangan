<?php

// Mulai sesi hanya jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../app/init.php';
require_once '../vendor/autoload.php'; // Pastikan Dompdf ter-autoload


// Membuat objek App dan memulai aplikasi
$app = new App;
