<?php

class Create_model {
    private $table = 'laporan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Metode untuk mendapatkan user_id berdasarkan name
    public function getUserIdByName($name) {
        $query = "SELECT user_id FROM users WHERE name = :name"; 
        $this->db->query($query);
        $this->db->bind('name', $name); // Bind ke parameter 'name'
        $result = $this->db->single();
        return $result ? $result['user_id'] : null; // Return null jika tidak ditemukan
    }

    // Metode untuk mendapatkan role berdasarkan user_id
    public function getRoleByUserId($userId) {
        $query = "SELECT role FROM users WHERE user_id = :user_id"; 
        $this->db->query($query);
        $this->db->bind('user_id', $userId);
        $result = $this->db->single();
        return $result ? $result['role'] : 'Unknown'; // Return 'Unknown' jika role tidak ditemukan
    }

    public function createLaporan($data) {
        // Ambil user_id dari name yang ada di session
        $userId = $_SESSION['user_id'];
        if (!$userId) {
            throw new Exception("User ID tidak ditemukan untuk username " . $_SESSION['name']);
        }


        $query = "INSERT INTO " . $this->table . " 
        (user_id, category, type, amount, description, status, created_at, updated_at) 
        VALUES 
        (:user_id, :category, :type, :amount, :description, :status, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('user_id', $userId); // Gunakan user_id yang diambil
        $this->db->bind('category', $data['category']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('amount', $data['amount']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('created_at', date('Y-m-d H:i:s'));
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));

        return $this->db->execute();
    }

    public function getAllLaporan() {
        $query = "SELECT l.*, u.name, u.role FROM laporan l 
                  JOIN users u ON l.user_id = u.user_id"; // Ganti username jadi name dan juga ambil role
        $this->db->query($query);
        $laporan = $this->db->resultSet();
    
        return $laporan;
    }

    // Ambil role berdasarkan name di session
    public function getUserRoleByName($name) {
        $query = "SELECT role FROM users WHERE name = :name";  // Gunakan 'name' dari session
        $this->db->query($query);
        $this->db->bind('name', $name);  // Menggunakan nama dari session
        $result = $this->db->single();
        return $result ? $result['role'] : 'Unknown';  // Jika role tidak ditemukan, kembalikan 'Unknown'
    }

    public function searchLaporan($search) {
        $sql = "SELECT * FROM laporan WHERE category LIKE :search OR type LIKE :search";
        $this->db->query($sql);
        $this->db->bind(':search', "%$search%");
        return $this->db->resultSet();
    }
    
}
