<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['authentication'])) {
    echo "<script>window.location.href='../authentication'</script>";
} ?>

<?php include '../../template/header.php' ?>

<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/img/logo.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/img/logo.svg" alt="" height="40">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/img/logo.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/img/logo.svg" alt="" height="17">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center">
                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>
                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a class="mt-5 logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/img/logo.svg" alt="" height="100">
                </span>
                <span class="logo-lg">
                    <img src="assets/img/logo.svg" alt="" height="100">
                </span>
            </a>
            <!-- Light Logo-->
            <a class="logo logo-light mt-5">
                <span class="logo-sm">
                    <img src="assets/img/logo.svg" alt="" height="35">
                </span>
                <span class="logo-lg">
                    <img src="assets/img/logo.svg" alt="" height="100">
                    <h5 class="mt-2" style="color:white">E-Booking Meeting Room</h5>
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>


        </div>

        <div id="scrollbar">
            <div class="container-fluid">
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link active" href="/e-room">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Meeting Room</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z" />
                            </svg> <span data-key="t-dashboards">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>


    <div class="vertical-overlay"></div>
    <div id="two-column-menu"></div>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Calendar Meeting Room</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active">Calendar</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        <button class="btn btn-primary w-100" id="btn-new-event">
                                            <i class="mdi mdi-doc"></i> Form Booking Meeting Room
                                        </button>
                                        <div id="external-events">
                                            <br>
                                            <form action="save_schedule1" method="POST" id="schedule-form">
                                                <input type="hidden" name="id" value="">
                                                <div class="form-group mb-2">
                                                    <label for="start_datetime" class="control-label">Meeting Start Date</label>
                                                    <input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="end_datetime" class="control-label">Meeting End Date</label>
                                                    <input type="datetime-local" class="form-control" name="end_datetime" id="end_datetime" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="title" class="control-label">Agenda</label>
                                                    <input type="text" class="form-control" name="title" id="title" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="title" class="control-label">Departement</label>
                                                    <input type="text" class="form-control" name="dept" id="title" required id="dept" readonly>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="nama" class="control-label">Rooms</label>
                                                    <select class="form-control" name="room" id="room" required>
                                                        <option value="" disabled selected>Rooms Meeting</option>
                                                        <option value="ASSESSMENT MEETING ROOM">ASSESSMENT MEETING ROOM</option>
                                                        <option value="HRD MEETING ROOM">HRD MEETING ROOM</option>
                                                        <option value="GABUNGAN">GABUNGAN</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="nama" class="control-label">Participan</label>
                                                    <input type="number" class="form-control" name="participan" id="participan" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="nama" class="control-label">Name</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="description" class="control-label">Notes</label>
                                                    <textarea rows="3" class="form-control" name="description" id="description" required></textarea>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <button class="btn btn-primary" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                                <button class="btn btn-danger border" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body bg-soft-info">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i data-feather="calendar" class="text-info icon-dual-info"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mt-1">Schedule for the use of the 2nd floor HRD meeting room</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-h-100">
                                    <div class="card p-3" id="calendar"></div>
                                </div>
                                <div class="card">
                                    <div class="card-body bg-soft-info">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i data-feather="calendar" class="text-info icon-dual-info"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mt-1">Schedule for the use of the 2nd floor assessment meeting room</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-h-100">
                                    <div class="card p-3" id="calendar1"></div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <!-- Event Details Modal -->
                        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header rounded-0">
                                        <h5 class="modal-title">Schedule Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <hr>
                                    <div class="modal-body rounded-0">
                                        <div class="container-fluid">
                                            <dl>
                                                <dt class="text-muted">Agenda</dt>
                                                <span id="title" class="fw-bold fs-2" style=" text-transform: uppercase !important"></span>
                                                <dt class="text-muted">Start</dt>
                                                <dd id="start" class="fw-bold fs-5"></dd>
                                                <dt class="text-muted">End</dt>
                                                <dd id="end" class="fw-bold fs-5"></dd>
                                                <dt class="text-muted">Notes</dt>
                                                <dd id="description" class=""></dd>

                                            </dl>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="modal-footer rounded-0">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                                            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header rounded-0">
                                        <h5 class="modal-title">Schedule Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <hr>
                                    <div class="modal-body rounded-0">
                                        <div class="container-fluid">
                                            <dl>
                                                <dt class="text-muted">Agenda</dt>
                                                <span id="title" class="fw-bold fs-2" style=" text-transform: uppercase !important"></span>
                                                <dt class="text-muted">Start</dt>
                                                <dd id="start" class="fw-bold fs-5"></dd>
                                                <dt class="text-muted">End</dt>
                                                <dd id="end" class="fw-bold fs-5"></dd>
                                                <dt class="text-muted">Notes</dt>
                                                <dd id="description" class=""></dd>

                                            </dl>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="modal-footer rounded-0">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                                            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->
</div>

<a href="../authentication/logout.php">Logout</a>

<?php include '../../template/footer.php' ?>