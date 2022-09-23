<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.header')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.partials.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.partials.navbar')
            <div class="main-panel p-0">

                <!-- partial -->
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.footer')
</body>

</html>
