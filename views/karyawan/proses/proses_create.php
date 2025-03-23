<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jabatan = $_POST['jabatan'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $check_username = "SELECT * FROM karyawan WHERE username = '$username'";
    $check_username_result = mysqli_query($conn, $check_username);

    if (mysqli_num_rows($check_username_result) > 0) {
        $_SESSION['error'] = 'Username sudah digunakan, silakan pilih username lain!';
        header("Location: ../index.php");
        exit;
    } else {
        $query = "INSERT INTO karyawan (nama, username, password, is_active, tempat_lahir, tanggal_lahir, jabatan, level, status) VALUES ('$nama', '$username', '$password', 1, '$tempat_lahir', '$tanggal_lahir', '$jabatan', '$level', '$status')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = 'Data Karyawan sudah berhasil ditambahkan!';
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['error'] = 'Registrasi gagal. Silakan coba beberapa saat lagi!';
            header("Location: ../index.php");
            exit;
        }
    }
} else {
    $_SESSION['warning'] = 'Unautorization!';
    echo "<script>window.location.href='../index.php'</script>";
}
