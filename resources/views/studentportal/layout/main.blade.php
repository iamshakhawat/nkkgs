    @include('studentportal.layout.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('studentportal.layout.sidebar')
            <!-- partial -->


            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    @include('studentportal.layout.footer')