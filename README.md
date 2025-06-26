# Sistem Pencatatan Keuangan

---

**Fitur Utama:**

Aplikasi ini dirancang untuk membantu pengguna dalam mencatat dan mengelola keuangan mereka dengan mudah. Fitur-fitur yang tersedia meliputi:

* **Login Pengguna:** Akses aman ke sistem dengan email dan kata sandi.
* **Dasbor Interaktif:** Visualisasi data keuangan dengan grafik dan bagan untuk pemahaman yang lebih baik.
* **Manajemen Laporan Keuangan:** Pencatatan pemasukan dan pengeluaran, dengan kemampuan untuk melihat status persetujuan.
* **Manajemen Karyawan (Admin):** Khusus untuk peran admin, memungkinkan pengelolaan data karyawan (nama, email, peran).
* **Manajemen Aktivitas Karyawan (Admin):** Memantau riwayat aktivitas laporan keuangan yang dibuat oleh karyawan.
* **Profil Pengguna:** Mengelola informasi pribadi pengguna.

---

**Tampilan Antarmuka (UI):**

Berikut adalah gambaran umum tampilan antarmuka aplikasi:

1.  **Halaman Login:**
    * Tampilan login yang bersih dengan kolom `Email` dan `Password`.
    * Tombol `Login` untuk mengakses aplikasi.
    * ![Halaman Login](Screenshot%202025-06-26%20073534.png)

2.  **Dasbor Karyawan:**
    * Menampilkan grafik `Laporan Keuangan Per Bulan` (Pemasukan, Pengeluaran, Selisih).
    * Bagan `Perbandingan Jumlah Laporan` (Pemasukan vs. Pengeluaran).
    * Bagan `Distribusi Pemasukan` dan `Distribusi Pengeluaran`.
    * Navigasi samping untuk `Dasboard`, `Laporan`, `Profil`, dan `Logout`.
    * ![Dasbor Karyawan](Screenshot%202025-06-26%20073732.png)

3.  **Laporan Karyawan:**
    * Tabel yang menampilkan detail laporan keuangan: `Role`, `Category Name`, `Amount`, `Amount Approved`, `Transaction Type`, `Description`, `Status`, `Created At`, dan `Actions` (lihat, edit, hapus).
    * ![Laporan Karyawan](Screenshot%202025-06-26%20073747.png)

4.  **Profil Karyawan:**
    * Menampilkan informasi pribadi pengguna: `Nama`, `Email`, `Alamat`, dan `Nomor Telepon`.
    * Tombol `Edit Profil` dan `Kembali`.
    * ![Profil Karyawan](Screenshot%202025-06-26%20073759.png)

5.  **Manajemen Karyawan (Admin):**
    * Tabel daftar karyawan dengan `No`, `Name`, `Email`, `Role`, dan `Actions` (edit, hapus).
    * Tombol `Create` untuk menambah karyawan baru.
    * Navigasi samping untuk `Dasboard`, `Laporan`, `Karyawan`, `Aktivitas karyawan`, `Profil`, dan `Logout`.
    * ![Manajemen Karyawan (Admin)](Screenshot%202025-06-26%20074233.png)

6.  **Aktivitas Karyawan (Admin):**
    * Tabel yang menampilkan log aktivitas laporan dengan `User ID`, `ID Laporan`, `Category`, `Type`, `Amount`, `Amount Approved`, `Description`, `Status`, `Created At`, dan `Updated At`.
    * ![Aktivitas Karyawan (Admin) - Detail](Screenshot%202025-06-26%20074253.png)
    * Tabel yang menampilkan log aktivitas laporan dengan `Role`, `Category Name`, `Amount`, `Amount Approved`, `Transaction Type`, `Description`, `Status`, `Created At`, dan `Actions` (lihat, edit, hapus).
    * ![Aktivitas Karyawan (Admin) - Ringkasan](Screenshot%202025-06-26%20074306.png)

---

**Cara Menjalankan Aplikasi:**

Untuk menjalankan aplikasi ini di lingkungan lokal Anda, ikuti langkah-langkah berikut:

1.  **Instal XAMPP:**
    * Pastikan Anda telah menginstal XAMPP di komputer Anda. XAMPP menyediakan Apache (web server) dan MySQL (database) yang diperlukan.
    * Aktifkan `Apache` dan `MySQL` dari panel kontrol XAMPP.

2.  **Siapkan Basis Data:**
    * Buat basis data MySQL yang diperlukan oleh aplikasi. (Detail skema basis data tidak disediakan, namun asumsi Anda sudah memiliki skema yang siap).

3.  **Unduh dan Ekstrak Aplikasi:**
    * Asumsikan file aplikasi Anda berada di direktori `aplikasi_web_sistem_pencatatan_keuangan`.
    * Pindahkan seluruh folder `aplikasi_web_sistem_pencatatan_keuangan` ke dalam direktori `htdocs` di instalasi XAMPP Anda. Contoh: `C:\xampp\htdocs\aplikasi_web_sistem_pencatatan_keuangan`.

4.  **Instal Ekstensi Live Server VS Code:**
    * Buka VS Code.
    * Pergi ke bagian `Extensions` (Ctrl+Shift+X atau klik ikon Extensions di sidebar).
    * Cari "Live Server" dan instal ekstensi yang dibuat oleh Ritwick Dey.

5.  **Akses Aplikasi:**
    * Buka browser web Anda.
    * Akses aplikasi melalui URL berikut:
        `http://localhost/aplikasi_web_sistem_pencatatan_keuangan/public/index`

    * Anda seharusnya akan melihat halaman login aplikasi.
