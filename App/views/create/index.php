<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL; ?>/create/store" method="POST" style="padding-left: 30px" class="content-wrapper" onsubmit="return showPopup();">
  <fieldset>
    <legend>Silahkan isi formulir laporan</legend>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select id="category" name="category" class="form-select" required>
        <option value="">-- Pilih kategori --</option>
        <option value="Operasional">Operasional</option>
        <option value="Investasi">Investasi</option> <!-- Perbaikan typo "Inventasi" -->
      </select>
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Transaksi type</label>
      <select id="type" name="type" class="form-select" required>
        <option value="">-- Jenis Transaksi --</option>
        <option value="Pengeluaran">Pengeluaran</option>
        <option value="Pemasukan">Pemasukan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="amount" class="form-label">Amount</label>
      <input type="number" id="amount" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="created_at" class="form-label">Date</label>
      <input type="date" id="created_at" name="created_at" class="form-control" required> <!-- Perbaikan typo "creted_at" -->
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
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
    <p style="font-size: 20px; font-weight: bold;">Form berhasil dikirim!</p>
    <button onclick="redirectToLaporan()" class="btn-ok">OK</button>
  </div>
</div>

<script>
  function showPopup() {
    setTimeout(() => {
      document.getElementById('popup-container').style.display = 'block';
    }, 500); // Tampilkan popup setelah form dikirim (bisa diatur delay-nya)
    return true; // Biarkan form tetap terkirim
  }

  function redirectToLaporan() {
    window.location.href = "<?= BASEURL; ?>/laporan";
  }
</script>
