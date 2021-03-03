<?php 
require('database/dbconfig.php');
include('includes/header.php');
?>

<section class="main">
    <div class="favorite">
        <h3 id="content">Paling diminati</h3>
        <div class="row">
            <?php
            // Query Data Villa Berdasarkan Peminat
            $minat_utama = query("SELECT * FROM tbl_villa WHERE villa IN ('Pancaloka')");
            ?>
            <div class="col-lg-6 p-0">
                <?php foreach ($minat_utama as $villa) : ?>
                <div class="item_utama">
                    <a href="properties.php?id=<?= $villa['id']; ?>">
                        <img src="<?= $villa['foto_utama']; ?>" height="370px">
                    </a>
                    <h5><?= $villa['villa']; ?></h5>
                    <h6>
                        <span><?= $villa['provinsi']; ?></span>,
                        <span>Indonesia</span>
                    </h6>
                </div>
                <div class="tag">
                    <span><?= $villa['harga']; ?></span>
                    <span>per malam</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        // Query Data Villa Berdasarkan Peminat
        $minat = query("SELECT * FROM tbl_villa WHERE villa 
        IN ('Seminyak','Jawel','Coraffan','Nirwana')");
        ?>
        <div class="col-lg-8 p-0 items_right">
            <div class="row">
                <?php foreach ($minat as $villa) : ?>
                <div class="col-lg-6 p-3">
                    <div class="item_support">
                        <a href="properties.php?id=<?= $villa['id']; ?>">
                            <img src="<?= $villa['foto_utama']; ?>" class="img-fluid img-cover">
                        </a>
                        <h5><?= $villa['villa']; ?></h5>
                        <h6>
                            <span><?= $villa['provinsi']; ?></span>,
                            <span>Indonesia</span>
                        </h6>
                    </div>
                    <div class="tag">
                        <span><?= $villa['harga']; ?>$</span>
                        <span>per malam</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <!-- Pulau Jawa -->
        <div class="jawa">
            <?php
            // Query Data Villa Berdasarkan Pulau Jogyakarta
            $jawa = query("SELECT * FROM tbl_villa WHERE provinsi ='Jogyakarta'");
            ?>
            <h3>Pulau Jawa</h3>
            <div class="row owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach ($jawa as $villa) : ?>
                        <figure class="owl-item figure">
                            <div class="figure-img text-up">
                                <img src="<?= $villa['foto_utama']; ?>" class="img-fluid img-cover">
                                <a href="properties.php?id=<?= $villa['id']; ?>" class="d-flex justify-content-center mb-n2">
                                    <img src="asset/elements/visibility.png" class="align-self-center">
                                </a>
                                <h5><?= $villa['villa']; ?></h5>
                                <h6 class="pl-2">
                                    <span><?= $villa['provinsi']; ?></span>,
                                    <span>Indonesia</span>
                                </h6>
                            </div>
                            <div class="tag">
                                <span><?= $villa['harga']; ?>$</span>
                                <span>per malam</span>
                            </div>
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pulau Kalimantan -->
        <div class="kalimantan">
            <?php
            // Query Data Villa Berdasarkan Pulau Kalimantan
            $kalimantan = query("SELECT * FROM tbl_villa WHERE provinsi ='Kalimantan'");
            ?>
            <h3>Pulau Kalimantan</h3>
            <div class="row owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach ($kalimantan as $villa) : ?>
                        <figure class="owl-item figure">
                            <div class="figure-img text-up">
                                <img src="<?= $villa['foto_utama']; ?>" class="img-fluid img-cover">
                                <a href="properties.php?id=<?= $villa['id']; ?>" class="d-flex justify-content-center mb-n2">
                                    <img src="asset/elements/visibility.png" class="align-self-center">
                                </a>
                                <h5><?= $villa['villa']; ?></h5>
                                <h6 class="pl-2">
                                    <span><?= $villa['provinsi']; ?></span>,
                                    <span>Indonesia</span>
                                </h6>
                            </div>
                            <div class="tag">
                                <span><?= $villa['harga']; ?>$</span>
                                <span>per malam</span>
                            </div>
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pulau Sumatera -->
        <div class="sumatera">
            <?php
            // Query Data Villa Berdasarkan Pulau Sumatera
            $sumatera = query("SELECT * FROM tbl_villa WHERE provinsi ='Bali'");
            ?>
            <h3>Pulau Sumatera</h3>
            <div class="row owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach ($sumatera as $villa) : ?>
                        <figure class="owl-item figure">
                            <div class="figure-img text-up">
                                <img src="<?= $villa['foto_utama']; ?>" class="img-fluid img-cover">
                                <a href="properties.php?id=<?= $villa['id']; ?>" class="d-flex justify-content-center mb-n2">
                                    <img src="asset/elements/visibility.png" class="align-self-center">
                                </a>
                                <h5><?= $villa['villa']; ?></h5>
                                <h6 class="pl-2">
                                    <span><?= $villa['provinsi']; ?></span>,
                                    <span>Indonesia</span>
                                </h6>
                            </div>
                            <div class="tag">
                                <span><?= $villa['harga'] ?></span>$
                                <span>per malam</span>
                            </div>
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten Gabungan Latar Belakang dan Mewah -->
</section>

<?php 
include('includes/footer.php');
include('includes/script.php');
?>
