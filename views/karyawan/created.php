<?php
session_start();

if (!isset($_SESSION['authentication'])) {
    echo "<script>window.location.href='../authentication'</script>";
}

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    echo "<script>
        alert('Akses ditolak! Anda tidak memiliki izin untuk mengakses halaman ini.');
        window.history.back();
    </script>";
    exit;
}
?>

<?php include '../../template/header.php' ?>
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
                                        <h5 class="text-primary">Tambah Karyawan</h5>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="./proses/proses_create.php" class="needs-validation">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Your Name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                                                <div class="invalid-feedback">
                                                    Please enter username
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="userpassword" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                                                <div class="invalid-feedback">
                                                    Please enter password
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Enter tempat_lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tempat Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Enter tanggal_lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tanggal Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Enter jabatan" required>
                                                <div class="invalid-feedback">
                                                    Please enter Jabatan
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                                                <select name="level" class="form-control" id="level" required>
                                                    <option value="" disabled selected>Pilih Level</option>
                                                    <option value="Non Staff">Non Staff</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a Level
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Status</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="user">User</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a Status
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="mt-2 btn btn-success w-100">Tambah data karyawan</button>
                                                <a href="./index.php" class="mt-2 btn w-100">Back to Data Karyawan</a>
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
    <?php include '../../template/footer.php' ?>