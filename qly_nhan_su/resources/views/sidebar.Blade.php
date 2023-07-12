<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="brand-link">
        <span class="brand-text font-weight-light">Welcome</span>
    </div>

    <?php 
    
    use App\Models\nhanvien;

        $id = Auth::user()->id;
        $name = nhanvien::where('id', $id)->value('ten');
        $avatar = Auth::user()->avatar;
        $email = Auth::user()->email;
        $token = Auth::user()->user_token;
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2" alt="User Image" style="margin-right: 8px;">
            </div>
            <div class="info">
                <a href=" {{ $avatar }}" class="d-block"><b>{{ $name }}</b></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" id='search-input'>
            <div class="input-group-append" id='search-btn'>
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fa fa-home" aria-hidden="true"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>

                {{-- Staff --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Nhân viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/staff/list" class="nav-link">
                            <i class="fas fa-list-ul nav-icon"></i>
                            <p>Danh sách nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/staff/add" class="nav-link">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Thêm mới nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Major --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book" aria-hidden="true"></i>
                        <p>
                            Chuyên ngành
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/major/list" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Danh sách chuyên ngành</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/major/add" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Thêm mới Chuyên ngành</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Account --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-user-circle" aria-hidden="true"></i>
                        <p>
                            Cá nhân
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>Thông tin cá nhân</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='/updatePass/{{ $email }}/{{ $token }}' class="nav-link">
                            <i class="fas fa-unlock nav-icon"></i>
                            <p>Đổi mật khẩu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>Đăng xuất</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>    
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
