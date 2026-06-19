<?php
$server = "localhost";
$username = "";
$password = "";
$database = "";
$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("koneksi gagal : " . mysqli_connect_error());
}
