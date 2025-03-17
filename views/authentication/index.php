<?php session_start(); ?>
<?php if (isset($_SESSION['authentication'])) {
    $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../authentication';
    echo "<script>window.location.href='$previous_page';</script>";
} ?>
<?php include '../../template/header.php' ?>

<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden m-0">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-8">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <img class="mb-3" src="../../assets/img/logo.svg" alt="" height="80">
                                        <h5 class="text-primary">Management Karyawan</h5>
                                    </div>
                                    <div class="mt-4">
                                        <?php
                                        if (isset($_SESSION['success'])) : ?>
                                            <div class="row">
                                                <div class="col-lg-12" col-lg-offset-3>
                                                    <div class="alert alert-success alert-dismissable" role="alert">
                                                        <div class="text-center">
                                                            <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                                                            <h6><?= $_SESSION['success'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php unset($_SESSION['success']);
                                        endif; ?>

                                        <?php
                                        if (isset($_SESSION['warning'])) : ?>
                                            <div class="row">
                                                <div class="col-lg-12" col-lg-offset-3>
                                                    <div class="alert alert-warning alert-dismissable" role="alert">
                                                        <div class="text-center">
                                                            <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                                                            <h6><?= $_SESSION['warning'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php unset($_SESSION['warning']);
                                        endif; ?>

                                        <?php
                                        if (isset($_SESSION['error'])) : ?>

                                            <script>
                                                console.log('masuk')
                                                Swal.fire({
                                                    title: "Error",
                                                    text: <?= $_SESSION['error'] ?>,
                                                    icon: "error"
                                                });
                                            </script>
                                        <?php unset($_SESSION['error']);
                                        endif; ?>

                                        <form method="POST" action="./proses/proses_login.php" class="needs-validation">
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
                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign Up</button>
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

    <script>
        sessionStorage.setItem("data-layout", 'harizontal');
    </script>