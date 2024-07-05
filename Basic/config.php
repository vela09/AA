<?php

$server = "192.168.1.3";
$user = "administrador";
$password = "123456789";
$nama_database = "mahasiswa";
$key='seguridad';
$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
