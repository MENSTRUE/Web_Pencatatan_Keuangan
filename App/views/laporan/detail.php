<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="receipt">
    <div class="receipt-header">
        <h3>Detail Laporan</h3>
        <p><?= date('d-m-Y', strtotime($data['laporan']['created_at'])); ?></p>
    </div>
    <div class="receipt-body">
        <div class="receipt-item">
            <span>Name:</span>
            <strong><?= htmlspecialchars($data['laporan']['name']); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Role:</span>
            <strong><?= htmlspecialchars($data['laporan']['role']); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Category:</span>
            <strong><?= htmlspecialchars($data['laporan']['category']); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Amount:</span>
            <strong>Rp<?= number_format($data['laporan']['amount'], 0, ',', '.'); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Approved Amount:</span>
            <strong><?= !empty($data['laporan']['amount_approved']) ? 'Rp' . number_format($data['laporan']['amount_approved'], 0, ',', '.') : '-'; ?></strong>
        </div>
        <div class="receipt-item">
            <span>Type:</span>
            <strong><?= htmlspecialchars($data['laporan']['type']); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Description:</span>
            <strong><?= htmlspecialchars($data['laporan']['description']); ?></strong>
        </div>
        <div class="receipt-item">
            <span>Status:</span>
            <strong><?= htmlspecialchars($data['laporan']['status']); ?></strong>
        </div>
    </div>
    <div class="receipt-footer">
        <p>Thank you!</p>
    </div>
</div>
