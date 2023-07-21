@extends('layout')

@section('content')
    <form action="/advanceSalary/search" method="POST">
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
                    <label>Trạng thái</label>
                    <select name='search_status' class="form-control">
                        <option value="">-- Select --</option>
                        <option value="1">Đã xử lý</option>
                        <option value="0">Đang xử lý</option>
                        <option value="-1">Đã hủy</option>
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
                <th>Tên nhân viên</th>
                <th>Ngày</th>
                <th>Số tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::advSalary_list($advSalarys) !!}
        </tbody>
    </table>
@endsection
