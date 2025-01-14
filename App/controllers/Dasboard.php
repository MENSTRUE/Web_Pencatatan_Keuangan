<?php

class Dasboard extends Controller {
    public function __construct() {
        // Pastikan session sudah dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Periksa apakah pengguna telah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Dasboard';
        $this->view('templates/header', $data);
        $this->view('dasboard/index', $data);
        $this->view('templates/footer');
    }
}

