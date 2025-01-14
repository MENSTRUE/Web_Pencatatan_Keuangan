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
}
