<?php
session_start();
include '../../../config/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM karyawan WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = 'Data berhasil dihapus!';
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION['error'] = 'Data gagal dihapus. Silakan coba lagi.';
        header("Location: ../index.php");
        exit;
    }
} else {
    $_SESSION['error'] = 'ID tidak valid.';
    header("Location: ../index.php");
    exit;
}
