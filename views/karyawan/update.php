<?php
session_start();
include '../../template/header.php';
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

$id = $_GET['id'] ?? 0;
$query = "SELECT * FROM karyawan WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    $_SESSION['error'] = 'Data tidak ditemukan!';
    header("Location: ./index.php");
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content-register overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden m-0">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-12">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <img class="mb-3" src="../../assets/img/logo.svg" alt="" height="80">
                                        <h5 class="text-primary">Edit Karyawan</h5>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="./proses/proses_update.php" class="needs-validation">
                                            <!-- Hidden field for ID -->
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama'] ?>" placeholder="Enter Your Name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ?>" placeholder="Enter username" required>
                                                <div class="invalid-feedback">
                                                    Please enter username
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" placeholder="Enter Tempat Lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tempat Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" placeholder="Enter Tanggal Lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tanggal Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                                <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $data['jabatan'] ?>" placeholder="Enter Jabatan" required>
                                                <div class="invalid-feedback">
                                                    Please enter Jabatan
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                                                <select name="level" class="form-control" id="level" required>
                                                    <option value="" disabled>Pilih Level</option>
                                                    <option value="Non Staff" <?= $data['level'] == 'Non Staff' ? 'selected' : '' ?>>Non Staff</option>
                                                    <option value="Staff" <?= $data['level'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a Level
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-control" required>
                                                    <option value="" disabled>Pilih Status</option>
                                                    <option value="admin" <?= $data['status'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
                                                    <option value="user" <?= $data['status'] == 'user' ? 'selected' : '' ?>>User</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a Status
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="mt-2 btn btn-primary w-100">Simpan Perubahan</button>
                                                <a href="./index.php" class="mt-2 btn w-100">Kembali ke Data Karyawan</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>

    <?php include '../../template/footer.php'; ?>