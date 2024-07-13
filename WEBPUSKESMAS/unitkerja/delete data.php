<?php
session_start();
require_once('../dbkoneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Ambil ID pasien yang akan dihapus dari parameter URL
    $id = $_GET['id'];

    try {
        // Mulai transaksi
        $dbh->beginTransaction();

        // Query untuk menghapus data pasien berdasarkan ID
        $query = "DELETE FROM unit_kerja WHERE id = :id";

        // Persiapkan statement
        $stmt = $dbh->prepare($query);

        // Bind parameter
        $stmt->bindParam(':id', $id);

        // Jalankan statement
        if ($stmt->execute()) {
            // Commit transaksi jika berhasil
            $dbh->commit();

            // Jika berhasil, redirect kembali ke halaman data pasien
            header("Location: ../data_unitkerja.php");
            exit();
        } else {
            // Jika gagal, rollback transaksi dan tampilkan pesan error
            $dbh->rollBack();
            echo "Gagal menghapus data pasien.";
        }
    } catch (PDOException $e) {
        // Rollback transaksi dan tampilkan pesan error
        $dbh->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    // Jika tidak ada ID yang dikirimkan, redirect ke halaman data pasien
    header("Location: ../data_unitkerja.php");
    exit();
}
?>