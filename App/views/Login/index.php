<form action="<?= BASEURL; ?>/login/authenticate" method="POST" style="padding: 30px;" class="content-wrapper">
    <h2>Login</h2>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
        <div class="alert alert-danger">
            Email, password, or role invalid.
        </div>
    <?php endif; ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
