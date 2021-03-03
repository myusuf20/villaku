<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php
$pembayaran = query("SELECT * FROM tbl_pembayaran 
                    JOIN tbl_pemesanan 
                    ON tbl_pemesanan.id = tbl_pembayaran.pemesanan_id");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold">Pemesanan</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Villa ID</th>
              <th>Nama</th>
              <th>No HP</th>
              <th>Total</th>
              <th>Bukti</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($pembayaran as $user) : ?>
            <tr>
              <td><?= $user['id']; ?></td>
              <td><?= $user['villa_id']; ?></td>
              <td><?= $user['nama_pengirim']; ?></td>
              <td><?= $user['no_pengirim']; ?></td>
              <td>$<?= ($user['total_harga'] * 0.15) + $user['total_harga']; ?></td>
              <td><img src="image/bukti/<?= $user['upload_bukti']; ?>" alt="" height="150"></td>
              <td class="text-center">
                <button class="btn btn-info">
                  <a href="pemesanan-detail.php?id=<?= $user['villa_id']; ?>" class="text-white"><i class="far fa-eye"></i></a>
                </button>
                <button class="btn btn-danger">
                  <a href="pemesanan-delete.php?id=<?= $user['id']; ?>" class="text-white"><i class="far fa-trash-alt"></i></a>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
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
