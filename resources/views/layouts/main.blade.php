<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!--Style-->
    <link rel="stylesheet" href="/css/style.css">
    <!--Sidebar-->
    <link rel="stylesheet" href="/css/sidebar.css">

    {{--Icons--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--flatpickr-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Livewire -->
    @livewireStyles

    <!--Chart-->
    @yield('scrChart')


    <title>Layouts MainSIMITA | Admin</title>
</head>
<body>

<main>
    <div class="w-25 sticky-top" >
        <!--{{--@include('admin.partials.sidebar')--}}-->
        @if(auth()->user()->role == 'karyawan')
            @include('partials.sidebarAdmin')
        @elseif(auth()->user()->role == 'pemilik')
            @include('partials.sidebarPemilik')
        @endif
    </div>

    <div class="container " style="">
        @yield('container')
    </div>
</main>

<!--JS Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@livewireScripts

@stack('modals')
@livewireScripts
@stack('scripts')

@stack('modals')
</body>
</html>
