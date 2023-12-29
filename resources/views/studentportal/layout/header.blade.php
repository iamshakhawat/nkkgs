<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/student') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('backend/student') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('backend/student') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/student') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('backend/student') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/student') }}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/student') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('backend/student') }}/images/favicon.png" />
    
	<script src="{{ asset('backend') }}/assets/js/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/toastr.min.css">
	<script src="{{ asset('backend') }}/assets/js/toastr.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('studentportal.layout.navbar')
