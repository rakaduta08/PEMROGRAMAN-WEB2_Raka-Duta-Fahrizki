<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <?php
require_once("../dbkoneksi.php");

// Pastikan parameter id telah diterima
if(isset($_GET['id']) && isset($_GET['delete'])) {
    // Tangkap nilai id dari parameter GET
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM paramedik WHERE id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman data paramedik
        header("Location: ../dataparamedik.php");
    } else {
        // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
        echo "<p><font color='red'>Failed to delete data.</font></p>";
    }
} else {
    // Jika parameter id tidak diterima, tampilkan pesan error
    echo "<p><font color='red'>Invalid request.</font></p>";
}
?>
