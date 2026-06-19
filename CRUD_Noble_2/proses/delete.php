<?php
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id_senjata = $_GET['id'];
    $query = "DELETE FROM tb_senjata WHERE id_senjata='$id_senjata'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Senjata berhasil dihapus'); window.location.href='../data.php';</script>";
    } else {
        echo "<script>alert('Error : " . mysqli_error($koneksi) . "');</script>";
    }
} else {
    echo "<script>alert('Id tidak ditemukan'); window.location.href='../data.php';</script>";
}
