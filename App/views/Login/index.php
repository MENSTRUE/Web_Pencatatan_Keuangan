<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://unsplash.com/photos/SLIFI67jv5k/download?ixid=M3wxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNzM4NjMyODAzfA&force=true&w=2400');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Overlay gelap */
        }
        .login-card {
            background: rgba(255, 255, 255, 0.9); /* Latar card semi-transparan */
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.5s ease-in-out;
            position: relative;
            z-index: 1;
        }
        .login-card.active {
            transform: scale(1);
            opacity: 1;
        }
        .login-card h2 {
            margin-bottom: 1.5rem;
            color: #333;
            text-align: center;
        }
        .login-card .form-control {
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease;
        }
        .login-card .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }
        .login-card .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #667eea;
            border: none;
            transition: background-color 0.3s ease;
        }
        .login-card .btn-primary:hover {
            background-color: #5a6fd1;
        }
        .login-card .alert {
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }
        .login-card .alert.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="login-card" id="loginCard">
        <h2>Login</h2>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
            <div class="alert alert-danger" id="errorAlert">
                Email, password, or role invalid.
            </div>
        <?php endif; ?>

        <form action="<?= BASEURL; ?>/login/authenticate" method="POST" id="loginForm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" id="loginButton">Login</button>
        </form>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            const loginCard = document.getElementById('loginCard');
            loginCard.classList.add('active');

            // Tampilkan alert error jika ada
            const errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                setTimeout(() => {
                    errorAlert.classList.add('show');
                }, 500);
            }
        });

        // Validasi form sebelum submit
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault(); // Hentikan submit
                alert('Email dan password harus diisi!');
            } else {
                // Animasi tombol saat diklik
                const loginButton = document.getElementById('loginButton');
                loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                loginButton.disabled = true;
            }
        });

        // Efek hover pada input
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>