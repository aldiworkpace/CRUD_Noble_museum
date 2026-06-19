<?php
include 'koneksi.php';
include 'partials/header.php';
include 'partials/sidebar.php';

$query = "SELECT * FROM tb_senjata";
$result = mysqli_query($koneksi, $query);
?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 260px !important;
        }
    }
</style>

<div class="main-content" style="padding: 30px 20px; min-height: 100vh; background-color: #ECEBE6">

    <div class="header-senjata d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold text-dark mb-1">Welcome Back To Museum</h3>
            <span class="text-muted">Data Museum Senjata Mitologi</span>
        </div>

        <div>
            <img src="assets/image/pokemon.gif" alt="Ilustrasi" class="gambar-header shadow-sm">
        </div>

    </div>

    <div class="row g-4 mb-5">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-6 col-xl-4">
                <div class="card kartu-senjata h-100">
                    <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top gambar-senjata" alt="<?php echo $row['nama_senjata']; ?>">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0 text-dark"><?php echo $row['nama_senjata']; ?></h5>
                            <span class="badge bg-light text-secondary border">#<?php echo $row['id_senjata']; ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted" style="font-size: 0.85rem;"><i class="bi bi-person-fill me-1"></i>Pemilik:</span>
                            <span class="fw-semibold text-dark" style="font-size: 0.85rem;"><?php echo $row['nama_pemilik']; ?></span>
                        </div>
                        <p class="card-text teks-sejarah flex-grow-1"><?php echo $row['sejarah_asli']; ?></p>
                        <a href="detail.php?id=<?php echo $row['id_senjata']; ?>" class="detail-tombol w-100 text-center text-decoration-none mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php include 'partials/footer.php' ?>
</div>