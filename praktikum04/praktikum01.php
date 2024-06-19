<?php
require_once 'header.php';
require_once 'sidebar.php';

$nilai1 = ['id' => 1, 'nim' => '01101', 'uts' => 80, 'uas' => 84, 'tugas' => 78];
$nilai2 = ['id' => 2, 'nim' => '01102', 'uts' => 85, 'uas' => 89, 'tugas' => 71];
$nilai3 = ['id' => 3, 'nim' => '01103', 'uts' => 80, 'uas' => 74, 'tugas' => 88];
$nilai4 = ['id' => 4, 'nim' => '01104', 'uts' => 80, 'uas' => 84, 'tugas' => 78];

$kumpulan_nilai = [$nilai1, $nilai2, $nilai3, $nilai4]
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Praktikum 01</h1>
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
                            <h3 class="card-title">Judul</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1>Tabel Nilai Mahasiswa</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">UTS</th>
                                        <th scope="col">UAS</th>
                                        <th scope="col">Tugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($kumpulan_nilai as $nilai): ?>
                                    <tr>
                                        <td> <?php echo $nilai['id'] ?></td>
                                        <td> <?php echo $nilai['nim'] ?></td>
                                        <td> <?php echo $nilai['uts'] ?></td>
                                        <td> <?php echo $nilai['uas'] ?></td>
                                        <td> <?php echo $nilai['tugas'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
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
require_once 'footer.php';
?>