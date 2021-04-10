<!DOCTYPE html>
<html lang="en">
@include('partials/head')
<body id="page-top">
    
    <div id="wrapper">
        @include('partials/dropdown')
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('partials/navbar')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('partials/footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('partials/scripts')
</body>
</html>