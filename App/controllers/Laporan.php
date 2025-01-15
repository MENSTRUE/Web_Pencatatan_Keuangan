<?php

class Laporan extends Controller {

    public function index() {
        $data['judul'] = 'Laporan';
        $data['laporan'] = $this->model('Create_model')->getAllLaporan();

        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id_laporan) {
        $data['title'] = 'Edit Laporan';
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

    public function detail($id_laporan)
        {
            $laporan = $this->model('Laporan_model')->getById($id_laporan);

            if (!$laporan) {
                die('Laporan tidak ditemukan.'); // Berikan pesan error jika data tidak ada
            }

            $this->view('templates/header');
            $this->view('laporan/detail', ['laporan' => $laporan]);
            $this->view('templates/footer');

        }
    
    
    
    

    public function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_laporan = $_POST['id_laporan'];
        $amount_approved = $_POST['amount_approved'] ?? null;
        $action = $_POST['action'] ?? '';

        if ($_SESSION['role'] === 'admin' && $action === 'approve' && empty($amount_approved)) {
            // Redirect kembali dengan pesan error jika amount_approved kosong
            $_SESSION['error'] = 'Amount Approved is required when approving.';
            header('Location: ' . BASEURL . '/laporan/edit/' . $id_laporan);
            exit;
        }

        // Data untuk update laporan
        $data = [
            'id_laporan' => $id_laporan,
            'category' => $_POST['category'],
            'type' => $_POST['type'],
            'amount' => $_POST['amount'],
            'description' => $_POST['description'],
            'updated_at' => $_POST['updated_at'],
            'amount_approved' => $amount_approved,
            'status' => $action === 'approve' ? 'approved' : 'pending',
        ];

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

    }
    
    
    

