-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 01:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pencatatan_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id_laporan` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `amount_approved` decimal(20,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `log_created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id_laporan`, `name`, `user_id`, `category`, `type`, `amount`, `amount_approved`, `description`, `status`, `created_at`, `updated_at`, `action`, `log_created_at`) VALUES
(43, 'zahra', 24, 'Investasi', 'Pemasukan', 1000000000.00, NULL, 'uang masuk', 'pending', '2025-02-05 00:00:00', '2025-02-05 00:00:00', 'create', '2025-02-05 13:22:33'),
(43, NULL, 24, 'Investasi', 'Pemasukan', 1000000000.00, NULL, 'uang masuk', 'pending', '2025-02-05 00:00:00', '2025-02-05 00:00:00', 'before_update', '2025-02-05 13:27:42'),
(43, NULL, 24, 'Inventasi', 'Pemasukan', 1000000000.00, 1000000000.00, 'uang masuk', 'approved', '2025-02-05 00:00:00', '2025-02-05 00:00:00', 'after_update', '2025-02-05 13:27:42'),
(32, NULL, 24, 'Operasional', 'Pemasukan', 30000000.00, 30000000.00, 'penjualan product', 'approved', '2025-01-21 00:00:00', '2025-01-21 00:00:00', 'delete', '2025-02-07 13:27:51'),
(26, NULL, 24, 'Inventasi', 'Pengeluaran', 300000000.00, 300000000.00, 'laba penghasilan', 'approved', '2025-01-18 00:00:00', '2025-01-27 00:00:00', 'before_update', '2025-02-07 13:28:05'),
(26, NULL, 24, 'Inventasi', 'Pengeluaran', 300000000.00, 300000000.00, 'laba penghasilan', 'disapproved', '2025-01-18 00:00:00', '2025-02-07 00:00:00', 'after_update', '2025-02-07 13:28:05'),
(26, NULL, 24, 'Inventasi', 'Pengeluaran', 300000000.00, 300000000.00, 'laba penghasilan', 'disapproved', '2025-01-18 00:00:00', '2025-02-07 00:00:00', 'before_update', '2025-02-07 13:28:21'),
(26, NULL, 24, 'Inventasi', 'Pengeluaran', 300000000.00, 0.00, 'laba penghasilan', 'disapproved', '2025-01-18 00:00:00', '2025-02-07 00:00:00', 'after_update', '2025-02-07 13:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `amount_approved` int(100) DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `user_id`, `category`, `type`, `amount`, `amount_approved`, `description`, `status`, `created_at`, `updated_at`) VALUES
(18, 25, 'Operasional', 'Pengeluaran', 200000000, 150000000, 'persiapan acara', 'approved', '2025-01-15', '2025-02-01'),
(20, 27, 'Operasional', 'Pemasukan', 400000000, 0, 'hasil penjualan product', 'disapproved', '2025-01-15', '2025-01-15'),
(24, 24, 'Inventasi', 'Pengeluaran', 300000, 300000, 'other', 'approved', '2025-01-18', '2025-01-18'),
(25, 27, 'Inventasi', 'Pemasukan', 40000000, 0, 'anime project', 'disapproved', '2025-01-18', '2025-01-18'),
(26, 24, 'Inventasi', 'Pengeluaran', 300000000, 0, 'laba penghasilan', 'disapproved', '2025-01-18', '2025-02-07'),
(27, 26, 'Inventasi', 'Pengeluaran', 40000000, 40000000, 'collab hxh', 'approved', '2025-01-18', '2025-01-27'),
(28, 26, 'Inventasi', 'Pengeluaran', 700000000, 700000000, 'collab naruto', 'approved', '2025-01-18', '2025-01-27'),
(29, 29, 'Inventasi', 'Pemasukan', 900000000, 900000000, 'admin menang taruhan', 'approved', '2025-01-19', '2025-01-19'),
(30, 29, 'Inventasi', 'Pemasukan', 600000000, 600000000, 'keuntungan', 'approved', '2025-01-19', '2025-01-19'),
(31, 24, 'Inventasi', 'Pemasukan', 10000, 0, 'coba 3', 'disapproved', '2025-01-21', '2025-01-27'),
(33, 24, 'Operasional', 'Pengeluaran', 400000000, 400000000, 'uang bulanan', 'approved', '2025-01-27', '2025-01-27'),
(35, 24, 'Operasional', 'Pemasukan', 70000000, 70000000, 'anggaran', 'approved', '2025-01-30', '2025-02-01'),
(37, 24, 'Inventasi', 'Pengeluaran', 1000000, 1000000, 'cukai', 'approved', '2025-01-30', '2025-02-05'),
(41, 24, 'Inventasi', 'Pengeluaran', 60000000, 60000000, 'uang ', 'approved', '2025-02-05', '2025-02-05'),
(42, 24, 'Inventasi', 'Pengeluaran', 800000, 800000, 'uang', 'approved', '2025-02-05', '2025-02-05'),
(43, 24, 'Inventasi', 'Pemasukan', 1000000000, 1000000000, 'uang masuk', 'approved', '2025-02-05', '2025-02-05');

--
-- Triggers `laporan`
--
DELIMITER $$
CREATE TRIGGER `after_delete_laporan` AFTER DELETE ON `laporan` FOR EACH ROW BEGIN
    INSERT INTO activity_logs (
        id_laporan, 
        user_id, 
        category, 
        type, 
        amount, 
        amount_approved, 
        description, 
        status, 
        created_at, 
        updated_at, 
        action
    )
    VALUES (
        OLD.id_laporan, 
        OLD.user_id, 
        OLD.category, 
        OLD.type, 
        OLD.amount, 
        OLD.amount_approved, 
        OLD.description, 
        OLD.status, 
        OLD.created_at, 
        OLD.updated_at, 
        'delete'
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_laporan` AFTER INSERT ON `laporan` FOR EACH ROW BEGIN
    INSERT INTO activity_logs (
        id_laporan, 
        user_id, 
        category, 
        type, 
        amount, 
        amount_approved, 
        description, 
        status, 
        created_at, 
        updated_at, 
        action
    )
    VALUES (
        NEW.id_laporan, 
        NEW.user_id, 
        NEW.category, 
        NEW.type, 
        NEW.amount, 
        NEW.amount_approved, 
        NEW.description, 
        NEW.status, 
        NEW.created_at, 
        NEW.updated_at, 
        'create'
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_laporan` AFTER UPDATE ON `laporan` FOR EACH ROW BEGIN
    -- Log sebelum perubahan
    INSERT INTO activity_logs (
        id_laporan, 
        user_id, 
        category, 
        type, 
        amount, 
        amount_approved, 
        description, 
        status, 
        created_at, 
        updated_at, 
        action
    )
    VALUES (
        OLD.id_laporan, 
        OLD.user_id, 
        OLD.category, 
        OLD.type, 
        OLD.amount, 
        OLD.amount_approved, 
        OLD.description, 
        OLD.status, 
        OLD.created_at, 
        OLD.updated_at, 
        'before_update'
    );

    -- Log setelah perubahan
    INSERT INTO activity_logs (
        id_laporan, 
        user_id, 
        category, 
        type, 
        amount, 
        amount_approved, 
        description, 
        status, 
        created_at, 
        updated_at, 
        action
    )
    VALUES (
        NEW.id_laporan, 
        NEW.user_id, 
        NEW.category, 
        NEW.type, 
        NEW.amount, 
        NEW.amount_approved, 
        NEW.description, 
        NEW.status, 
        NEW.created_at, 
        NEW.updated_at, 
        'after_update'
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `profile_picture`, `alamat`, `nomor_telepon`) VALUES
(11, 'Wafa Bila', 'wafabila@gmail.com', '106db22e77f48ac9271320cd4b06f2cb', 'admin', '0000-00-00', '0000-00-00', 'img/profile_users/67a1cdfaf0f8d_451c603ae5082e384f57972511750c0d.jpg', 'jln. semangka rt 05 rw 02 desa pedagangan kec.dukuhwaru kab.tegal 52451', '082220989681'),
(24, 'zahra', 'zahra@gmail.com', '3b972fa77cc41309d88d22c169b01dc8', 'karyawan', '0000-00-00', '0000-00-00', 'img/profile_users/67a1c9ec7c4e9_a3d8cc3b298950cfaef1c2968f90e699.jpg', 'jln. semangka rt 05 rw 02 desa pedagangan kec.dukuhwaru kab.tegal 52451', '082220989681'),
(25, 'keny', 'ken@gmail.com', 'cfe57e292ee196533c22d25d717e65d8', 'karyawan', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(26, 'putra', 'putra@gmail.com', '21f1256217c52a6cdaa51f34bf1b4131', 'karyawan', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(27, 'ahmad', 'ahmad@gmail.com', '8de13959395270bf9d6819f818ab1a00', 'karyawan', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(29, 'sukiman', 'sukiman@gmail.com', '60195b2100fd89c380d4628d83556dae', 'karyawan', '0000-00-00', '0000-00-00', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
