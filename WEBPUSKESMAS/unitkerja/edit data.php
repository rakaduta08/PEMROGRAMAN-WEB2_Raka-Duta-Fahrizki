<?php
session_start();
require_once('../dbkoneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    // Query untuk update data pasien berdasarkan ID
    $query = "UPDATE unit_kerja SET nama = :nama WHERE id = :id";

    // Persiapkan statement
    $stmt = $dbh->prepare($query);

    // Bind parameter
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);

    // Jalankan statement
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman data pasien
        header("Location: ../data_unitkerja.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengedit data pasien.";
    }
}
?>