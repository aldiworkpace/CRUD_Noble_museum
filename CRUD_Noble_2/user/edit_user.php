<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $query = "UPDATE users SET username = '$username', PASSWORD = '$password' WHERE id = '$id'";
    } else {
        $query = "UPDATE users SET username = '$username' WHERE id = '$id'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data User berhasil diupdate ke Chaldea Terminal!'); window.location.href='../user.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($koneksi) . "'); window.location.href='../user.php';</script>";
    }
} else {
    header("Location: ../data/partials/user.php");
    exit();
}
