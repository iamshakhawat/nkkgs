</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('backend/student') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('backend/student') }}/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('backend/student') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('backend/student') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('backend/student') }}/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('backend/student') }}/js/off-canvas.js"></script>
<script src="{{ asset('backend/student') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('backend/student') }}/js/template.js"></script>
<script src="{{ asset('backend/student') }}/js/settings.js"></script>
<script src="{{ asset('backend/student') }}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
{{-- <script src="{{ asset('backend/student') }}/js/dashboard.js"></script> --}}
<script src="{{ asset('backend/student') }}/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

@if (Session::has('icon') || Session::has('messege'))
    <script>
        toastr["{{ Session::get('icon') }}"]("{{ Session::get('messege') }}");
    </script>
@endif

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

</script>

</body>

</html>
