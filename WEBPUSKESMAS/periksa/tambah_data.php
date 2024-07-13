<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    
<?php
require_once("../dbkoneksi.php");

// Pastikan tombol submit telah ditekan
if(isset($_POST['submit'])) {
    // Tangkap nilai-nilai yang dikirimkan melalui form tambah data
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $paramedik_id = $_POST['paramedik_id'];

    // Query untuk menambahkan data ke dalam tabel periksa
    $query = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, paramedik_id) VALUES (:tanggal, :berat, :tinggi, :tensi, :keterangan, :pasien_id, :paramedik_id)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':berat', $berat);
    $stmt->bindParam(':tinggi', $tinggi);
    $stmt->bindParam(':tensi', $tensi);
    $stmt->bindParam(':keterangan', $keterangan);
    $stmt->bindParam(':pasien_id', $pasien_id);
    $stmt->bindParam(':paramedik_id', $paramedik_id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika penambahan berhasil, arahkan kembali ke halaman data periksa
        header("Location: ../dataperiksa.php");
    } else {
        // Jika terjadi kesalahan saat menambahkan data, tampilkan pesan error
        echo "<p><font color='red'>Failed to add data.</font></p>";
    }
} else {
    // Jika tombol submit tidak ditekan, tampilkan pesan error
    echo "<p><font color='red'>Invalid request.</font></p>";
}
?>
