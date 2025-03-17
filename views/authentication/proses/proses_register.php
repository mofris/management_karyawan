<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_username = "SELECT * FROM karyawan WHERE username = '$username'";
    $check_username_result = mysqli_query($conn, $check_username);

    if (mysqli_num_rows($check_username_result) > 0) {
        $_SESSION['error'] = 'Username sudah digunakan, silakan pilih username lain!';
        header("Location: ../register.php");
        exit;
    } else {
        $query = "INSERT INTO karyawan (nama, username, password, is_active) VALUES ('$nama', '$username', '$password', 1)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = 'Register sudah berhasil!';
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
    echo "<script>window.location.href='../register.php'</script>";
}
