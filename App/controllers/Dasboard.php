<?php

class Dasboard extends Controller {

    public function index() {
        $data['judul'] = 'Dashboard';
        
        // Ambil data pemasukan dan pengeluaran
        $data['income_data'] = $this->model('Dasboard_model')->getIncomeData();
        $data['expense_data'] = $this->model('Dasboard_model')->getExpenseData();

        $data['income_report_count'] = $this->model('Dasboard_model')->getIncomeReportCount();
        $data['expense_report_count'] = $this->model('Dasboard_model')->getExpenseReportCount();


        // Kirim data ke view
        $this->view('templates/header', $data);
        $this->view('dasboard/index', $data);
        $this->view('templates/footer');
    }
}
