<?php
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data User Berhasil Dihapus!'); window.location.href='../user.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus: " . mysqli_error($koneksi) . "'); window.location.href='../user.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='../user.php';</script>";
}
