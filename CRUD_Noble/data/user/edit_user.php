<?php
// Sesuaikan path jika letak file berbeda
include '../../koneksi.php';
include '../partials/header.php';
include '../partials/sidebar.php';

$id = $_GET['id'];
$query_data = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$row = mysqli_fetch_array($query_data);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $query = "UPDATE users SET username = '$username', PASSWORD = '$password' WHERE id = '$id'";
    } else {
        $query = "UPDATE users SET username = '$username' WHERE id = '$id'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data User berhasil diupdate!'); window.location.href='../partials/user.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($koneksi) . "');</script>";
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
        <h3 class="fw-bold mb-4">Edit Data User</h3>

        <div class="card shadow-sm border-0" style="max-width: 500px;">
            <div class="card-body p-4">

                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Password Baru</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn fw-bold px-4" style="background-color: #d4f55a; color: #1c1c24;">
                            Update Data
                        </button>
                        <a href="../partials/user.php" class="btn btn-secondary px-4 fw-bold">Batal</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>