<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{$site_info->name ?? 'Mero Tailor'}} Admin </title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />--}}
    <link rel="icon" type="image/x-icon" style="height: 50px"
          href="{{ isset($site_info)  ? asset('storage/site-info-image/'. $site_info->image) : asset('assets/img/favicon.ico') }}"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @include('scripts.header')
    @stack('inlinecss')

</head>

<body class="alt-menu sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->
@auth
    @include('layouts.header')
@endauth

<!--  BEGIN MAIN CONTAINER  -->
@guest
    @yield('content')
@else
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

    @include('layouts.sidebar')

    <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
@endguest
<!-- END MAIN CONTAINER -->
@include('scripts.footer')
@stack('inlinejs')

</body>

</html>