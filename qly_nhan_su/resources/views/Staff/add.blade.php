@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Họ và tên đệm</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter surname">
                </div>
    
                <div class="form-group col-md-6">
                    <label>Tên</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter name">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ngày sinh</label>
                    <input type="date" name="birthday" class="form-control">
                </div>
    
                <div class="form-group col-md-6">
                    <label>Giới tính</label>
                    <select name="gender" class="form-control">
                        <option value='1' >Nam</option>
                        <option value='0'>Nữ</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Căn cước công dân</label>
                    <input type="text" name="CCCD" class="form-control" placeholder="Enter CCCD">
                </div>
    
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <div class="form-group col-md-4">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Enter address">
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
            
        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Thêm</button>
        </div>
        
        @csrf
    </form>
@endsection
