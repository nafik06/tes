<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pastikan data POST ada
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
    $logo = isset($_POST['logo']) ? mysqli_real_escape_string($koneksi, $_POST['logo']) : '';
    $kaos = isset($_POST['kaos']) ? mysqli_real_escape_string($koneksi, $_POST['kaos']) : '';

    // Gunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("INSERT INTO votingdesain (nama, logo, kaos) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $logo, $kaos);

    if ($stmt->execute()) {
        header("Location: index.php?status=sukses");
    } else {
        error_log("Error: " . $stmt->error);
        header("Location: index.php?status=gagal");
    }
    exit();
} else {
    header("Location: index.php");
    exit();
}