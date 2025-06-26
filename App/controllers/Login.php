<?php

class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // Hash password yang dimasukkan dengan MD5
            $hashed_password = md5($password);
            
            $userModel = $this->model('User_model');
            $user = $userModel->getUserByEmail($email);
    
            if ($user && $hashed_password === $user['password']) {
                // Cek apakah ada gambar yang di-upload
                if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                    $profile_picture = $_FILES['profile_picture'];
                    $profile_picture_name = $user['user_id'] . "_" . basename($profile_picture['name']);
                    $profile_picture_path = "img/profile_users/" . $profile_picture_name;
    
                    // Pindahkan gambar ke direktori yang sesuai
                    if (move_uploaded_file($profile_picture['tmp_name'], $profile_picture_path)) {
                        // Update path gambar di database
                        $userModel->updateUserProfile(
                            $user['user_id'],
                            $user['name'],
                            $user['email'],
                            $user['password'],
                            $user['alamat'],
                            $user['nomor_telepon'],
                            $profile_picture_path
                        );
                    } else {
                        // Jika gagal upload gambar, redirect dengan pesan error
                        header('Location: ' . BASEURL . '/login?error=uploadfailed');
                        exit;
                    }
                }
    
                // Mulai session dan simpan data user
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['profile_picture'] = $user['profile_picture'];
    
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
