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
                <td><?= htmlspecialchars($laporan['name']); ?></td>
                <td><?= htmlspecialchars($laporan['role']); ?></td>
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
                        <a href="<?= BASEURL ?>/laporan/delete/<?= $laporan['id_laporan'] ?>" class="btn btn-danger" aria-label="Delete Laporan" onclick="return confirm('Are you sure you want to delete this item?');">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
