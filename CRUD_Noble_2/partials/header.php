<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/datatables.min.css">
    <link rel="stylesheet" href="src/css/bootstrap-icons.css">
    <link rel="stylesheet" href="src/css/edit.css">
    <link rel="stylesheet" href="src/css/tambah.css">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/data.css">

    <script src="src/js/jquery-4.0.0.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/datatables.min.js"></script>
</head>

<body>