<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL; ?>/laporan/update" method="POST" style="padding-left: 30px" class="content-wrapper" onsubmit="showPopup(event);">
  <fieldset>
    <legend>Edit Formulir Laporan</legend>

    <!-- Menampilkan Pesan Error -->
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Hidden Input for ID -->
    <input type="hidden" name="id_laporan" value="<?= $data['laporan']['id_laporan']; ?>">

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select id="category" name="category" class="form-select" required>
        <option value="">-- Pilih kategori --</option>
        <option value="Operasional" <?= $data['laporan']['category'] == 'Operasional' ? 'selected' : ''; ?>>Operasional</option>
        <option value="Inventasi" <?= $data['laporan']['category'] == 'Inventasi' ? 'selected' : ''; ?>>Inventasi</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Transaksi Type</label>
      <select id="type" name="type" class="form-select" required>
        <option value="">-- Jenis Transaksi --</option>
        <option value="Pengeluaran" <?= $data['laporan']['type'] == 'Pengeluaran' ? 'selected' : ''; ?>>Pengeluaran</option>
        <option value="Pemasukan" <?= $data['laporan']['type'] == 'Pemasukan' ? 'selected' : ''; ?>>Pemasukan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="amount" class="form-label">Amount</label>
      <input type="number" id="amount" name="amount" class="form-control" value="<?= $data['laporan']['amount']; ?>" required>
    </div>

    <div class="mb-3">
      <label for="updated_at" class="form-label">Date</label>
      <input type="date" id="updated_at" name="updated_at" class="form-control" value="<?= $data['laporan']['updated_at']; ?>" required>
    </div>

    <?php if ($_SESSION['role'] === 'admin'): // Hanya untuk admin ?>
        <div class="mb-3">
          <label for="amount_approved" class="form-label">Amount Approved</label>
          <input type="number" id="amount_approved" name="amount_approved" class="form-control" 
                value="<?= $data['laporan']['amount_approved'] ?? ''; ?>">
        </div>

        <!-- Tombol untuk Admin: Approve dan Disapprove -->
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select id="status" name="status" class="form-select" required>
            <option value="approved" <?= $data['laporan']['status'] == 'approved' ? 'selected' : ''; ?>>Approve</option>
            <option value="disapproved" <?= $data['laporan']['status'] == 'disapproved' ? 'selected' : ''; ?>>Disapprove</option>
          </select>
        </div>
    <?php endif; ?>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea id="description" name="description" class="form-control" rows="3" required><?= $data['laporan']['description']; ?></textarea>
    </div>

    <!-- Tombol Back -->
    <a href="<?= BASEURL; ?>/laporan" class="btn btn-secondary">Back</a>

    <button type="submit" class="btn btn-primary">Update</button>
    
  </fieldset>
</form>

<div id="popup-container" class="popup" style="display: none;">
  <div class="popup-content">
    <div class="check-icon">
      <div class="circle">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" stroke="#4CAF50" stroke-width="2" fill="none"/>
          <path d="M8 12l2 2 4-4" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
      </div>
    </div>
    <p style="font-size: 20px; font-weight: bold;">Data telah diperbarui!</p>
    <button onclick="redirectToLaporan()" class="btn-ok">OK</button>
  </div>
</div>

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

  .check-icon .circle {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
  }

  .btn-ok {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 10px;
  }

  .btn-ok:hover {
    background-color: #388E3C;
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

<script>
  function showPopup(event) {
    event.preventDefault();  // Mencegah pengiriman form
    // Menambahkan overlay dan menampilkan popup
    document.body.insertAdjacentHTML('beforeend', '<div class="overlay"></div>');
    document.getElementById('popup-container').style.display = 'block';
    document.body.classList.add('overlay-active');

    // Setelah popup tampil, baru kirim form
    setTimeout(function() {
      event.target.submit();  // Kirim form setelah pop-up ditampilkan
    }, 1000);  // Delay sedikit untuk memastikan popup tampil terlebih dahulu
  }

  function redirectToLaporan() {
    window.location.href = "<?= BASEURL; ?>/laporan";
  }
</script>

