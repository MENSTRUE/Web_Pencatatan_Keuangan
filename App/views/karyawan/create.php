<?php require_once '../app/views/templates/header.php'; ?>

<form action="<?= BASEURL; ?>/karyawan/store" method="POST" style="padding-left: 30px" class="content-wrapper">
  <fieldset>
    <legend>Silahkan isi formulir karyawan</legend>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select id="role" name="role" class="form-select" required>
        <option value="karyawan">Karyawan</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="<?= BASEURL; ?>/karyawan" class="btn btn-secondary" style="margin-left: 10px;">Back</a>
  </fieldset>
</form>
