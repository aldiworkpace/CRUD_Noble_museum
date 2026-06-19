<?php
include '../../koneksi.php';
include '../partials/header.php';
include '../partials/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_senjata = $_POST['id_senjata'];
    $nama_senjata = $_POST['nama_senjata'];
    $julukan_senjata = $_POST['julukan_senjata'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $asal_mitologi = $_POST['asal_mitologi'];
    $tipe_senjata = $_POST['tipe_senjata'];
    $rank_senjata = $_POST['rank_senjata'];
    $sejarah_asli = $_POST['sejarah_asli'];

    $foto      = $_FILES['file']['name'];
    $tmp       = $_FILES['file']['tmp_name'];
    $folder    = "../../uploads/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $target_file = $folder . basename($foto);


    if (move_uploaded_file($tmp, $target_file)) {
        $sql = "INSERT INTO tb_senjata (id_senjata, nama_senjata, julukan_senjata, nama_pemilik, asal_mitologi, tipe_senjata, rank_senjata, sejarah_asli, gambar) VALUES ('$id_senjata', '$nama_senjata',
        '$julukan_senjata', '$nama_pemilik', '$asal_mitologi', '$tipe_senjata', '$rank_senjata', '$sejarah_asli', '$foto')";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data berhasil disimpan');window.location.href='../../data.php';</script>";
        } else {
            echo "<script>alert('Error Database: " . mysqli_error($koneksi) . "');window.location.href='../../data.php';</script>";
        }
    } else {
        echo "<script>alert('Error: Gagal mengupload gambar ke server.');window.location.href='../../data.php';</script>";
    }
}
?>

<style>
    @media (min-width: 992px) {
        .main-content {
            margin-left: 250px !important;
        }
    }
</style>

<div class="main-content" style="padding: 15px 10px; min-height: 100vh; background-color: #000000;">

    <div class="container-fluid p-0 max-w-custom">

        <div class="kartu-utama p-4 p-md-5">

            <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
                <div class="bg-danger-subtle rounded-circle p-2 me-2">
                    <img class="image" src="../assets/image/edit.gif" alt="">
                </div>
                <h2 class="judul-form mb-0">Tambah Data Senjata</h2>
            </div>

            <form action="" method="post" id="myForm" enctype="multipart/form-data">
                <div class="row gx-5">

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="label-input">ID Senjata</label>
                            <input type="number" name="id_senjata" class="form-control kotak-input" placeholder="Masukkan ID" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Nama Senjata</label>
                            <input type="text" name="nama_senjata" class="form-control kotak-input" placeholder="Contoh: Excalibur" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Julukan Senjata</label>
                            <input type="text" name="julukan_senjata" class="form-control kotak-input" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" class="form-control kotak-input" placeholder="Contoh: Arthur" required>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Tipe Senjata</label>
                            <input type="text" name="tipe_senjata" class="form-control kotak-input" placeholder="Contoh: Pedang" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="label-input">Asal Mitologi</label>
                            <select name="asal_mitologi" class="form-select kotak-input" required>
                                <option value="" selected disabled>-- Pilih Asal Mitologi --</option>
                                <option value="Legenda Arthurian">Legenda Arthurian (Inggris)</option>
                                <option value="Mitologi Mesopotamia">Mitologi Mesopotamia (Sumeria/Babilonia)</option>
                                <option value="Mitologi Keltik">Mitologi Keltik (Irlandia)</option>
                                <option value="Mitologi Yunani">Mitologi Yunani</option>
                                <option value="Mitologi Nordik">Mitologi Nordik (Skandinavia)</option>
                                <option value="Mitologi Jepang">Mitologi Jepang</option>
                                <option value="Mitologi India">Mitologi India (Hindu)</option>
                                <option value="Sejarah Dunia">Sejarah Dunia / Era Modern</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Rank Senjata</label>
                            <select name="rank_senjata" class="form-select kotak-input" required>
                                <option value="" selected disabled>-- Pilih Rank --</option>
                                <option value="EX">EX</option>
                                <option value="S">S</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Sejarah Asli</label>
                            <textarea name="sejarah_asli" class="form-control kotak-input" required rows="3" placeholder="Tuliskan latar belakang sejarah senjata ini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="label-input">Upload Foto Senjata</label>
                            <input type="file" name="file" id="file" class="form-control kotak-input mb-3" accept="image/*" required>

                            <div class="area-upload text-center">
                                <span id="preview-text" class="text-muted d-block my-2"><i class="bi bi-image fs-3 d-block mb-2"></i>Preview gambar akan muncul di sini</span>
                                <img id="preview" src="#" alt="Preview Gambar" class="img-fluid rounded-3 shadow-sm mx-auto" style="display: none; max-height: 180px;">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5" style="border-color: #e0e0e0;">

                <div class="d-flex justify-content-end gap-3">
                    <a href="../../data.php" class="tombol-batal">Batal</a>
                    <button type="submit" class="tombol-simpan">
                        <i class="bi bi-save me-2"></i>Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="../src/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>