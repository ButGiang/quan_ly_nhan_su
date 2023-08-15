<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="/template/dist/css/adminlte.min.css?v=3.2.0">

<link rel="stylesheet" href="/template/plugins/fullcalendar/main.css">

<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>

<style>
    .mini-menu {
        margin-left: 15px;
    }
    .card-title {
        margin-top: 5px;
    }
    .add-btn {
        margin-top: 23px;
    }
</style>

@yield('header')


