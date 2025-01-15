<?php
// Memulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil role pengguna dari session
$userRole = $_SESSION['role'] ?? 'guest'; // Default ke 'guest' jika tidak ada session
?>

<div class="content-wrapper">
    <button type="button" class="btn btn-primary">
        <a href="<?= BASEURL; ?>/karyawan/create" style="color: white; text-decoration: none;">Create</a>
    </button>
</div>

<table class="table">
    <thead>
        <tr class="table-primary">
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Created At</th>
            <th scope="col" class="d-flex gap-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data['karyawan'] as $karyawan): ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= htmlspecialchars($karyawan['name']); ?></td>
                <td><?= htmlspecialchars($karyawan['email']); ?></td>
                <td><?= htmlspecialchars($karyawan['role']); ?></td>
                <td><?= htmlspecialchars($karyawan['created_at']); ?></td>
                <td class="d-flex gap-2">
                    <a href="<?= BASEURL ?>/karyawan/edit/<?= $karyawan['user_id']; ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= BASEURL ?>/karyawan/delete/<?= $karyawan['user_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
