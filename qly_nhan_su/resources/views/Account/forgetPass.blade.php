<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/getPass" class="h1"><b>Quên</b> mật khẩu</a>
            </div>
            <div class="card-body">
                @include('alert')  
                <p class="login-box-msg">Nhập email tài khoản để lấy lại mật khẩu.</p>
              
                <form action="/getPass" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name='email' class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đặt lại mật khẩu</button>
                        </div>
                    </div>
                    @csrf
                </form>
                <p class="mt-3 mb-1">
                    <a href="/login">Login</a>
                </p>
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
