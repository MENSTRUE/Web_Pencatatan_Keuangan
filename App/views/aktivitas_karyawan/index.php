<div class="content-wrapper">
    <h3>Aktivitas Karyawan</h3>
</div>
<table class="table">
    <thead>
        <tr class="table-primary">
            <th>Name</th>
            <th>Action</th>
            <th>User ID</th>
            <th>ID Laporan</th>
            <th>Category</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Amount Approved</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['logs'] as $log): ?>
            <tr>
                <td><?= $log['name'] ?? '-'; ?></td>
                <td><?= $log['action'] ?? '-'; ?></td>
                <td><?= $log['user_id'] ?? '-'; ?></td>
                <td><?= $log['id_laporan'] ?? '-'; ?></td>
                <td><?= $log['category'] ?? '-'; ?></td>
                <td><?= $log['type'] ?? '-'; ?></td>
                <td><?= $log['amount'] ?? '-'; ?></td>
                <td><?= $log['amount_approved'] ?? '-'; ?></td>
                <td><?= $log['description'] ?? '-'; ?></td>
                <td><?= $log['status'] ?? '-'; ?></td>
                <td><?= $log['created_at'] ?? '-'; ?></td>
                <td><?= $log['updated_at'] ?? '-'; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
