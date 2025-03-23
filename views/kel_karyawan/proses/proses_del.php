<?php
session_start();
include '../../../config/database.php';

if (isset($_GET['id']) && isset($_GET['kel'])) {
    $id = intval($_GET['id']);
    $kel = intval($_GET['kel']);

    $query = "DELETE FROM kel_karyawan WHERE id = '$kel'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = 'Data berhasil dihapus!';
        header("Location: ../index.php?id=$id");
        exit;
    } else {
        $_SESSION['error'] = 'Data gagal dihapus. Silakan coba lagi.';
        header("Location: ../index.php?id=$id");
        exit;
    }
} else {
    $id = intval($_GET['id']);
    $_SESSION['error'] = 'ID tidak valid.';
    header("Location: ../index.php?id=$id");
    exit;
}
