<?php
include '../koneksi.php';

if ($_POST) {
    $username = $_POST['username'];
    $PASSWORD = $_POST['PASSWORD'];


    $query = "INSERT INTO users (username, PASSWORD) VALUES ('$username', '$PASSWORD')";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>alert('Data User berhasil disimpan!'); window.location.href='../user.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='../user.php';</script>" . mysqli_error($koneksi);
    }
}
