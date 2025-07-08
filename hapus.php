<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Gunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("DELETE FROM votingdesain WHERE id = ?");
    $stmt->bind_param("i", $id);
    
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