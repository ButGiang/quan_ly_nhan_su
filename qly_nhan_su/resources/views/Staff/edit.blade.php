@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Họ và tên đệm</label>
                    <input type="text" name="first_name" class="form-control"  value="{{ $staff->ho }}" placeholder="Enter surname">
                </div>
    
                <div class="form-group col-md-6">
                    <label>Tên</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $staff->ten }}" placeholder="Enter name">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Giới tính</label>
                    <select name="gender" class="form-control">
                        @if($staff->gioitinh==1)
                            <option value='1' >Nam</option>
                            <option value='0'>Nữ</option>
                        @else
                            <option value='0'>Nữ</option>
                            <option value='1' >Nam</option>
                        @endif       
                    </select>
                </div>
    
                <div class="form-group col-md-6">
                    <label>Ngày sinh</label>
                    <input type="date" name="birthday" class="form-control" value="{{ $staff->ngaysinh }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Căn cước công dân</label>
                    <input type="text" name="CCCD" class="form-control" value="{{ $staff->CCCD }}" placeholder="Enter CCCD">
                </div>
    
                <div class="form-group col-md-4">
                    <label>email</label>
                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}" placeholder="Enter email">
                </div>

                <div class="form-group col-md-4">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ $staff->sdt }}" placeholder="Enter phone number">
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ $staff->diachi }}" placeholder="Enter address">
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Phòng ban</label>
                    <select name="department" class="form-control">
                        @foreach($departments as $department) 
                            <option value='{{ $department->id_phongban }}'>{{ $department->ten }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group col-md-4">
                    <label>Chuyên ngành</label>
                    <select name="major" class="form-control">
                        @foreach($majors as $major) 
                            <option value='{{ $major->id_chuyennganh }}'>{{ $major->ten }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group col-md-4">
                    <label>Trình độ</label>
                    <select name="level" class="form-control">
                        @foreach($levels as $level) 
                            <option value='{{ $level->id_trinhdo }}'>{{ $level->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
        </div>

        @csrf
    </form>
@endsection

@section('footer')

@endsection
