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
        /* Style untuk Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 15px;
            height: 100vh;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
        }
        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
        }

        /* Style untuk konten utama */
        .content-wrapper {
            margin-left: 250px; /* Memberikan ruang untuk sidebar */
            padding: 20px 15px;
            box-sizing: border-box;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            table-layout: fixed;
            margin-left: 250px;
            padding: 20px 15px;
            box-sizing: border-box;
            margin-top: 20px;
        }

        /* Tampilan Receipt yang lebih lebar */
        .receipt {
            border: 1px solid #dee2e6;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            text-align: center;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .profile-card {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            text-align: left;
            background: #495057;
            color: white;
            padding: 15px;
            border-radius: 8px;
            width: 90%;
        }
        .profile-info {
            display: flex;
            align-items: center;
        }
        .profile-pic {
            width: 40px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile-text h3 {
            margin: 0;
            font-size: 1rem;
        }
        .profile-text p {
            margin: 0;
            font-size: 0.85rem;
            color: #ccc;
        }
        .profile-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .btn-transparent {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .btn-transparent:hover {
            color: #17a2b8;
        }

        .grid-container {
            display: flex;
            justify-content: space-between;
            gap: 10px; /* jarak antar elemen */
            flex-wrap: wrap; /* jika elemen terlalu besar, akan pindah ke baris berikutnya */
        }

        /* Responsif untuk layar kecil */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content-wrapper {
                margin-left: 200px;
            }
        }

        @media screen and (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content-wrapper {
                margin-left: 0;
            }
        }

    </style>
</head>
<body>
<div class="sidebar">
    <h2><?= isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></h2>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="<?= BASEURL; ?>/dasboard">Dasboard</a>
        <a href="<?= BASEURL; ?>/laporan">Laporan</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="<?= BASEURL; ?>/karyawan">Karyawan</a>
            <a href="<?= BASEURL; ?>/aktivitas_karyawan">Aktivitas karyawan</a>
        <?php endif; ?>
        
        <!-- Card Profil Pengguna -->
        <div class="profile-card">
            <div class="profile-info">
                <!-- Menampilkan gambar profil berdasarkan user_id -->
                <img src="<?=BASEURL;?>/<?= $_SESSION['profile_picture']; ?>"   class="profile-pic">
                <div class="profile-text">
                    <h3><?= $_SESSION['name']; ?></h3>
                    <p><?= $_SESSION['role']; ?></p>
                </div>
            </div>
            <div class="profile-actions">
                <a href="<?= BASEURL; ?>/profile/index" class="btn btn-transparent">Profile</a>
                <a href="<?= BASEURL; ?>/login/logout" class="btn btn-transparent">Logout</a>
            </div>
        </div>

    <?php else: ?>
        <a href="<?= BASEURL; ?>/login">Login</a>
    <?php endif; ?>
</div>

</body>
</html>
