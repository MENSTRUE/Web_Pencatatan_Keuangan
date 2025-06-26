<div class="container mt-5">
    <h2>Edit Profil Saya</h2>
    <?php if ($data['user']): ?>
        <form action="<?= BASEURL; ?>/profile/update" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" value="<?= $data['user']['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data['user']['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat"><?= $data['user']['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor_telepon" value="<?= $data['user']['nomor_telepon']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label><br>
                <?php if ($data['user']['profile_picture']): ?>
                    <img src="<?= BASEURL . '/' . $data['user']['profile_picture']; ?>" alt="Foto Profil" width="100">
                <?php endif; ?>
                <input type="file" class="form-control mt-2" name="profile_picture">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= BASEURL;?>/profile/index" class="btn btn-primary">Back</a>
        </form>
    <?php else: ?>
        <p>Data belum di input</p>
    <?php endif; ?>
</div>
