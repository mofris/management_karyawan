<?php
session_start();
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
                                        <h5 class="text-primary">Tambah Keluarga Karyawan</h5>
                                    </div>
                                    <div class="mt-4">
                                        <form method="POST" action="./proses/proses_create.php" class="needs-validation">
                                            <input type="hidden" name="id" class="form-control" id="id" value="<?= $_GET['id'] ?>">

                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Your Name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Enter tempat lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tempat Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Enter tanggal lahir" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tanggal Lahir
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hubungan" class="form-label">Hubungan <span class="text-danger">*</span></label>
                                                <input type="text" name="hubungan" class="form-control" id="hubungan" placeholder="Enter hubungan" required>
                                                <div class="invalid-feedback">
                                                    Please enter Hubungan
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="mt-2 btn btn-success w-100">Tambah data Keluarga Karyawan</button>
                                                <a href="./index.php?id=<?= $_GET['id'] ?>" class="mt-2 btn w-100">Kembali ke Data Keluarga Karyawan</a>
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