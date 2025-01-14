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
    
    
    
    

    public function update() {
        if ($this->model('Laporan_model')->updateLaporan($_POST) > 0) {
            Flasher::setFlash('success', 'Data berhasil diupdate');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            Flasher::setFlash('danger', 'Data gagal diupdate');
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }
    
    
    
}
