<?php

class Aktivitas_karyawan extends Controller
{
    public function index()
    {
        // Memuat model dengan nama yang sesuai
        $this->model('Aktivitas_karyawan_model');
        
        // Memanggil fungsi model untuk mendapatkan aktivitas
        $aktivitas = $this->model('Aktivitas_karyawan_model')->getAktivitasKaryawan();
        $logs = $this->model('Aktivitas_karyawan_model')->getLogs();

        // Menyertakan data ke dalam view
        $data['aktivitas'] = $aktivitas;
        $data['logs'] = $logs;
        $data['judul'] = 'Aktivitas Karyawan'; // Menambahkan judul untuk header

        // Menampilkan view
        $this->view('templates/header', $data);
        $this->view('aktivitas_karyawan/index', $data); // Mengirim data ke view
        $this->view('templates/footer');
    }
}

?>
