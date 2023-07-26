@extends('layout')

@section('content')
    <form action="/staff/bank/search" method="POST">
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
                <a href="bank/add" class="form-group btn btn-primary" style="margin-top: 10px">
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
                <th>Tên ngân hàng</th>
                <th>Số tài khoản</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::bank_list($banks) !!}
        </tbody>
    </table>
@endsection
