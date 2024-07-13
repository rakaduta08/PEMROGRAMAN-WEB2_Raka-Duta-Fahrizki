<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <?php
session_start();

// Sertakan file koneksi ke database
require_once '../dbkoneksi.php';

// Periksa apakah ada data yang dikirimkan dari form edit
if(isset($_POST['edit_id'])) {
    // Tangkap data yang dikirimkan dari form edit
    $id = $_POST['edit_id'];
    $kode = $_POST['edit_kode'];
    $nama = $_POST['edit_nama'];
    $tmp_lahir = $_POST['edit_tmp_lahir'];
    $tgl_lahir = $_POST['edit_tgl_lahir'];
    $gender = $_POST['edit_gender'];
    $email = $_POST['edit_email'];
    $alamat = $_POST['edit_alamat'];
    $kelurahan_id = $_POST['edit_kelurahan_id'];

    // Buat query SQL untuk mengupdate data di database
    $sql = "UPDATE pasien 
            SET kode = :kode, 
                nama = :nama, 
                tmp_lahir = :tmp_lahir, 
                tgl_lahir = :tgl_lahir, 
                gender = :gender, 
                email = :email, 
                alamat = :alamat, 
                kelurahan_id = :kelurahan_id 
            WHERE id = :id";

    // Siapkan prepared statement
    $stmt = $dbh->prepare($sql);

    // Bind parameter ke prepared statement
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':tmp_lahir', $tmp_lahir);
    $stmt->bindParam(':tgl_lahir', $tgl_lahir);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':kelurahan_id', $kelurahan_id);
    $stmt->bindParam(':id', $id);

    // Eksekusi prepared statement
    if($stmt->execute()) {
        // Jika pengeditan berhasil, berikan tanggapan kepada pengguna
        header("Location: ../datapasien.php");
    } else {
        // Jika pengeditan gagal, berikan pesan error kepada pengguna
        echo "Error: " . $stmt->errorInfo()[2];
    }

    // Tutup prepared statement
    $stmt = null;
} else {
    // Jika tidak ada data yang dikirimkan dari form edit, berikan pesan kepada pengguna
    echo "Tidak ada data yang dikirimkan.";
}
?>
