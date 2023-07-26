<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        @include('sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    @include('alert')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title"> {{ $title }} </small></h3>
                                    <button class="btn-success float-right" style='border: 1px solid white; border-radius: 5px;' onclick="location.reload();"> 
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>


                                {{-- Main Content --}}
                                @yield('content')


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                Đồ án thực tập của <b>Đồng Nguyễn Bút Giang</b>
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>
    </div>

    @include('footer')
</body>

</html>
