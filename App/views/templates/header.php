<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><?= isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest'; ?></h2>
        <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= BASEURL; ?>/dasboard">Dasboard</a>
                <a href="<?= BASEURL; ?>/laporan">Laporan</a>
                <a href="<?= BASEURL; ?>/login/logout">Logout</a>
        <?php else: ?>
                <a href="<?= BASEURL; ?>/login">Login</a>
        <?php endif; ?>

    </div>
