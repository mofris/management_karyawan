<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['authentication'])) {
    echo "<script>window.location.href='../authentication'</script>";
} ?>

<?php include '../../template/header.php' ?>

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
                                                <h5 class="card-title flex-grow-1 mb-0">Family</h5>
                                                <div class="flex-shrink-0">
                                                    <input class="form-control d-none" type="file" id="formFile">
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
                                                                    <th scope="col">Hubungan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $id = $_SESSION['id'];
                                                                $query = "SELECT * FROM kel_karyawan WHERE karyawan_id = $id";
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
                                                                                } ?> ,
                                                                                <?php
                                                                                if ($karyawan['tanggal_lahir'] !== null) {
                                                                                    echo $karyawan['tanggal_lahir'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($karyawan['hubungan'] !== null) {
                                                                                    echo $karyawan['hubungan'];
                                                                                } else {
                                                                                    echo '-';
                                                                                } ?>
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