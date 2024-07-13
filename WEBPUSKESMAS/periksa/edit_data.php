<?php
session_start();

require_once('../dbkoneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $paramedik_id = $_POST['paramedik_id'];

    // Query untuk update data pasien berdasarkan ID
    $query = "UPDATE periksa SET tanggal = :tanggal, berat = :berat, tinggi = :tinggi, tensi = :tensi, keterangan = :keterangan, pasien_id = :pasien_id, paramedik_id = :paramedik_id WHERE id = :id";

    // Persiapkan statement
    $stmt = $dbh->prepare($query);

    // Bind parameter
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':berat', $berat);
    $stmt->bindParam(':tinggi', $tinggi);
    $stmt->bindParam(':tensi', $tensi);
    $stmt->bindParam(':keterangan', $keterangan);
    $stmt->bindParam(':pasien_id', $pasien_id);
    $stmt->bindParam(':paramedik_id', $paramedik_id);
    
    // Jalankan statement
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman data pasien
        header("Location: ../dataperiksa.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengedit data periksa.";
    }
}
?>