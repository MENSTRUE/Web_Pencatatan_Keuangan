<?php
// Memulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil role pengguna dari session
$userRole = $_SESSION['role'] ?? 'guest'; // Default ke 'guest' jika tidak ada session

// Lanjutkan dengan logika lainnya atau include file view
?>

<div class="content-wrapper">
    <button type="button" class="btn btn-primary">
        <a href="<?= BASEURL; ?>/create/index" style="color: white; text-decoration: none;">Create</a>
    </button>
</div>

<table class="table">
    <thead>
        <tr class="table-primary">
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Category Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Amount Approved</th>
            <th scope="col">Transaction Type</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data['laporan'] as $laporan): ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= isset($laporan['name']) ? $laporan['name'] : 'Tidak Diketahui' ?></td>
                <td><?= isset($laporan['role']) ? $laporan['role'] : 'Tidak Diketahui' ?></td>
                <td><?= htmlspecialchars($laporan['category']); ?></td>
                <td><?= htmlspecialchars($laporan['amount']); ?></td>
                <td><?= htmlspecialchars($laporan['amount_approved'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($laporan['type']); ?></td>
                <td><?= htmlspecialchars($laporan['description']); ?></td>
                <td>
                    <!-- Status Berdasarkan amount_approved dan status -->
                    <?php if (!empty($laporan['amount_approved'])): ?>
                        <span class="badge bg-success">Approved</span>
                    <?php elseif ($laporan['status'] == 'pending'): ?>
                        <span class="badge bg-warning text-dark"><?= htmlspecialchars($laporan['status']); ?></span>
                    <?php elseif ($laporan['status'] == 'disapproved'): ?>
                        <span class="badge bg-danger">Disapproved</span>
                    <?php elseif ($laporan['amount_approved'] == 'Null' || $laporan['status'] == 'disapproved'): ?>
                        <span class="badge bg-danger">Disapproved</span>
                    <?php else: ?>
                        <span class="badge bg-secondary"><?= htmlspecialchars($laporan['status']); ?></span>
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($laporan['created_at']); ?></td>
                <td>
                    <a href="<?= BASEURL ?>/laporan/detail/<?= $laporan['id_laporan']; ?>" class="btn btn-info" aria-label="Detail Laporan">
                        <i class="fas fa-info-circle"></i>
                    </a>

                    <!-- Logika untuk akses tombol -->
                    <?php if ($userRole === 'admin' || empty($laporan['amount_approved'])): ?>
                        <a href="<?= BASEURL ?>/laporan/edit/<?= $laporan['id_laporan']; ?>" class="btn btn-warning" aria-label="Edit Laporan">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= BASEURL ?>/laporan/delete/<?= $laporan['id_laporan'] ?>" class="btn btn-danger" aria-label="Delete Laporan" onclick="showDeleteConfirmation(event, '<?= BASEURL ?>/laporan/delete/<?= $laporan['id_laporan'] ?>')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Pop-up Konfirmasi Hapus -->
<div id="delete-popup" class="popup" style="display: none;">
    <div class="popup-content">
        <!-- Lingkaran bolong dengan logo "!" ditengah -->
        <div class="check-icon">
            <svg width="90" height="90" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="11" stroke="#FFEB3B" stroke-width="2" fill="none"/>
                <text x="12" y="16" text-anchor="middle" font-size="24" font-weight="bold" fill="#FFEB3B" dy=".2em">!</text>
            </svg>
        </div>
        <p style="font-size: 18px; font-weight: bold; margin-top: 10px;">Apakah Anda yakin ingin menghapus data ini?</p>
        
        <!-- Tombol dalam satu baris -->
        <div style="display: flex; justify-content: space-between; width: 100%;">
            <button id="confirm-delete" class="btn btn-danger">Hapus</button>
            <button onclick="closeDeletePopup()" class="btn btn-secondary">Batal</button>
        </div>
    </div>
</div>

<!-- Style untuk Pop-up -->
<style>
    .popup {    
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        width: 300px;
        z-index: 1002;
    }

    .popup-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .check-icon {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .popup button {
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #FF5722;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #D32F2F;
    }

    .btn-secondary {
        background-color: #BDBDBD;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #757575;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        opacity: 1;
        z-index: 1001;
        pointer-events: none;
    }

    body.overlay-active .content-wrapper {
        pointer-events: none;
    }

    body.overlay-active .sidebar {
        pointer-events: none;
    }
</style>

<!-- JavaScript untuk Menampilkan dan Menyembunyikan Pop-up -->
<script>
    let deleteUrl = '';

    // Fungsi untuk menampilkan pop-up konfirmasi
    function showDeleteConfirmation(event, url) {
        event.preventDefault();  // Mencegah aksi default (tombol delete)
        deleteUrl = url;  // Menyimpan URL penghapusan
        document.getElementById('delete-popup').style.display = 'block';  // Menampilkan pop-up
        document.body.classList.add('overlay-active');  // Menampilkan overlay
    }

    // Fungsi untuk menutup pop-up
    function closeDeletePopup() {
        document.getElementById('delete-popup').style.display = 'none';  // Menyembunyikan pop-up
        document.body.classList.remove('overlay-active');  // Menghapus overlay
    }

    // Menyusun aksi untuk tombol 'Hapus' dalam pop-up
    document.getElementById('confirm-delete')?.addEventListener('click', function() {
        window.location.href = deleteUrl;  // Redirect ke URL penghapusan
    });
</script>
