<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL ?>/karyawan/update" method="POST" class="content-wrapper" style="padding-left: 30px;">
  <fieldset>
    <legend>Silahkan isi formulir karyawan</legend>

    <input type="hidden" name="user_id" value="<?= $data['karyawan']['user_id']; ?>">

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data['karyawan']['name']); ?>" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['karyawan']['email']); ?>" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($data['karyawan']['password']); ?>" required>
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select class="form-select" id="role" name="role" required>
        <option value="karyawan" <?= $data['karyawan']['role'] == 'karyawan' ? 'selected' : ''; ?>>Karyawan</option>
        <option value="admin" <?= $data['karyawan']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
      </select>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="margin-left: 10px;">Back</a>
  </fieldset>
</form>
