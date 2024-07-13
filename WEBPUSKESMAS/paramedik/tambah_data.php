<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    
 <?php
require_once("../dbkoneksi.php");

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $gender = htmlspecialchars($_POST['gender']);
    $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $telpon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $unit_kerja_id = htmlspecialchars($_POST['unit_kerja_id']);

    // Check for empty fields
    if (empty($nama) || empty($gender) || empty($tmp_lahir) || empty($tgl_lahir) || empty($kategori) || empty($telpon) || empty($alamat) || empty($unit_kerja_id)) {
        // Handle empty fields
        echo "<p><font color='red'>All fields are required!</font></p>";
    } else {
        // Check if unit_kerja_id exists in kelurahan table
        $query_check = "SELECT COUNT(*) FROM kelurahan WHERE id = :unit_kerja_id";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->bindParam(':unit_kerja_id', $unit_kerja_id);
        $stmt_check->execute();
        $row_count = $stmt_check->fetchColumn();

        if ($row_count > 0) {
            // If unit_kerja_id exists, insert data into database
            $query = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (:nama, :gender, :tmp_lahir, :tgl_lahir, :kategori, :telpon, :alamat, :unit_kerja_id)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':tmp_lahir', $tmp_lahir);
            $stmt->bindParam(':tgl_lahir', $tgl_lahir);
            $stmt->bindParam(':kategori', $kategori);
            $stmt->bindParam(':telpon', $telpon);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':unit_kerja_id', $unit_kerja_id);        

            if ($stmt->execute()) {
                header("Location: ../dataparamedik.php");
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
