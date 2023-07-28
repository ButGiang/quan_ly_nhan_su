@extends('layout')

@section('content')
    <form action="/salary/list/search" method="POST">
        @csrf
        <div class="row" style="margin: 5px 0 0 15px">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="search_name" class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Tháng</label>
                    <input type="month" name="month" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group" style="margin-top: 25px">
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
                <th>Tháng</th>
                <th>Lương ban đầu</th>
                <th>Tạm ứng</th>
                <th>Tổng lương</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::salary_list($salarys) !!}
        </tbody>
    </table>
@endsection
