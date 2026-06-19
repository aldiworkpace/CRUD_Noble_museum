<?php
include 'header.php';
include 'sidebar.php';
include '../../koneksi.php';
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
            <a href="../user/create.php" class="btn fw-bold d-flex align-items-center" style="background-color: #d4f55a; color: #1c1c24; border-radius: 12px; padding: 10px 20px;">
                <i class="bi bi-person-plus-fill me-2 fs-5"></i> Tambah User
            </a>
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
                            echo "<a href='../user/edit_user.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm tombol-bulat' title='Edit'><i class='bi bi-pencil-fill'></i></a>";
                            echo "<a href='../user/delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus user ini?')\" class='btn btn-danger btn-sm tombol-bulat' title='Hapus'><i class='bi bi-trash-fill'></i></a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
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
    <?php include 'footer.php' ?>
</div>

<script>
    $(document).ready(function() {
        $('#tabel_user').DataTable({});
    });
</script>