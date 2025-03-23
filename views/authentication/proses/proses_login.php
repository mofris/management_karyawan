<?php
session_start();
include '../../../config/database.php';

if ($_POST) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $query = "SELECT * FROM karyawan WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $password = password_verify($password, $user['password']);

        if ($password) {
            if ($user['status'] !== 'admin') {
                $_SESSION['authentication'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['status'] = $user['status'];
                echo "<script>window.location.href='../../karyawan/profile.php'</script>";
            } else {
                $_SESSION['authentication'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['status'] = $user['status'];
                echo "<script>window.location.href='../../karyawan/index.php'</script>";
            }
        } else {
            $_SESSION['error'] = 'Username & Password Salah';
            echo "<script>window.location.href='../index.php'</script>";
        }
    } else {
        $_SESSION['error'] = 'User tidak terdaftar';
        echo "<script>window.location.href='../index.php'</script>";
    }
} else {
    $_SESSION['warning'] = 'Unautorization!';
    echo "<script>window.location.href='../index.php'</script>";
}
