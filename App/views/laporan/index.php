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
                <td><?= htmlspecialchars($laporan['status']); ?></td>
                <td><?= htmlspecialchars($laporan['created_at']); ?></td>
                <td>
                <a href="<?= BASEURL ?>/laporan/edit/<?= $laporan['id_laporan']; ?>" class="btn btn-warning" aria-label="Edit Laporan">Edit</a>
                <a href="<?= BASEURL ?>/laporan/delete/" class="btn btn-danger" aria-label="Delete Laporan" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
