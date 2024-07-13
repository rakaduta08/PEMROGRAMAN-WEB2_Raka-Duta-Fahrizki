<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


   
<?php
session_start();

include_once 'header.php';
include_once 'sidebar.php';
require_once 'dbkoneksi.php';

$home = 'Home';
$title = 'Data Paramedik';

$sql = "SELECT * FROM paramedik";
$query = $dbh->query($sql);
?>
<!-- Content Wrapper. Contains page content -->
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
                            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="paramedik/tambah_data.php" method="post" name="add">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama">
                                                    </div>
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
                                                        <label for="kategori" class="form-label">Kategori</label>
                                                        <select class="form-control" name="kategori" id="kategori">
                                                            <option value="">pilih kategori</option>
                                                            <option value="primer">primer</option>
                                                            <option value="lanjutan">lanjutan</option>
                                                            <option value="kritis">kritis</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="telepon" class="form-label">Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" name="telepon">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="unit_kerja_id" class="form-label">Unit Kerja Id</label>
                                                        <input type="text" class="form-control" id="unit_kerja_id" name="unit_kerja_id">
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


                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="paramedik/edit_data.php" method="post" name="edit">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="row">
                    <div class="col-6">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit_nama" name="edit_nama">
                    </div>
                    <div class="mb-3">
                        <label for="edit_gender" class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender_l" value="L">
                            <label class="form-check-label" for="edit_gender_l">L</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender_p" value="P">
                            <label class="form-check-label" for="edit_gender_p">P</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tmp_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="edit_tmp_lahir" name="edit_tmp_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="edit_tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="edit_tgl_lahir" name="edit_tgl_lahir">
                    </div>
                    </div>
                    
                    <div class="col-6">
                    <div class="mb-3">
                        <label for="edit_kategori" class="form-label">Kategori</label>
                        <select class="form-control" name="edit_kategori" id="edit_kategori">
                            <option value="">Pilih kategori</option>
                            <option value="primer">Primer</option>
                            <option value="lanjutan">Lanjutan</option>
                            <option value="kritis">Kritis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_telepon" class="form-label">Telepon</label>
                        <input type="tel" class="form-control" id="edit_telepon" name="edit_telepon">
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="edit_alamat" name="edit_alamat">
                    </div>
                    <div class="mb-3">
                    <label for="edit_unit_kerja_id" class="form-label">Unit Kerja Id</label>
                    <input type="text" class="form-control" id="edit_unit_kerja_id" name="edit_unit_kerja_id">
                    </div>

                    </div>
                    </div>


                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                            <table id="data_paramedik" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="data_paramedik_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Tempat Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Tanggal Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Kategori</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Telepon</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Unit Kerja Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_paramedik" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $nomor++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['gender'] ?></td>
                                            <td><?= $row['tmp_lahir'] ?></td>
                                            <td><?= $row['tgl_lahir'] ?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['telpon'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['unit_kerja_id'] ?></td>
                                            <td>
                                            <a type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editModal" onclick="fillEditModal('<?= $row['id'] ?>', '<?= $row['nama'] ?>', '<?= $row['gender'] ?>', '<?= $row['tmp_lahir'] ?>', '<?= $row['tgl_lahir'] ?>', '<?= $row['kategori'] ?>', '<?= $row['telpon'] ?>', '<?= $row['alamat'] ?>', '<?= $row['unit_kerja_id'] ?>')">Edit</a>

                                                <a type="button" class="btn btn-danger mb-2" href="paramedik/delete_data.php?id=<?= $row['id'] ?>&delete=delete">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
</div>
<!-- /.content-wrapper -->
<?php
include_once 'footer.php';
?>

<script>
    // Fungsi untuk mengisi nilai modal edit berdasarkan data yang akan diedit
    function fillEditModal(id, nama, gender, tmp_lahir, tgl_lahir, kategori, telepon, alamat, unit_kerja_id) {
        // Mengisi nilai input pada modal edit dengan nilai yang diterima dari data yang akan diedit
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_tmp_lahir').value = tmp_lahir;
        document.getElementById('edit_tgl_lahir').value = tgl_lahir;
        document.getElementById('edit_kategori').value = kategori;
        document.getElementById('edit_telepon').value = telepon;
        document.getElementById('edit_alamat').value = alamat;
        document.getElementById('edit_unit_kerja_id').value = unit_kerja_id;

        // Mengatur nilai radio button gender
        if (gender === 'L') {
            document.getElementById('edit_gender_l').checked = true;
        } else {
            document.getElementById('edit_gender_p').checked = true;
        }
    }
</script>

