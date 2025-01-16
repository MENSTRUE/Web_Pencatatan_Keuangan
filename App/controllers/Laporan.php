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
        

    }
    
    
    

