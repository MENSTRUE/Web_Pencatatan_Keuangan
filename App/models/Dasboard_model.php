<?php

class Dasboard_model {

    private $db;

    public function __construct() {
        $this->db = new Database; // Pastikan class Database ada
    }

    // Ambil data pemasukan
    public function getIncomeData() {
        $query = "SELECT 
                        YEAR(created_at) AS year, 
                        MONTH(created_at) AS month, 
                        SUM(amount_approved) AS total_amount_approved
                  FROM laporan 
                  WHERE status = 'approved' AND type = 'pemasukan'
                  GROUP BY year, month
                  ORDER BY year DESC, month DESC";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Ambil data pengeluaran
    public function getExpenseData() {
        $query = "SELECT 
                        YEAR(created_at) AS year, 
                        MONTH(created_at) AS month, 
                        SUM(amount_approved) AS total_amount_approved
                  FROM laporan 
                  WHERE status = 'approved' AND type = 'pengeluaran'
                  GROUP BY year, month
                  ORDER BY year DESC, month DESC";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Ambil jumlah laporan pemasukan
public function getIncomeReportCount() {
    $query = "SELECT COUNT(*) AS total_reports FROM laporan WHERE type = 'pemasukan'";
    $this->db->query($query);
    return $this->db->single();
}

// Ambil jumlah laporan pengeluaran
public function getExpenseReportCount() {
    $query = "SELECT COUNT(*) AS total_reports FROM laporan WHERE type = 'pengeluaran'";
    $this->db->query($query);
    return $this->db->single();
}

}
