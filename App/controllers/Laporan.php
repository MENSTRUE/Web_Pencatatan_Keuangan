<?php

require_once '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;


class Laporan extends Controller {

    public function index() {
        $data['judul'] = 'Laporan';

        // Ambil user_id dan role dari session
        $user_id = $_SESSION['user_id'] ?? null;
        $role = $_SESSION['role'] ?? null;

        // Jika user_id tidak ditemukan, arahkan ke halaman login
        if (!$user_id) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // Periksa apakah user adalah admin
        if ($role === 'admin') {
            // Admin dapat melihat semua laporan
            $data['laporan'] = $this->model('Create_model')->getAllLaporan();
        } else {
            // Pengguna biasa hanya melihat laporan miliknya
            $data['laporan'] = $this->model('Laporan_model')->getLaporanByUserId($user_id);
        }

        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id_laporan) {
        $data['judul'] = 'Edit Laporan';
        $data['laporan'] = $this->model('Laporan_model')->getLaporanById($id_laporan);
        $this->view('templates/header', $data);
        $this->view('laporan/edit', $data);
        $this->view('templates/footer');
    }

    public function delete($id_laporan) {
        if ($this->model('Laporan_model')->deleteLaporan($id_laporan) > 0) {
            Flasher::setFlash('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            Flasher::setFlash('danger', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }

    public function detail($id_laporan) {
        $laporan = $this->model('Laporan_model')->getById($id_laporan);
        $laporan = $this->model('Laporan_model')->getLaporanWithUserDetails($id_laporan);

        if (!$laporan) {
            die('Laporan tidak ditemukan.'); // Berikan pesan error jika data tidak ada
        }

        // Ambil nama dan role berdasarkan user_id
        $user_id = $laporan['user_id']; // Ambil user_id dari laporan
        $laporan['name'] = $this->model('Laporan_model')->getNameByUserId($user_id)['name'];
        $laporan['role'] = $this->model('Laporan_model')->getRoleByUserId($user_id)['role'];

        $data['judul'] = 'Detail Laporan';
        $this->view('templates/header', $data);
        $this->view('laporan/detail', ['laporan' => $laporan]);
        $this->view('templates/footer');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_laporan = $_POST['id_laporan'];

            // Data untuk update laporan
            $data = [
                'id_laporan' => $id_laporan,
                'category' => $_POST['category'],
                'type' => $_POST['type'],
                'amount' => $_POST['amount'],
                'description' => $_POST['description'],
                'updated_at' => $_POST['updated_at'],
                'amount_approved' => $_POST['amount_approved'] ?? null,
                'status' => $_POST['status'] ?? 'pending', // Tangkap status dari form
            ];

            // Simpan ke database
            $model = $this->model('Laporan_model');
            if ($model->updateLaporan($data)) {
                $_SESSION['success'] = 'Laporan updated successfully.';
                header('Location: ' . BASEURL . '/laporan');
            } else {
                $_SESSION['error'] = 'Failed to update laporan.';
                header('Location: ' . BASEURL . '/laporan/edit/' . $id_laporan);
            }
            exit;
        }
    }

    public function downloadInvoice($id_laporan) {
        // Ambil data laporan berdasarkan ID
        $laporan = $this->model('Laporan_model')->getLaporanWithUserDetails($id_laporan);
    
        // Periksa apakah data laporan ditemukan
        if (!$laporan) {
            die('Laporan tidak ditemukan.'); // Berikan pesan error jika data tidak ada
        }
    
        // Load HTML template dengan data laporan
        ob_start();
        $laporan_data = $laporan; // Kirim data laporan ke template
        include APPROOT . '/views/laporan/invoice_template.php'; // Ganti path sesuai struktur project
        $html = ob_get_clean();
    
        // Debugging untuk memastikan HTML yang dihasilkan
        // header('Content-Type: text/plain');
        // echo $html;
        // die();
    
    
    
        $options = new Options();
        $options->set('defaultFont', 'Arial');          // Atur font default
        $options->set('isHtml5ParserEnabled', true);    // Parser HTML5
        $options->set('isRemoteEnabled', true);         // Izinkan gambar atau resource eksternal
    
        $dompdf = new Dompdf($options);
    
        try {
            $dompdf->loadHtml($html);                  // Muat HTML
            $dompdf->setPaper('A4', 'portrait');       // Atur ukuran kertas dan orientasi
            $dompdf->render();                         // Render PDF
        } catch (Exception $e) {
            die('Error rendering PDF: ' . $e->getMessage()); // Tangkap error jika ada
        }
    
        // Kirim file PDF untuk di-download
        $fileName = 'invoice_' . $laporan['id_laporan'] . '.pdf';
        $dompdf->stream($fileName, ['Attachment' => true]); // Attachment true untuk unduhan
    }
    
}
