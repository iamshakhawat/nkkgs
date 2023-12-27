</div>


<script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('backend') }}/assets/js/jquery.slimscroll.js"></script>

<script src="{{ asset('backend') }}/assets/js/select2.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/moment.min.js"></script>

<script src="{{ asset('backend') }}/assets/js/fullcalendar.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/jquery.fullcalendar.js"></script>

<script src="{{ asset('backend') }}/assets/plugins/morris/morris.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/raphael/raphael-min.js"></script>
<script src="{{ asset('backend') }}/assets/js/apexcharts.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart-data.js"></script>

<script src="{{ asset('backend') }}/assets/js/app.js"></script>

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
