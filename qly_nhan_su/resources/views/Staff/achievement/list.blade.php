@extends('layout')

@section('content')
    <form action="/staff/achievement/search" method="POST">
        @csrf
        <div class="row" style="margin: 5px 0 0 15px">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="search_name" class="form-control">
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
            
            <div class="col-md-6"></div>

            <div class="col-md-1">
                <a href="achievement/add" class="form-group btn btn-primary add-btn">
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
                <th>Loại</th>
                <th>Tên thành tựu</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::achievement_list($achievement) !!}
        </tbody>
    </table>
@endsection
