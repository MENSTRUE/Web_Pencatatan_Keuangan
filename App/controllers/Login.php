<?php

class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];  // Ambil password yang dimasukkan
    
    // Hash password yang dimasukkan dengan MD5
    $hashed_password = md5($password);
    
    $userModel = $this->model('User_model');
    $user = $userModel->getUserByEmail($email);

    // Pastikan user ada dan password yang dimasukkan sesuai
    if ($user && $hashed_password === $user['password']) {
        // Mulai session dan simpan data user
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];


        // Redirect ke halaman yang sesuai setelah login
        if ($user['role'] === 'admin') {
            header('Location: ' . BASEURL . '/dasboard');
        } else if ($user['role'] === 'karyawan') {
            header('Location: ' . BASEURL . '/dasboard');
        } else {
            header('Location: ' . BASEURL . '/login?error=invalidrole');
        }
        exit;
    } else {
        header('Location: ' . BASEURL . '/login?error=invalid');
        exit;
    }
}

    }

    public function logout() {
        // Hancurkan session saat logout
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
