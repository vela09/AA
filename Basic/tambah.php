<?php
include("./config.php");
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $NIM = $_POST['NIM'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $agama = $_POST['agama'];
    $IPK = $_POST['IPK'];

    $sql = "INSERT INTO mahasiswa (nama, NIM, jenis_kelamin, jurusan, agama, IPK) 
        VALUES (AES_ENCRYPT(?, UNHEX(SHA2(?, 256))), ?, ?, ?, ?, ?)";
    $query = mysqli_query($db, $sql);
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }
    $stmt->bind_param('ssssssd', $nama, $key, $NIM, $jenis_kelamin, $jurusan, $agama, $IPK);
    if ($stmt->execute()) {
        echo "Nuevo registro insertado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");
    $stmt->close();
    $db->close();
    ?>