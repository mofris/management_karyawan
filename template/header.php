<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="utf-8" />
    <title>Management Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo.svg">

    <!-- fullcalendar css -->
    <link href="../../assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="../../assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="../../assets/libs/sweetalert2/sweetalert2.min.css" />
    <script>
        sessionStorage.setItem("data-layout", 'harizontal');
    </script>

    <link href="../../assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <style>
        tbody .fc-day-sun {
            background-color: #FF6D60 !important;
        }

        tbody .fc-day-sun a {
            color: #B9EDDD !important;
        }

        .auth-page-wrapper .auth-page-content-register {
            padding-bottom: 60px;
            position: relative;
            z-index: 2;
            width: 30%;
        }
    </style>
</head>

<body>