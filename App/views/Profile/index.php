<div class="container mt-5">
    <h2 class="text-center mb-4">Profil Saya</h2>
    <?php if ($data['user']): ?>
        <!-- Card Container -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Profil Image (Left) -->
                    <div class="col-md-3 text-center">
                        <?php if ($data['user']['profile_picture']): ?>
                            <img src="<?= BASEURL . '/' . $data['user']['profile_picture']; ?>" alt="Foto Profil" class="rounded-circle img-fluid" width="150" height="150">
                        <?php else: ?>
                            <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center mx-auto" style="width: 150px; height: 150px;">
                                <span class="fs-3">?</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Profil Info (Right) -->
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label text-muted small">Nama</label>
                            <p class="h5"><?= $data['user']['name']; ?></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted small">Email</label>
                            <p class="h5"><?= $data['user']['email']; ?></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted small">Alamat</label>
                            <p class="h5"><?= $data['user']['alamat']; ?></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted small">Nomor Telepon</label>
                            <p class="h5"><?= $data['user']['nomor_telepon']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button Section (outside card) -->
        <div class="mt-4 text-center">
            <a href="<?= BASEURL; ?>/profile/edit" class="btn btn-primary btn-lg me-2">
                <i class="fas fa-edit me-2"></i>Edit Profil
            </a>
            <a href="<?= BASEURL; ?>/dasboard" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>Data profil belum diinput.
        </div>
    <?php endif; ?>
</div>