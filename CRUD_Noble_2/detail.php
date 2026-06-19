<?php
include 'koneksi.php';
include 'partials/header.php';
include 'partials/sidebar.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_senjata WHERE id_senjata = '$id'");
$row = mysqli_fetch_array($query);
?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 250px !important;
        }
    }
</style>

<div class="main-content" style="padding: 15px 10px; background-color: #000000; min-height: 100vh;">

    <div class="container-fluid p-0">


        <div class="card shadow-sm border-0 p-4 g-md-5">
            <div class="row g-0">

                <h3 class="fw-bold mb-4">Detail Data Senjata</h3>

                <div class="col-md-4 text-center p-4 bg-light">
                    <img src="uploads/<?php echo $row['gambar']; ?>" class="img-fluid rounded shadow-sm" alt="Foto Senjata" style="max-height: 350px;">
                </div>

                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold"><?php echo $row['nama_senjata']; ?></h4>
                        <p class="text-muted fst-italic">Julukan: <?php echo $row['julukan_senjata']; ?></p>

                        <hr>

                        <table class="table table-borderless table-sm mt-3">
                            <tr>
                                <td width="150px" class="fw-bold">ID Senjata</td>
                                <td>: <?php echo $row['id_senjata']; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Nama Pemilik</td>
                                <td>: <?php echo $row['nama_pemilik']; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Asal Mitologi</td>
                                <td>: <?php echo $row['asal_mitologi']; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tipe Senjata</td>
                                <td>: <?php echo $row['tipe_senjata']; ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Rank</td>
                                <td>: <span class="badge bg-warning text-dark"><?php echo $row['rank_senjata']; ?></span></td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <h6 class="fw-bold">Sejarah Asli:</h6>
                            <p class="bg-light p-3 border rounded" style="text-align: justify;">
                                <?php echo nl2br($row['sejarah_asli']); ?>
                            </p>
                        </div>

                        <div class="mt-4">
                            <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
                        </div>

                    </div>
                    <?php include 'partials/footer.php' ?>
                </div>

            </div>
        </div>
    </div>
</div>