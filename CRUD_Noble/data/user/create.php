<?php
include '../../koneksi.php';
include '../partials/header.php';
include '../partials/sidebar.php';

if ($_POST) {
    $username = $_POST['username'];
    $PASSWORD = $_POST['PASSWORD'];


    $query = "INSERT INTO users (username, PASSWORD) VALUES ('$username', '$PASSWORD')";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}

?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 260px !important;
        }
    }
</style>

<div class="main-content" style="padding: 30px 20px; background-color: #F8F9FA; min-height: 100vh;">

    <div class="d-lg-none mb-4">
        <button class="btn btn-light shadow-sm border" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <i class="bi bi-list fs-4"></i> Menu
        </button>
    </div>

    <div class="container-fluid">
        <h3 class="fw-bold mb-4">Tambah User</h3>

        <div class="card shadow-sm border-0" style="max-width: 500px;">
            <div class="card-body p-4">

                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username..." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Password</label>
                        <input type="password" name="PASSWORD" class="form-control" placeholder="Masukkan password..." required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn fw-bold px-4" style="background-color: #d4f55a; color: #1c1c24;">
                            Simpan Data
                        </button>
                        <a href="../../user.php" class="btn btn-secondary px-4 fw-bold">Batal</a>
                    </div>
                </form>

            </div>
        </div>
        <?php include '../partials/footer.php'; ?>
    </div>
</div>