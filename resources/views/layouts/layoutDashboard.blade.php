<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS By TharakaEz</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- Include Styles --}}
    @include('libraries.userStyle')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('components.sideBar')
        <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('components.header')
            <!--  Header End -->
            <div class="container-fluid">

                {{-- Include Content --}}
                @yield('content')

                <div class="py-6 px-6 text-center">
                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>
    {{-- Include Scripts --}}
    @include('libraries.userScript')
</body>

</html>
