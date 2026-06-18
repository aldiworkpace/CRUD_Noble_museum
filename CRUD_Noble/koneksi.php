<?php
$server = "localhost";
$username = "root";
$password = "Anggoro123";
$database = "db_noble";
$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("koneksi gagal : " . mysqli_connect_error());
}
