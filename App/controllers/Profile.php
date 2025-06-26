<?php

class Profile extends Controller {
    public function index() {
        $data['judul'] = 'Profile';

        // Ambil data user yang sedang login (misalnya dari session)
        $user_id = $_SESSION['user_id']; 
        $data['user'] = $this->model('User_model')->getUserById($user_id);

        // Kirim data ke view
        $this->view('templates/header', $data);
        $this->view('Profile/index', $data);
        $this->view('templates/footer');
    }

    // Menampilkan halaman edit profil
    public function edit() {
        $data['judul'] = 'Edit Profil';

        // Ambil data user yang sedang login
        $user_id = $_SESSION['user_id']; 
        $data['user'] = $this->model('User_model')->getUserById($user_id);

        // Kirim data ke view
        $this->view('templates/header', $data);
        $this->view('Profile/edit', $data);  // Tampilkan halaman edit
        $this->view('templates/footer');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];

            // Ambil data dari form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : NULL;
            $alamat = $_POST['alamat'];
            $nomor_telepon = $_POST['nomor_telepon'];

            // Upload foto profil jika ada
            $profile_picture = $_FILES['profile_picture'];
            $profile_path = NULL;

            if (!empty($profile_picture['name'])) {
                $target_dir = "img/profile_users/";  // Sesuaikan dengan folder yang benar
                $file_name = uniqid() . "_" . basename($profile_picture["name"]);
                $target_file = $target_dir . $file_name;
                
                // Validasi jenis file
                $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($file_type, $allowed_types)) {
                    move_uploaded_file($profile_picture["tmp_name"], $target_file);
                    $profile_path = $target_file;
                }
            }

            // Update data user
            $this->model('User_model')->updateUserProfile($user_id, $name, $email, $password, $alamat, $nomor_telepon, $profile_path);

            // Redirect ke halaman profil dengan pesan sukses
            header("Location: " . BASEURL . "/profile/index");
            exit;
        }
    } 
}
