<div class="content-wrapper">
    <div class="receipt" style="max-width: 600px; margin: 0 auto; border: 1px solid #dee2e6; border-radius: 5px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">
        <div class="receipt-header">
            <h3 style="margin-bottom: 10px;">Detail Laporan</h3>
            <p style="color: #6c757d; font-size: 0.9rem;">
                <?= date('d-m-Y', strtotime($data['laporan']['created_at'])); ?>
            </p>
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
                <strong>
                    <?= !empty($data['laporan']['amount_approved']) ? 'Rp' . number_format($data['laporan']['amount_approved'], 0, ',', '.') : '-'; ?>
                </strong>
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
            <?php if ($data['laporan']['status'] === 'approved'): ?>
                <p style="margin-top: 20px; color: #28a745; font-weight: bold;">Transaksi Disetujui</p>
            <?php elseif ($data['laporan']['status'] === 'disapproved'): ?>
                <p style="margin-top: 20px; color: #dc3545; font-weight: bold;">Transaksi Tidak Disetujui</p>
            <?php endif; ?>
        </div>
        <!-- Tombol Back ke Laporan -->
        <div class="text-center">
            <a href="<?= BASEURL; ?>/laporan" class="btn btn-primary" style="margin-top: 20px;">Back to Laporan</a>
            <!-- <a href="<?= BASEURL; ?>/laporan/downloadInvoice/<?= $laporan['id_laporan']; ?>" class="btn btn-success" style="margin-top: 20px;">Download Invoice</a> -->

        </div>
        
    </div>
</div>
z