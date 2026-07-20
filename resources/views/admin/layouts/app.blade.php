<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::Flexibel:: @yield('title')</title>
    <link rel="icon" href="{{ url('/') }}//public/admin_public/dist/assets/images/favicon_flexi.png" type="image/x-icon"> <!-- Favicon-->

    @stack('styles')

    <!-- project css file  -->
    <link rel="stylesheet" href="{!! asset('public/admin_public/ebazar.style.min.css') !!}">

    @stack('custom_styles')
</head>

<body>
    <div id="ebazar-layout" class="theme-blue">

        @include('admin.includes.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            @include('admin.includes.header')

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                @yield('content')
            </div>

            @yield('footer')

            <!-- Modal Custom Settings-->

            @stack('modals')

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="{!! asset('public/admin_public/dist/assets/bundles/libscripts.bundle.js') !!}"></script>
    @stack('scripts')
    <!-- Jquery Page Js -->
    <script src="{!! asset('public/admin_public/dist/assets/js/template.js') !!}"></script>
    @stack('custom_scripts')
</body>

</html>