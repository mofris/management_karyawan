<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $hubungan = $_POST['hubungan'];

    $query = "INSERT INTO kel_karyawan (karyawan_id, nama, tempat_lahir, tanggal_lahir, hubungan) VALUES ('$id', '$nama', '$tempat_lahir', '$tanggal_lahir', '$hubungan')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success'] = 'Data Keluarga sudah berhasil ditambahkan!';
        header("Location: ../index.php?id=$id");
        exit;
    } else {
        $_SESSION['error'] = 'Data gagal ditambahkan. Silakan coba beberapa saat lagi!';
        header("Location: ../index.php?id=$id");
        exit;
    }
} else {
    $_SESSION['warning'] = 'Unautorization!';
    echo "<script>window.location.href='../index.php?id=$id'</script>";
}
