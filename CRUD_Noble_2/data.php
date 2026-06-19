<?php include 'partials/header.php' ?>
<?php include 'partials/sidebar.php' ?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 260px !important;
        }
    }
</style>
<div class="main-content" style="padding: 30px 20px; min-height: 100vh; background-color: #ECEBE6;">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">

        <div class="kartu-judul-hijau">
            <div class="icon-judul">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <div class="teks-judul">
                <h3>Data Senjata</h3>
                <span>Arsip Museum Mitologi</span>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="proses/report.php" target="_blank" class="btn btn-danger fw-bold tombol-bulat d-flex align-items-center">
                <i class="bi bi-file-earmark-pdf me-2 fs-5"></i> Cetak PDF
            </a>
            <a href="tambah.php" class="btn fw-bold tombol-bulat d-flex align-items-center" style="background-color: #d4f55a; color: #000000;">
                <i class="bi bi-plus-lg me-2 fs-5"></i> Tambah Data
            </a>
        </div>

    </div>

    <div class="kartu-tabel">
        <div class="table-responsive p-0">
            <table id="tabelSenjata" class="tabel-kustom">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Gambar</th>
                        <th>Nama Senjata</th>
                        <th>Julukan</th>
                        <th>Pemilik</th>
                        <th>Asal</th>
                        <th width="8%">Rank</th>
                        <th>Tipe</th>
                        <th width="15%">Sejarah Asli</th>
                        <th width="12%">Aksi <i class="bi-arrow-up-right-circle-fill fs-4"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('koneksi.php');
                    $no = 1;
                    $sql = "SELECT * FROM tb_senjata";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr class='baris-tabel'>";
                            echo "<td class='text-center fw-bold'>" . $no++ . "</td>";
                            echo "<td class='text-center'><img src='uploads/" . $row['gambar'] . "' alt='Foto' style='max-width: 60px; height: 60px; object-fit: cover; border-radius: 10px; border: 1px solid #eee;'></td>";
                            echo "<td><span class='fw-bold text-dark'>" . $row['nama_senjata'] . "</span></td>";
                            echo "<td>" . $row['julukan_senjata'] . "</td>";
                            echo "<td>" . $row['nama_pemilik'] . "</td>";
                            echo "<td>" . $row['asal_mitologi'] . "</td>";
                            echo "<td class='text-center'><span class='teks-rank'>" . $row['rank_senjata'] . "</span></td>";
                            echo "<td>" . $row['tipe_senjata'] . "</td>";
                            $sejarah = strlen($row['sejarah_asli']) > 40 ? substr($row['sejarah_asli'], 0, 40) . "..." : $row['sejarah_asli'];
                            echo "<td><small class='text-muted'>" . $sejarah . "</small></td>";
                            echo "<td>";
                            echo "<div class='d-flex justify-content-center gap-2'>";
                            echo "<a href='edit.php?id=" . $row['id_senjata'] . "' class='btn btn-warning btn-sm tombol-bulat' title='Edit'><i class='bi bi-pencil-fill'></i></a>";
                            echo "<a href='proses/delete.php?id=" . $row['id_senjata'] . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\" class='btn btn-danger btn-sm tombol-bulat' title='Hapus'><i class='bi bi-trash-fill'></i></a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-3 text-light"></i>
                                Belum ada data senjata yang terdaftar.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'partials/footer.php' ?>
</div>

<script>
    $(document).ready(function() {
        $('#tabelSenjata').DataTable();
    });
</script>