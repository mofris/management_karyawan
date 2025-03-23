<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $id = intval($_POST['id']);
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jabatan = $_POST['jabatan'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $check_username = "SELECT * FROM karyawan WHERE username = '$username' AND id != $id";
    $check_username_result = mysqli_query($conn, $check_username);

    if (mysqli_num_rows($check_username_result) > 0) {
        $_SESSION['error'] = 'Username sudah digunakan oleh karyawan lain, silakan pilih username lain!';
        header("Location: ../index.php");
        exit;
    } else {
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE karyawan SET 
                nama = '$nama',
                username = '$username',
                password = '$hashed_password',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                jabatan = '$jabatan',
                level = '$level',
                status = '$status'
                WHERE id = $id";
        } else {
            $query = "UPDATE karyawan SET 
                nama = '$nama',
                username = '$username',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                jabatan = '$jabatan',
                level = '$level',
                status = '$status'
                WHERE id = $id";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = 'Data karyawan berhasil diperbarui!';
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['error'] = 'Gagal memperbarui data karyawan. Silakan coba beberapa saat lagi!';
            header("Location: ../index.php");
            exit;
        }
    }
} else {
    $_SESSION['warning'] = 'Unauthorized!';
    header("Location: ../index.php");
    exit;
}
