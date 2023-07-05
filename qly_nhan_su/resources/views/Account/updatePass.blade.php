<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/updatePass" class="h1"><b>Update </b>Password</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Nhập mật khẩu mới cho tài khoản.</p>
                @include('alert') 
                <form action="/updatePass/{email}/{token}" method="post">
                    <div class="input-group mb-3">

                        <input type="hidden" name='email' value="{{ $email }}">
                        <input type="hidden" name='token' value="{{ $token }}">

                        <input type="password" name='password' class="form-control" placeholder="mật khẩu mới">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name='comfirm_password' class="form-control" placeholder="Xác nhận mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
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
