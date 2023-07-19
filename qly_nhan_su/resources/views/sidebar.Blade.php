<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="brand-link">
        <span class="brand-text font-weight-light">Welcome</span>
    </div>

    <?php 
    use App\Models\nhanvien;
    use App\Models\taikhoan;
        $id = Auth::user()->id;
        $name = nhanvien::where('id', $id)->value('ten');
        $avatar = 'http://127.0.0.1:8000/'. taikhoan::where('id', $id)->value('avatar');
        $email = Auth::user()->email;
        $token = Auth::user()->user_token;
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $avatar }}" class="img-circle elevation-2" alt="User Image" style="margin-right: 8px;">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b>{{ $name }}</b></a>
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

                {{-- Department --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building" aria-hidden="true"></i>
                        <p>
                            Phòng ban
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/department/list" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Danh sách phòng ban</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/department/add" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Phòng ban mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Major --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book" aria-hidden="true"></i>
                        <p>
                            Chức vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/major/list" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/major/add" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Contract --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-contract" aria-hidden="true"></i>
                        <p>
                            Hợp đồng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/contract/list" class="nav-link">
                            <i class="fas fa-file-signature nav-icon"></i>
                            <p>Hợp đồng đã tạo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/contract/add" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Tạo hợp đồng mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Time Keeping --}}
                <li class="nav-item">
                    <a href="/timekeeping" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt" aria-hidden="true"></i>
                        <p>
                            Chấm công
                            <i class="right fas fa-angle-right"></i> 
                        </p>
                    </a>
                </li>

                {{-- reward and punishment --}}
                <li class="nav-item">
                    <a href="/reward_punishment" class="nav-link">
                        <i class="nav-icon fas fa-expand-alt" aria-hidden="true"></i>
                        <p>
                            Khen thưởng và kỷ luật
                            <i class="right fas fa-angle-right"></i> 
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/extra/reward" class="nav-link">
                            <i class="fas fa-award nav-icon"></i>
                            <p>Khen thưởng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/extra/punishment" class="nav-link">
                            <i class="fas fa-exclamation nav-icon"></i>
                            <p>Kỷ luật</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/extra/add" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Tạo mới</p>
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
