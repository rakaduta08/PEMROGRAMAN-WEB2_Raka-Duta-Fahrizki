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
                    <h1>Praktikum 02</h1>
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
                            <div class="row">
                            <div class="col-md-8">
                                <form method="POST" action="form_belanja.php">
                                    <div class="form-group row mb-2">
                                        <label for="customer" class="col-2 col-form-label text-end">Customer</label>
                                        <div class="col-4">
                                            <input id="customer" name="customer" placeholder="Nama Customer" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-2 text-end">Pilih Produk</label>
                                        <div class="col-8">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="tv">
                                                <label for="produk_0" class="custom-control-label">TV</label>
                                            </div>

                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="kulkas">
                                                <label for="produk_1" class="custom-control-label">KULKAS</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="mesincuci">
                                                <label for="produk_2" class="custom-control-label">MESIN CUCI</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="jumlah" class="col-2 col-form-label text-end">Jumlah</label>
                                        <div class="col-4">
                                            <input id="jumlah" name="jumlah" placeholder="Jumlah" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-2 col-10">
                                            <button name="submit" type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <table class="table border">
                                    <tr class="table-primary ">
                                        <td>Daftar Harga</td>
                                    </tr>
                                    <tr>
                                        <td>TV : 4.200.000</td>
                                    </tr>
                                    <tr>
                                        <td>KULKAS : 3.100.000</td>
                                    </tr>
                                    <tr>
                                        <td>MESIN CUCI : 3.800.000</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>Harga Dapat Berubah Setiap Saat</td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                        </div>
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