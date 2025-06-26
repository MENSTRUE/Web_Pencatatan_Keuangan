<?php
class Laporan_model {
    private $table = 'laporan';
    private $users = 'users';
    private $db;

    

    public function __construct() {
        $this->db = new Database;
    }

    public function getLaporanById($id_laporan) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_laporan = :id_laporan");
        $this->db->bind('id_laporan', $id_laporan);
        return $this->db->single();
    }
    
    public function getLaporanByUserId($user_id) {
        $query = "SELECT laporan.*, users.name, users.role 
                  FROM laporan 
                  LEFT JOIN users ON laporan.user_id = users.user_id 
                  WHERE laporan.user_id = :user_id 
                  ORDER BY laporan.created_at DESC";
        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }
    

    public function updateLaporan($data) {
        // Menambahkan 'amount_approved' dalam query UPDATE
        $query = "UPDATE " . $this->table . " SET 
                    category = :category,
                    type = :type,
                    amount = :amount,
                    description = :description,
                    status = :status,
                    updated_at = :updated_at,
                    amount_approved = :amount_approved   -- Menambahkan field amount_approved
                  WHERE id_laporan = :id_laporan";
    
        // Menyiapkan query
        $this->db->query($query);
    
        // Binding semua data termasuk amount_approved
        $this->db->bind('category', $data['category']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('amount', $data['amount']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));
        $this->db->bind('amount_approved', $data['amount_approved'] ?? null); // Menambahkan binding amount_approved
        $this->db->bind('id_laporan', $data['id_laporan']);
    
        // Eksekusi query
        $this->db->execute();
    
        // Mengembalikan jumlah baris yang terpengaruh (jika ada perubahan)
        return $this->db->rowCount();
    }
    
    
    public function deleteLaporan($id_laporan) {
        $query = "DELETE FROM " . $this->table . " WHERE id_laporan = :id_laporan";
        
        $this->db->query($query);
        $this->db->bind('id_laporan', $id_laporan);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

        // Ambil nama berdasarkan user_id
        public function getNameByUserId($user_id) {
            $this->db->query("SELECT name FROM " . $this->users . " WHERE user_id = :user_id");
            $this->db->bind('user_id', $user_id);
            return $this->db->single();
        }

        // Ambil role berdasarkan user_id
        public function getRoleByUserId($user_id) {
            $this->db->query("SELECT role FROM " . $this->users . " WHERE user_id = :user_id");
            $this->db->bind('user_id', $user_id);
            return $this->db->single();
        }
    
        // Ambil detail laporan beserta nama dan role berdasarkan user_id
        public function getLaporanWithUserDetails($id_laporan) {
            $query = "SELECT 
                        laporan.*, 
                        users.name, 
                        users.role 
                    FROM " . $this->table . " 
                    JOIN " . $this->users . " ON laporan.user_id = users.user_id 
                    WHERE laporan.id_laporan = :id_laporan";

            $this->db->query($query);
            $this->db->bind('id_laporan', $id_laporan);
            
            return $this->db->single();  // Mengembalikan hasil dengan data dari tabel laporan dan users
        }

    public function getById($id_laporan)
    {
        $this->db->prepare("SELECT * FROM laporan WHERE id_laporan = :id_laporan");
        $this->db->bind(':id_laporan', $id_laporan);
        return $this->db->fetch();
    }


    public function searchLaporanByUserId($search, $user_id) {
        $sql = "SELECT * FROM laporan WHERE user_id = :user_id AND (category LIKE :search OR type LIKE :search)";
        $this->db->query($sql);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':search', "%$search%");
        return $this->db->resultSet();
    }
    
    
    
    
    
}
