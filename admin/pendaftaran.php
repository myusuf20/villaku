<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<head>
  <title>Pendaftaran</title>
</head>

<?php

$registrations = query("SELECT * FROM tbl_pendaftaran");
?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold">Pendaftaran Villa</h4>
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
              <?php foreach ($registrations as $registration) : ?>
              <tr>
                <td><?= $registration['id']; ?></td>
                <td><img src="image/<?= $registration['foto_utama']; ?>" height="80px"></td>
                <td><?= $registration['villa']; ?></td>
                <td><?= $registration['alamat']; ?></td>
                <td>$<?= $registration['harga']; ?></td>
                <td class="text-center">
                  <button class="btn btn-info">
                    <a href="pendaftaran-detail.php?id=<?= $registration['id']; ?>" class="text-white"><i class="far fa-eye"></i></a>
                  </button>
                  <button class="btn btn-danger" data-toggle="modal">
                    <a href="pendaftaran-delete.php?id=<?= $registration['id']; ?>" class="text-white"><i class="far fa-trash-alt"></i></a>
                  </button>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>