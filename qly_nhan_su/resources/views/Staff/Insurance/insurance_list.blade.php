@extends('layout')

@section('content')
    <form action="/staff/insurance/search" method="POST">
        @csrf
        <div class="row" style="margin: 5px 0 0 15px">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="search_name" class="form-control">
                </div>
            </div>

            <div class="col-md-3" style="margin: 25px 0 0 10px">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-default">
                        Search 
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-1">
                <a href="insurance/add" class="form-group btn btn-primary add-btn">
                    <i class="fas fa-plus-circle" style="color: white"> Thêm mới</i>
                </a>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ & Tên</th>
                <th>Mã bảo hiểm</th>
                <th>Nơi đăng ký</th>
                <th>Ngày đăng ký</th>
                <th>Nơi khám bệnh</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::insurance_list($insurances) !!}
        </tbody>
    </table>
@endsection
