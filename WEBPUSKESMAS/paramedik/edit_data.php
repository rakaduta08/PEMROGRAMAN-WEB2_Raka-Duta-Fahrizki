<?php
session_start();

// Sertakan file koneksi ke database
require_once '../dbkoneksi.php';

// Periksa apakah ada data yang dikirimkan dari form edit
if(isset($_POST['edit_id'])) {
    // Tangkap data yang dikirimkan dari form edit
    $id = $_POST['edit_id'];
    $nama = $_POST['edit_nama'];
    $gender = $_POST['edit_gender'];
    $tmp_lahir = $_POST['edit_tmp_lahir'];
    $tgl_lahir = $_POST['edit_tgl_lahir'];
    $kategori = $_POST['edit_kategori'];
    $telpon = $_POST['edit_telepon'];
    $alamat = $_POST['edit_alamat'];
    $unit_kerja_id = $_POST['edit_unit_kerja_id'];

    // Buat query SQL untuk mengupdate data di database
    $sql = "UPDATE paramedik 
            SET nama = :nama, 
                gender = :gender, 
                tmp_lahir = :tmp_lahir, 
                tgl_lahir = :tgl_lahir, 
                kategori = :kategori, 
                telpon = :telpon, 
                alamat = :alamat, 
                unit_kerja_id = :unit_kerja_id 
            WHERE id = :id";

    try {
        // Siapkan prepared statement
        $stmt = $dbh->prepare($sql);

        // Bind parameter ke prepared statement
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':tmp_lahir', $tmp_lahir);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':telpon', $telpon);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':unit_kerja_id', $unit_kerja_id);

        // Eksekusi prepared statement
        if($stmt->execute()) {
            // Jika pengeditan berhasil, berikan tanggapan kepada pengguna
            header("Location: ../dataparamedik.php");
        } else {
            // Jika pengeditan gagal, berikan pesan error kepada pengguna
            echo "Error: Gagal mengupdate data.";
        }
    } catch (PDOException $e) {
        // Tangani error jika terjadi
        echo "Error: " . $e->getMessage();
    }

    // Tutup prepared statement
    $stmt = null;
} else {
    // Jika tidak ada data yang dikirimkan dari form edit, berikan pesan kepada pengguna
    echo "Tidak ada data yang dikirimkan.";
}
?>
