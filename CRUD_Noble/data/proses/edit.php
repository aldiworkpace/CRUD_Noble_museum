<?php
include '../../koneksi.php';
include '../partials/header.php';
include '../partials/sidebar.php';


if (isset($_GET['id'])) {
    $id_senjata = $_GET['id'];
    $query = "SELECT * FROM tb_senjata WHERE id_senjata='$id_senjata'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_senjata = $_POST['id_senjata'];
    $nama_senjata = $_POST['nama_senjata'];
    $julukan_senjata = $_POST['julukan_senjata'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $asal_mitologi = $_POST['asal_mitologi'];
    $tipe_senjata = $_POST['tipe_senjata'];
    $rank_senjata = $_POST['rank_senjata'];
    $sejarah_asli = $_POST['sejarah_asli'];

    if (!empty($_FILES['file']['name'])) {
        $foto = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($tmp, '../../uploads/' . $foto);

        $query = "UPDATE tb_senjata SET nama_senjata='$nama_senjata', julukan_senjata='$julukan_senjata', nama_pemilik='$nama_pemilik', 
        asal_mitologi='$asal_mitologi', tipe_senjata='$tipe_senjata', rank_senjata='$rank_senjata', sejarah_asli='$sejarah_asli', gambar='$foto' WHERE id_senjata='$id_senjata'";
    } else {
        $query = "UPDATE tb_senjata SET nama_senjata='$nama_senjata', julukan_senjata='$julukan_senjata', nama_pemilik='$nama_pemilik', 
        asal_mitologi='$asal_mitologi', tipe_senjata='$tipe_senjata', rank_senjata='$rank_senjata', sejarah_asli='$sejarah_asli' WHERE id_senjata='$id_senjata'";
    }
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='../../data.php';</script>";
    } else {
        echo "<script>alert('Error : " . mysqli_error($koneksi) . "');</script>";
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

<div class="main-content" style="padding: 15px 10px; min-height: 100vh; background-color: #000000;">

    <div class="d-lg-none mb-4">
        <button class="btn btn-white shadow-sm border rounded-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <i class="bi bi-list fs-4"></i> Menu
        </button>
    </div>

    <div class="container-fluid p-0">

        <div class="kartu-utama p-4 p-md-5">

            <div class="header-edit d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-warning bg-opacity-25 rounded-circle p-2 me-1">
                    <img class="image" src="../assets/image/edit.gif" alt="">
                </div>
                <div>
                    <h2 class="judul-form mb-0">Edit Data Senjata</h2>
                    <span class="text-muted small">Update informasi untuk : <?php echo $row['nama_senjata']; ?></span>
                </div>
            </div>

            <form action="" method="post" id="myForm" enctype="multipart/form-data">

                <input type="hidden" name="id_senjata" value="<?php echo $row['id_senjata']; ?>">

                <div class="row gx-5">

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="label-input">Nama Senjata</label>
                            <input type="text" name="nama_senjata" value="<?php echo htmlspecialchars($row['nama_senjata']); ?>" class="form-control kotak-input" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Julukan Senjata</label>
                            <input type="text" name="julukan_senjata" value="<?php echo htmlspecialchars($row['julukan_senjata']); ?>" class="form-control kotak-input" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="<?php echo htmlspecialchars($row['nama_pemilik']); ?>" class="form-control kotak-input" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Tipe Senjata</label>
                            <input type="text" name="tipe_senjata" value="<?php echo htmlspecialchars($row['tipe_senjata']); ?>" class="form-control kotak-input" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="label-input">Asal Mitologi</label>
                            <select name="asal_mitologi" class="form-select kotak-input" required>
                                <option value="Legenda Arthurian" <?= ($row['asal_mitologi'] == 'Legenda Arthurian') ? 'selected' : ''; ?>>Legenda Arthurian (Inggris)</option>
                                <option value="Mitologi Mesopotamia" <?= ($row['asal_mitologi'] == 'Mitologi Mesopotamia') ? 'selected' : ''; ?>>Mitologi Mesopotamia (Sumeria/Babilonia)</option>
                                <option value="Mitologi Keltik" <?= ($row['asal_mitologi'] == 'Mitologi Keltik') ? 'selected' : ''; ?>>Mitologi Keltik (Irlandia)</option>
                                <option value="Mitologi Yunani" <?= ($row['asal_mitologi'] == 'Mitologi Yunani') ? 'selected' : ''; ?>>Mitologi Yunani</option>
                                <option value="Mitologi Nordik" <?= ($row['asal_mitologi'] == 'Mitologi Nordik') ? 'selected' : ''; ?>>Mitologi Nordik (Skandinavia)</option>
                                <option value="Mitologi Jepang" <?= ($row['asal_mitologi'] == 'Mitologi Jepang') ? 'selected' : ''; ?>>Mitologi Jepang</option>
                                <option value="Mitologi India" <?= ($row['asal_mitologi'] == 'Mitologi India') ? 'selected' : ''; ?>>Mitologi India (Hindu)</option>
                                <option value="Sejarah Dunia" <?= ($row['asal_mitologi'] == 'Sejarah Dunia') ? 'selected' : ''; ?>>Sejarah Dunia / Era Modern</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Rank Senjata</label>
                            <select name="rank_senjata" class="form-select kotak-input" required>
                                <option value="EX" <?= ($row['rank_senjata'] == 'EX') ? 'selected' : ''; ?>>EX</option>
                                <option value="S" <?= ($row['rank_senjata'] == 'S') ? 'selected' : ''; ?>>S</option>
                                <option value="A" <?= ($row['rank_senjata'] == 'A') ? 'selected' : ''; ?>>A</option>
                                <option value="B" <?= ($row['rank_senjata'] == 'B') ? 'selected' : ''; ?>>B</option>
                                <option value="C" <?= ($row['rank_senjata'] == 'C') ? 'selected' : ''; ?>>C</option>
                                <option value="D" <?= ($row['rank_senjata'] == 'D') ? 'selected' : ''; ?>>D</option>
                                <option value="E" <?= ($row['rank_senjata'] == 'E') ? 'selected' : ''; ?>>E</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Sejarah Asli</label>
                            <textarea name="sejarah_asli" class="form-control kotak-input" required rows="3"><?php echo htmlspecialchars($row['sejarah_asli']); ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Ubah Foto (Opsional)</label>
                            <input type="file" name="file" id="file" class="form-control kotak-input mb-3" accept="image/*">

                            <div class="area-upload text-center">
                                <span id="preview-text" class="text-muted d-block my-2" style="display: none;"><small>Preview gambar baru...</small></span>
                                <img id="preview" src="../../uploads/<?php echo $row['gambar']; ?>" alt="Foto Lama" class="img-fluid rounded-3 shadow-sm mx-auto" style="max-height: 150px;">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: #e0e0e0;">

                <div class="d-flex justify-content-end gap-3">
                    <a href="../../data.php" class="tombol-batal pt-2">Batal</a>
                    <button type="submit" class="tombol-simpan">
                        <i class="bi bi-save me-2"></i>Update Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>