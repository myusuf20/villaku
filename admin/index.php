<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<head>
  <title>Dashboard</title>
</head>

<!-- Ambil data dari tabel villa -->
<?php
$villas = query("SELECT * FROM tbl_villa");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between">
      <h4 class="font-weight-bold mt-2">Dashboard</h4>
      <button class="btn add shadow-sm" data-toggle="modal" data-target="#dashboardModalTambah">
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Foto</th>
              <th>Villa</th>
              <th>Alamat</th>
              <th>Harga</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($villas as $villa) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td>
                <img src="../<?= $villa['foto_utama']; ?>" class="img-cover" alt="" height="100px">
              </td>
              <td><?= $villa['villa']; ?></td>
              <td><?= $villa['alamat']; ?></td>
              <td>$<?= $villa['harga']; ?></td>
              <td class="text-center">
                <button class="btn btn-info text-white">
                  <a href="detail.php?id=<?= $villa['id']; ?>" class="text-white"><i class="far fa-eye"></i></a>
                </button>
                <button class="btn btn-warning">
                  <a href="edit.php?id=<?= $villa['id']; ?>" class="text-white"><i class="fas fa-edit"></i></a>
                </button>
                <button class="btn btn-danger">
                  <a href="code.php?id=<?= $villa['id']; ?>" class="text-white"><i class="far fa-trash-alt"></i></a>
                </button>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
      
<!-- Modal Content -->
<?php
include('includes/tambah.php');
?>
<!-- End Modal Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>