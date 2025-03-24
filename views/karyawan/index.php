<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['authentication'])) {
    echo "<script>window.location.href='../authentication'</script>";
}

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'admin') {
    echo "<script>
        alert('Akses ditolak! Anda tidak memiliki izin untuk mengakses halaman ini.');
        window.history.back();
    </script>";
    exit;
}
?>

<?php include '../../template/header.php' ?>

<?php
if (isset($_SESSION['success'])) {
    $successMessage = $_SESSION['success'];
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Berhasil!",
                text: "' . addslashes($successMessage) . '",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>';
    unset($_SESSION['success']);
}
?>

<?php
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Gagal!",
                text: "' . addslashes($errorMessage) . '",
                icon: "error",
                confirmButtonText: "OK"
            });
        });
    </script>';
    unset($_SESSION['error']);
}
?>

<?php
if (isset($_SESSION['warning'])) {
    $wariningMessage = $_SESSION['warning'];
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Terjadi Kesalahan!",
                text: "' . addslashes($wariningMessage) . '",
                icon: "warning",
                confirmButtonText: "OK"
            });
        });
    </script>';
    unset($_SESSION['warning']);
}
?>

<div id="layout-wrapper" style="margin-top: -40px;">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                    </div>
                </div>
                <div class="mb-4 mb-lg-3 pb-lg-4">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <img src="../../assets/images/users/user-dummy-img.jpg" alt="user-img"
                                    class="img-thumbnail rounded-circle" />
                            </div>
                        </div>
                        <!--end col-->
                        <?php
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM karyawan WHERE id = $id";
                        $data = mysqli_query($conn, $query);
                        foreach ($data as $karyawan) {
                        ?>
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?= $karyawan['nama'] ?></h3>
                                    <p class="text-white-75">
                                        <?php
                                        if ($karyawan['jabatan'] !== null) {
                                            echo $karyawan['jabatan'];
                                        } else {
                                            echo '-';
                                        } ?>
                                    </p>
                                    <div class="hstack text-white-50 gap-1">
                                        <div class="me-2">
                                            <i class="ri-map-pin-line me-1 text-white-75 fs-16 align-middle"></i>
                                            <?php
                                            if ($karyawan['tempat_lahir'] !== null) {
                                                echo $karyawan['tempat_lahir'];
                                            } else {
                                                echo '-';
                                            } ?>
                                        </div>
                                        <div>
                                            <i class="ri-calendar-line me-1 text-white-75 fs-16 align-middle"></i>
                                            <?php
                                            if ($karyawan['tanggal_lahir'] !== null) {
                                                echo $karyawan['tanggal_lahir'];
                                            } else {
                                                echo '-';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!--end row-->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <!-- Tab panes -->
                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="documents" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <h5 class="card-title flex-grow-1 mb-0">Karyawan</h5>
                                                <div class="flex-shrink-0">
                                                    <input class="form-control d-none" type="file" id="formFile">
                                                    <a href="./created.php" for="formFile" class="btn btn-success">
                                                        <i class="ri-sign-out me-1 align-bottom"></i> Tambah Karyawan
                                                    </a>
                                                    <a href="../authentication/logout.php" for="formFile" class="btn btn-danger">
                                                        <i class="ri-sign-out me-1 align-bottom"></i> Logout
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">TTL</th>
                                                                    <th scope="col">Jabatan</th>
                                                                    <th scope="col">Level</th>
                                                                    <th scope="col">Activated</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Keluarga</th>
                                                                    <th scope="col">Created</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $id = $_SESSION['id'];
                                                                $query = "SELECT * FROM karyawan";
                                                                $data = mysqli_query($conn, $query);
                                                                if (mysqli_num_rows($data) > 0) { ?>
                                                                    <?php
                                                                    foreach ($data as $karyawan) {
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="avatar-sm">
                                                                                        <div>
                                                                                            <img src="../../assets/images/users/user-dummy-img.jpg" alt="user-img"
                                                                                                class="img-thumbnail rounded-circle" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="ms-3 flex-grow-1">
                                                                                        <h6 class="fs-15 mb-0">
                                                                                            <?= $karyawan['nama'] ?>
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['tempat_lahir'] !== null) {
                                                                                    echo $karyawan['tempat_lahir'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>,
                                                                                <?php
                                                                                if ($karyawan['tanggal_lahir'] !== null) {
                                                                                    echo date('d-M-Y', strtotime($karyawan['tanggal_lahir']));
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['jabatan'] !== null) {
                                                                                    echo $karyawan['jabatan'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['level'] !== null) {
                                                                                    echo $karyawan['level'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['is_active'] == 1) {
                                                                                    echo 'Activated';
                                                                                } else {
                                                                                    echo 'Non Activated';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['status'] !== null) {
                                                                                    echo $karyawan['status'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="../kel_karyawan/index.php?id=<?= $karyawan['id'] ?>" class="btn btn-success">
                                                                                    +
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['created_at'] !== null) {
                                                                                    echo date('d-M-Y H:i:s', strtotime($karyawan['created_at']));
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <a href="./update.php?id=<?= $karyawan['id'] ?>" class="btn btn-md btn-success">edit</a>
                                                                                <btn class="btn btn-md btn-danger delete-btn" data-url="./proses/proses_del.php?id=<?= $karyawan['id'] ?>">Delete</btn>

                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: center; font-size: 16px">
                                                                            Tidak ada data!
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                            <!--end tab-content-->
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
        </div>
    </div>
</div>

<?php include '../../template/footer.php' ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke URL jika user mengonfirmasi
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>