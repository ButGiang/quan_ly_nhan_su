<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>

<body class="hold-transition login-page" style="background-image: url('https://wallpapers.com/images/featured/picture-en3dnh2zi84sgt3t.jpg')">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/login" class="h1"><b>Log</b> In</a>
            </div>

            <div class="card-body">
                @include('alert')
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc.</p>
                
                <form action="/login" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name='email' class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name='password' class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <p class="mb-1">
                                <a href="/getPass">Quên mật khẩu</a>
                            </p>
                        </div>
                        <div class="col-5">
                            <button type="submit" style="background-color: rgb(54, 191, 54)" class="btn btn-primary btn-block">Đăng Nhập</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
