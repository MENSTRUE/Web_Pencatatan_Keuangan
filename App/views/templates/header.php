<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Gaya khusus untuk sidebar */
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

        .content-wrapper {
            margin-left: 250px;
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
            max-width: 900px; /* Lebar landscape */
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Header dan Footer Receipt */
        .receipt-header, .receipt-footer {
            text-align: center;
        }

        /* Styling untuk setiap item receipt */
        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px; /* Menambah jarak antar item */
            font-size: 1.1rem; /* Ukuran font yang lebih besar */
        }

        .receipt-item span {
            font-weight: bold;
        }

        .receipt-item strong {
            text-align: right;
        }

        .receipt-footer p {
            margin-top: 20px;
            color: #28a745;
            font-weight: bold;
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
            <?php endif; ?>
            <a href="<?= BASEURL; ?>/login/logout">Logout</a>
        <?php else: ?>
            <a href="<?= BASEURL; ?>/login">Login</a>
        <?php endif; ?>

    </div>
