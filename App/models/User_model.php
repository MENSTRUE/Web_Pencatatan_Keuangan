<?php

class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Ambil user berdasarkan email
    public function getUserByEmail($email) {
        $this->db->query("SELECT * FROM {$this->table} WHERE email = :email");
        $this->db->bind('email', $email);
        return $this->db->single();  // Mengembalikan satu hasil data
    }

    // Ambil semua user dengan role karyawan
    public function getAllKaryawan() {
        $this->db->query("SELECT * FROM {$this->table} WHERE role = 'karyawan'");
        return $this->db->resultSet();  // Mengembalikan semua hasil data karyawan
    }

    // Ambil user berdasarkan user_id
    public function getUserById($user_id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE user_id = :user_id");
        $this->db->bind('user_id', $user_id);
        return $this->db->single();
    }

    // Menambahkan user baru ke dalam database
    public function insertUser($name, $email, $password, $role) {
        $this->db->query("INSERT INTO {$this->table} (name, email, password, role, created_at, updated_at) VALUES (:name, :email, :password, :role, NOW(), NOW())");
        $this->db->bind('name', $name);
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->bind('role', $role);
        return $this->db->execute();
    }

    // Update data user
    public function updateUser($user_id, $name, $email, $password, $role) {
        $this->db->query("UPDATE {$this->table} SET name = :name, email = :email, password = :password, role = :role, updated_at = NOW() WHERE user_id = :user_id");
        $this->db->bind('user_id', $user_id);
        $this->db->bind('name', $name);
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->bind('role', $role);
        return $this->db->execute();
    }

    // Hapus user berdasarkan user_id
    public function deleteUser($user_id) {
        $this->db->query("DELETE FROM {$this->table} WHERE user_id = :user_id");
        $this->db->bind('user_id', $user_id);
        return $this->db->execute();
    }

    public function updateUserProfile($user_id, $name, $email, $password, $alamat, $nomor_telepon, $profile_picture) {
        $sql = "UPDATE users SET name = :name, email = :email, alamat = :alamat, nomor_telepon = :nomor_telepon";
    
        if (!empty($password)) {
            $sql .= ", password = :password";
        }
    
        if (!empty($profile_picture)) {
            $sql .= ", profile_picture = :profile_picture";
        }
    
        $sql .= " WHERE user_id = :user_id";
    
        $this->db->query($sql);
        $this->db->bind('user_id', $user_id);
        $this->db->bind('name', $name);
        $this->db->bind('email', $email);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('nomor_telepon', $nomor_telepon);
    
        if (!empty($password)) {
            $this->db->bind('password', $password);
        }
    
        if (!empty($profile_picture)) {
            $this->db->bind('profile_picture', $profile_picture);
        }
    
        return $this->db->execute();
    }
    
}
?>
