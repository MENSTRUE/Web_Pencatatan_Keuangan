<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL; ?>/laporan/update" method="POST" style="padding-left: 30px" class="content-wrapper";>
  <fieldset>
    <legend>Edit Formulir Laporan</legend>

    <!-- Hidden Input for ID -->
    <input type="hidden" name="id_laporan" value="<?= $data['laporan']['id_laporan']; ?>">

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select id="category" name="category" class="form-select" required>
        <option value="">-- Pilih kategori --</option>
        <option value="Operasional" <?= $data['laporan']['category'] == 'Operasional' ? 'selected' : ''; ?>>Operasional</option>
        <option value="Inventasi" <?= $data['laporan']['category'] == 'Inventasi' ? 'selected' : ''; ?>>Investasi</option>
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
      <label for="description" class="form-label">Description</label>
      <textarea id="description" name="description" class="form-control" rows="3" required><?= $data['laporan']['description']; ?></textarea>
    </div>

    <div class="mb-3">
      <label for="updated_at" class="form-label">Date</label>
      <input type="date" id="updated_at" name="updated_at" class="form-control" value="<?= $data['laporan']['updated_at']; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </fieldset>
</form>

