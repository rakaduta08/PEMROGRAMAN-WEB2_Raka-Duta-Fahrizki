<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<?php
require_once("../dbkoneksi.php");

if (isset($_POST['submit'])) {
    $kode = htmlspecialchars($_POST['kode']);
    $nama = htmlspecialchars($_POST['nama']);
    $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $gender = htmlspecialchars($_POST['gender']);
    $email = htmlspecialchars($_POST['email']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kelurahan_id = htmlspecialchars($_POST['kelurahan_id']);

    // Check for empty fields
    if (empty($kode) || empty($nama) || empty($tmp_lahir) || empty($tgl_lahir) || empty($gender) || empty($email) || empty($alamat) || empty($kelurahan_id)) {
        // Handle empty fields
        echo "<p><font color='red'>All fields are required!</font></p>";
    } else {
        // Check if kelurahan_id exists in kelurahan table
        $query_check = "SELECT COUNT(*) FROM kelurahan WHERE id = :kelurahan_id";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->bindParam(':kelurahan_id', $kelurahan_id);
        $stmt_check->execute();
        $row_count = $stmt_check->fetchColumn();

        if ($row_count > 0) {
            // If kelurahan_id exists, insert data into database
            $query = "INSERT INTO pasien (id, nama) VALUES (:id, :nama,)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':kode', $kode);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':tmp_lahir', $tmp_lahir);
            $stmt->bindParam(':tgl_lahir', $tgl_lahir);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':kelurahan_id', $kelurahan_id);        

            if ($stmt->execute()) {
                header("Location: ../datapasien.php");
            } else {
                echo "<p><font color='red'>Failed to add data.</font></p>";
            }
        } else {
            // If kelurahan_id does not exist, show error message
            echo "<p><font color='red'>Invalid kelurahan ID!</font></p>";
        }
    }
}
?>