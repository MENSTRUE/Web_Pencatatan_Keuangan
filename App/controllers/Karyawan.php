<?php

class Karyawan extends Controller {
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
        // Ambil data karyawan dari model User_model
        $data['karyawan'] = $this->model('User_model')->getAllKaryawan();
        $data['judul'] = 'Karyawan';
        
        // Tampilkan view
        $this->view('templates/header', $data);
        $this->view('karyawan/index', $data);
        $this->view('templates/footer');
    }

    public function create() {
        $data['judul'] = 'Tambah Karyawan';
        $this->view('templates/header', $data);
        $this->view('karyawan/create', $data);
        $this->view('templates/footer');
    }

    public function store() {
        // Ambil data dari form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Enkripsi password dengan MD5
        $role = $_POST['role'];

        // Simpan data ke database menggunakan User_model
        $this->model('User_model')->insertUser($name, $email, $password, $role);
        
        // Redirect kembali ke halaman utama
        header('Location: ' . BASEURL . '/karyawan');
    }

    public function edit($user_id) {
        // Ambil data karyawan berdasarkan user_id dari User_model
        $data['karyawan'] = $this->model('User_model')->getUserById($user_id);
        $data['judul'] = 'Edit Karyawan';
        $this->view('templates/header', $data);
        $this->view('karyawan/edit', $data);
        $this->view('templates/footer');
    }

    public function update() {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Enkripsi password dengan MD5
        $role = $_POST['role'];

        // Update data ke database menggunakan User_model
        $this->model('User_model')->updateUser($user_id, $name, $email, $password, $role);

        // Redirect kembali ke halaman utama
        header('Location: ' . BASEURL . '/karyawan');
    }

    public function delete($user_id) {
        // Hapus data dari database menggunakan User_model
        $this->model('User_model')->deleteUser($user_id);
        
        // Redirect kembali ke halaman utama
        header('Location: ' . BASEURL . '/karyawan');
    }
}
?>
