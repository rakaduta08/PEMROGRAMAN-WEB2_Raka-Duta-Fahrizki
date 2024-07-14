<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['role'])) {
  header("location: login.php");
  exit();
}

include_once 'header.php';
include_once 'sidebar.php';
require_once 'dbkoneksi.php';

$home = 'Home';
$title = 'Data Pasien';

// Check if the database connection is established
if (!$dbh) {
    // Handle the error gracefully
    echo "Database connection failed. Please try again later.";
    exit();
}

// Rest of your code...
?>
<!-- Content Wrapper. Contains page content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $home ?></a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Add New Data</a>
                            
                            <table id="data_pasien" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="data_pasien_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Nama Pasien</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Tempat Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Tanggal Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Kelurahan Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once('dbkoneksi.php');
                                    $query = "SELECT * FROM pasien";
                                    $stmt = $dbh->query($query);
                                    
                                    $nomor = 1; // Counter for numbering rows
                                    
                                    // Fetch associative array
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $nomor++ ?></td>
                                            <td><?= $row['kode'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['tmp_lahir'] ?></td>
                                            <td><?= $row['tgl_lahir'] ?></td>
                                            <td><?= $row['gender'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['kelurahan_id'] ?></td>
                                            <td>
                                                <!-- Tombol untuk membuka modal -->
                                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                                                <a type="button" class="btn btn-danger mb-2" href="delete_pasien.php?id=<?= $row['id'] ?>&delete=delete">Delete</a>
                                            </td>
                                        </tr>

                                        <!-- Modal untuk mengedit data -->
                                        <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Pasien</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_pasien.php" method="post">
                                                            <!-- Hidden input untuk menyimpan ID pasien -->
                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                                            <!-- Formulir untuk mengedit data -->
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="editKode" class="form-label">Kode</label>
                                                                        <input type="text" class="form-control" id="editKode" name="kode" value="<?= $row['kode'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editNama" class="form-label">Nama Pasien</label>
                                                                        <input type="text" class="form-control" id="editNama" name="nama" value="<?= $row['nama'] ?>">
                                                                    </div>
                                                                    
                                                                    <div class="mb-3">
                                                                        <label for="editTmpLahir" class="form-label">Tempat Lahir</label>
                                                                        <input type="text" class="form-control" id="editTmpLahir" name="tmp_lahir" value="<?= $row['tmp_lahir'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editTglLahir" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" class="form-control" id="editTglLahir" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="editGender" class="form-label">Gender</label>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="gender" id="editGenderL" value="L" <?= ($row['gender'] == 'L') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="editGenderL">L</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="gender" id="editGenderP" value="P" <?= ($row['gender'] == 'P') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="editGenderP">P</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editEmail" class="form-label">Email</label>
                                                                        <input type="email" class="form-control" id="editEmail" name="email" value="<?= $row['email'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editAlamat" class="form-label">Alamat</label>
                                                                        <textarea class="form-control" id="editAlamat" name="alamat" rows="3"><?= $row['alamat'] ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editKelurahanId" class="form-label">Kelurahan Id</label>
                                                                        <input type="text" class="form-control" id="editKelurahanId" name="kelurahan_id" value="<?= $row['kelurahan_id'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="add_pasien.php" method="post" name="add">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_l" value="L">
                                    <label class="form-check-label" for="gender_l">L</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_p" value="P">
                                    <label class="form-check-label" for="gender_p">P</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan_id" class="form-label">Kelurahan Id</label>
                                <input type="text" class="form-control" id="kelurahan_id" name="kelurahan_id">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
</body>
</html>

<!-- /.content-wrapper -->
<?php
include_once 'footer.php';
?>
