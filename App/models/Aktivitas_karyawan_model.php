    <?php

    class Aktivitas_karyawan_model
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database(); // Membuat objek Database
        }

        // Fungsi untuk mendapatkan semua aktivitas karyawan
        public function getAktivitasKaryawan()
        {
            // Menyiapkan query untuk mengambil data aktivitas karyawan
            $this->db->query("SELECT * FROM activity_logs ORDER BY log_created_at DESC");

            // Menjalankan query dan mengambil hasilnya
            return $this->db->resultSet();
        }

        // Fungsi untuk mengambil data aktivitas log
        // Fungsi untuk mengambil data aktivitas log
        public function getLogs() {
            $this->db->query("SELECT name, action, user_id, id_laporan, category, type, amount, amount_approved, description, status, created_at, updated_at FROM activity_logs ORDER BY created_at DESC");
            return $this->db->resultSet(); // Mengembalikan hasil query
        }

    }
    ?>
