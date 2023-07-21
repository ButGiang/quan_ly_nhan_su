@extends('layout')

@section('content')   
    <?php 
        $avatar = Auth::user()->avatar;
    ?>
    <div class="row" style="max-height: 500px">
        <div class="col-md-4" style="margin-top: 5px">
            <div class="card card-primary">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $avatar }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $name }}</h3>
                    <p class="text-muted text-center">Phòng ban: {{ $phongban }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Ngày sinh</b> <span class="float-right">{{ $nhanvien->value('ngaysinh') }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <span class="float-right">{{ $nhanvien->value('email') }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Số điện thoại</b> <span class="float-right">{{ $nhanvien->value('sdt') }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Chuyên ngành</b> <span class="float-right">{{ $chuyennganh }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Trình độ</b> <span class="float-right">{{ $trinhdo }}</span>
                        </li>
                    </ul>
                </div>
            </div>         
        </div>

        <div class="col-md-8" style="margin-top: 5px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-header" style="margin-top: 2px;">
                                <h4 class="card-title">Sự kiện</h4>
                            </div>
        
                            <div class="card-body">
                                <div id="external-events">
                                    <div class="external-event bg-success">Ăn trưa</div>
                                    <div class="external-event bg-warning">Về nhà</div>
                                    <div class="external-event bg-info">Được nghỉ</div>
                                    <div class="external-event bg-primary">Báo cáo</div>
                                    <div class="external-event bg-danger">Deadline</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            Xóa thẻ sau khi dùng
                                        </label>                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tạo sự kiện</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 5px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div> 
        
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Tên sự kiện">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar" style="max-height: 480px"></div>
                        </div>
                    </div>
                </div>  

            </div>
        </div> 

    </div>
    
    <div class="row">      
        <div class="col-md-6" style="margin-top: 5px">
            <div class="card card-primary">
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            To Do List
                        </h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm">
                                <li class="page-item"><a href="#" class="page-link">«</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">»</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <ul class="todo-list ui-sortable" data-widget="todo-list">
                            <li> 
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo1" id="todoCheck1" checked="">
                                    <label for="todoCheck1"></label>
                                </div>
                                
                                <span class="text">Hoàn thành giao diện cho dự án</span>
                                
                                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 ngày</small>
                                
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo2" id="todoCheck2">
                                    <label for="todoCheck2"></label>
                                </div>
                                <span class="text">Làm responsive</span>
                                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 tuần</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text">Thiết kế cơ sở dữ liệu</span>
                                <small class="badge badge-primary"><i class="far fa-clock"></i> 2 tuần</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                    <label for="todoCheck4"></label>
                                </div>
                                <span class="text">Tạo dưng Back-end bằng Laravel</span>
                                <small class="badge badge-success"><i class="far fa-clock"></i> 4 tuần </small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                    <label for="todoCheck5"></label>
                                </div>
                                <span class="text">Hoàn thiện bài thực tập</span>
                                <small class="badge badge-success"><i class="far fa-clock"></i> 6 tuần</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-footer clearfix">
                        <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6" style="margin-top: 5px">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection