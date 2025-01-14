<?php

class Create extends Controller {

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
        $data['judul'] = 'Create Laporan';
        $this->view('templates/header', $data);
        $this->view('create/index', $data);
        $this->view('templates/footer');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Tidak perlu memanggil session_start() lagi karena sudah di konstruktor
            if (!isset($_SESSION['user_id'])) {
                die('Error: User not logged in.');
            }

            $data = [
                'user_id' => $_SESSION['user_id'] ?? null,
                'category' => $_POST['category'] ?? '',
                'type' => $_POST['type'] ?? '',
                'amount' => $_POST['amount'] ?? 0,
                'description' => $_POST['description'] ?? '',
                'status' => 'pending',
                'created_at' => $_POST['created_at'] ?? date('Y-m-d'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $model = $this->model('Create_model');

            if ($model->createLaporan($data)) {
                header('Location: ' . BASEURL . '/laporan');
            } else {
                header('Location: ' . BASEURL . '/create');
            }
            exit;
        }
    }
}

