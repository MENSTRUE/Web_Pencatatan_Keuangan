<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL; ?>/create/store" method="POST" style="padding-left: 30px" class="content-wrapper";>
  <fieldset>
    <legend>Silahkan isi formulir laporan</legend>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select id="category" name="category" class="form-select" required>
        <option value="">-- Pilih kategori --</option>
        <option value="Operasional">Operasional</option>
        <option value="Inventasi">Inventasi</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Transaksi type</label>
      <select id=" type" name="type" class="form-select" required>
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
      <label for="creted_at" class="form-label">Date</label>
      <input type="date" id="creted_at" name="creted_at" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
