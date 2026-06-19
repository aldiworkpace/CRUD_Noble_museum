<?php
include 'koneksi.php';
include 'partials/header.php';
include 'partials/sidebar.php';
?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 250px !important;
        }
    }
</style>

<div class="main-content" style="padding: 30px 20px; min-height: 100vh; background-color: #ECEBE6;">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
        <div class="kartu-judul-hijau">
            <div class="icon-judul">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="teks-judul">
                <h3>Data User</h3>
                <span>Manajemen Admin</span>
            </div>
        </div>

        <div>
            <button type="button" class="btn fw-bold d-flex align-items-center" style="background-color: #d4f55a; color: #1c1c24; border-radius: 12px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
                <i class="bi bi-person-plus-fill me-2 fs-5"></i> Tambah User
            </button>
        </div>

    </div>

    <div class="kartu-tabel">
        <div class="table-responsive p-0">
            <table class="tabel-kustom" id="tabel_user">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th width="15%">Aksi <i class="bi-arrow-up-right-circle-fill fs-4"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($koneksi, $sql);
                    $no = 1;

                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr class='baris-tabel'>";
                            echo "<td class='text-center fw-bold'>" . $no++ . "</td>";
                            echo "<td><span class='fw-bold text-dark'><i class='bi bi-person-circle me-2 text-secondary'></i>" . $row['username'] . "</span></td>";
                            echo "<td class='text-muted'>" . $row['PASSWORD'] . "</td>";
                            echo "<td>";
                            echo "<div class='d-flex justify-content-center gap-2'>";
                            echo "<button type='button' class='btn btn-warning btn-sm tombol-bulat' data-bs-toggle='modal' data-bs-target='#modalEditUser" . $row['id'] . "' title='Edit'><i class='bi bi-pencil-fill'></i></button>";
                            echo "<a href='user/delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus user ini?')\" class='btn btn-danger btn-sm tombol-bulat' title='Hapus'><i class='bi bi-trash-fill'></i></a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                    ?>

                            <div class="modal fade text-start" id="modalEditUser<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">

                                        <div class="modal-header border-bottom-0 pb-0 px-4 pt-4">
                                            <h5 class="modal-title fw-bold text-dark">Edit Data User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <form method="POST" action="user/edit_user.php">

                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold text-secondary">Username</label>
                                                    <input type="text" name="username" class="form-control rounded-3" value="<?= htmlspecialchars($row['username']); ?>" required>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label fw-bold text-secondary">Password Baru</label>
                                                    <input type="password" name="password" class="form-control rounded-3" placeholder="Ketik password baru..." required>
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <button type="submit" name="update" class="btn fw-bold px-4 rounded-3 w-100" style="background-color: #FACC15; color: #1c1c24;">
                                                        Update Data
                                                    </button>
                                                    <button type="button" class="btn btn-light px-4 fw-bold rounded-3 w-100 border" data-bs-dismiss="modal">
                                                        Batal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    else:
                        ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-3 text-light"></i>
                                Belum ada data user yang terdaftar.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'partials/footer.php' ?>
</div>

<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">

            <div class="modal-header border-bottom-0 pb-0 px-4 pt-4">
                <h5 class="modal-title fw-bold text-dark" id="judulModal">Tambah User Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">

                <form method="POST" action="user/create.php">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control rounded-3" placeholder="Masukkan username..." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Password</label>
                        <input type="password" name="PASSWORD" class="form-control rounded-3" placeholder="Masukkan password..." required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" name="submit" class="btn fw-bold px-4 rounded-3 w-100" style="background-color: #d4f55a; color: #1c1c24;">
                            Simpan Data
                        </button>
                        <button type="button" class="btn btn-light px-4 fw-bold rounded-3 w-100 border" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#tabel_user').DataTable({});
    });
</script>