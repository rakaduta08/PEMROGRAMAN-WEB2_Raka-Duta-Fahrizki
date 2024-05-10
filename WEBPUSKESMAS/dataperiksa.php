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
$title = 'Data Periksa';

$sql = "SELECT * FROM periksa";
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
                                        <form action="periksa/tambah_data.php" method="post" name="add">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal" class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="berat" class="form-label">Berat</label>
                                                        <input type="number" class="form-control" id="berat" name="berat">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tinggi" class="form-label">Tinggi</label>
                                                        <input type="text" class="form-control" id="tinggi" name="tinggi">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tensi" class="form-label">Tensi</label>
                                                        <input type="number" class="form-control" id="tensi" name="tensi">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                   
                                                    <div class="mb-3">
                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pasien_id" class="form-label">Pasien Id</label>
                                                        <input type="text" class="form-control" id="pasien_id" name="pasien_id">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="paramedik_id" class="form-label">Paramedik Id</label>
                                                        <input type="text" class="form-control" id="paramedik_id" name="paramedik_id">
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


<div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id'] ?>" aria-hidden="true">
    <!-- Konten modal edit di sini -->


    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="periksa/edit_data.php" method="post" name="edit">
                    <input type="hidden" id="edit_id" name="edit_id" value="<?= $row['id'] ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="edit_tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="edit_tanggal" name="edit_tanggal" value="<?= $row['tanggal'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="edit_berat" class="form-label">Berat</label>
                                <input type="number" class="form-control" id="edit_berat" name="edit_berat" value="<?= $row['berat'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="edit_tinggi" class="form-label">Tinggi</label>
                                <input type="text" class="form-control" id="edit_tinggi" name="edit_tinggi" value="<?= $row['tinggi'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="edit_tensi" class="form-label">Tensi</label>
                                <input type="date" class="form-control" id="edit_tensi" name="edit_tensi" value="<?= $row['tensi'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="edit_keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan" value="<?= $row['keterangan'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="edit_pasien_id" class="form-label">Pasien Id</label>
                                <input type="text" class="form-control" id="edit_pasien_id" name="edit_pasien_id" value="<?= $row['pasien_id'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="edit_paramedik_id" class="form-label">Paramedik Id</label>
                                <input type="text" class="form-control" id="edit_paramedik_id" name="edit_paramedik_id" value="<?= $row['paramedik_id'] ?>">
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

                            
                            <table id="data_periksa" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="data_periksa_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Tanggal</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Berat</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Tinggi</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Tensi</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Keterangan</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Pasien ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Paramedik ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_periksa" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $nomor++ ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['berat'] ?></td>
                                            <td><?= $row['tinggi'] ?></td>
                                            <td><?= $row['tensi'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['pasien_id'] ?></td>
                                            <td><?= $row['paramedik_id'] ?></td>
                                            <td>
                                            <a type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>" onclick="fillEditModal('<?= $row['id'] ?>', '<?= $row['tanggal'] ?>', '<?= $row['berat'] ?>', '<?= $row['tinggi'] ?>', '<?= $row['tensi'] ?>', '<?= $row['keterangan'] ?>', '<?= $row['pasien_id'] ?>', '<?= $row['paramedik_id'] ?>')">Edit</a>


                                                <a type="button" class="btn btn-danger mb-2" href="periksa/delete_data.php?id=<?= $row['id'] ?>&delete=delete">Delete</a>
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
                                                        <form action="periksa/edit_data.php" method="post">
                                                            <!-- Hidden input untuk menyimpan ID pasien -->
                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                                            <!-- Formulir untuk mengedit data -->
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="edittanggal" class="form-label">Tanggal</label>
                                                                        <input type="date" class="form-control" id="edittanggal" name="tanggal" value="<?= $row['tanggal'] ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="editberat" class="form-label">Berat Badan</label>
                                                                        <input type="text" class="form-control" id="editberat" name="berat" value="<?= $row['berat'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edittinggi" class="form-label">Tinggi Badan</label>
                                                                        <input type="text" class="form-control" id="edittinggi" name="tinggi" value="<?= $row['tinggi'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <div class="mb-3">
                                                                        <label for="edittensi" class="form-label">Tensi</label>
                                                                        <input type="text" class="form-control" id="edittensi" name="tensi" value="<?= $row['tensi'] ?>">
                                                                    </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editketerangan" class="form-label">Keterangan</label>
                                                                        <input type="text" class="form-control" id="editketerangan" name="keterangan" value="<?= $row['keterangan'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editpasien_id" class="form-label">Pasien_Id</label>
                                                                        <textarea class="form-control" id="editpasien_id" name="pasien_id" rows="3"><?= $row['pasien_id'] ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editparamedik_id" class="form-label">Paramedik Id</label>
                                                                        <input type="text" class="form-control" id="editparamedik_id" name="paramedik_id" value="<?= $row['paramedik_id'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    function fillEditModal(id, tanggal, berat, tinggi, tensi, keterangan, pasien_id, paramedik_id) {
        // Mengisi nilai input pada modal edit dengan nilai yang diterima dari data yang akan diedit
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_tanggal').value = tanggal;
        document.getElementById('edit_berat').value = berat;
        document.getElementById('edit_tinggi').value = tinggi;
        document.getElementById('edit_tensi').value = tensi;
        document.getElementById('edit_keterangan').value = keterangan;
        document.getElementById('edit_pasien_id').value = pasien_id;
        document.getElementById('edit_paramedik_id').value = paramedik_id;
    }
</script>
