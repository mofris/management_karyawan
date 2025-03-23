<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $id = intval($_POST['id']);
    $karyawan_id = intval($_POST['karyawan_id']);
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $hubungan = $_POST['hubungan'];

    $query = "UPDATE kel_karyawan SET 
                karyawan_id = '$karyawan_id',
                nama = '$nama',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                hubungan = '$hubungan'
                WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success'] = 'Data Keluarga Karyawan Berhasil diperbarui!';
        header("Location: ../index.php?id=$karyawan_id");
        exit;
    } else {
        $_SESSION['error'] = 'Gagal memperbarui data keluarga karyawan. Silakan coba beberapa saat lagi!';
        header("Location: ../index.php?id=$karyawan_id");
        exit;
    }
} else {
    $_SESSION['warning'] = 'Unauthorized!';
    header("Location: ../index.php?id=$karyawan_id");
    exit;
}
