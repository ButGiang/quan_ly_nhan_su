@extends('layout')

@section('content')
    <form action="/staff/search" method="POST">
        @csrf
        <div class="row" style="margin: 5px 0 0 15px">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="search_name" class="form-control">
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group">
                    <label>Phòng ban</label>
                    <select name='department' class="form-control">
                        <option disabled selected>-- Select --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id_phongban }}"> {{ $department->ten }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group">
                    <label>Chuyên ngành</label>
                    <select name='major' class="form-control">
                        <option disabled selected>-- Select --</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id_chuyennganh }}"> {{ $major->ten }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group">
                    <label>Trình độ</label>
                    <select name='level' class="form-control">
                        <option disabled selected>-- Select --</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id_trinhdo }}"> {{ $level->ten }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12" style="margin: 25px 0 0 10px">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-default">
                        Search 
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ & Tên</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Phòng ban</th>
                <th>Nghiệp vụ</th>
                <th>Trình độ</th>
                <th>Active</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::staff_list($staffs) !!}
        </tbody>
    </table>
@endsection
