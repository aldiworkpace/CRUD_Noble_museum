<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Senjata</title>

    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/datatables.min.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/edit.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/tambah.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/index.css">
    <link rel="stylesheet" href="/CRUD_Noble/data/src/css/data.css">
    <script src="/CRUD_Nobledata/src/js/jquery-4.0.0.min.js"></script>
    <script src="/CRUD_Nobledata/src/js/bootstrap.bundle.min.js"></script>
    <script src="/CRUD_Noble/data/src/js/datatables.min.js"></script>

</head>

<body>