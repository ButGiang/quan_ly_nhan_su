@extends('layout')

@section('content')
    <form action="/extra/search" method="POST">
        @csrf
        <div class="row" style="margin: 5px 15px 0 15px; border-bottom: 1px solid black">

            <div class="col-md-3">
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="search_name" class="form-control">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name='search_status' class="form-control">
                        <option value="">-- Select --</option>
                        <option value="1">Đã xử lý</option>
                        <option value="0">Đang xử lý</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2" style="margin: 25px 0 0 10px">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-default">
                        Search 
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="row" style="margin: 1px 0 0 19px;">
        <div class="col-md-6">
            <div class="form-group" style="text-align: center; height:100%; border-right: 1px solid black;">
                <label style='margin:30px 19px 0 0'>Khen thưởng</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group" style="text-align: center;">
                <label style="margin-top: 30px;">Kỷ luật</label>
            </div>
        </div>
    </div>


    <div class="row" style="margin: 5px 0 0 5px"> 
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Phân loại</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Nhân viên</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
                    {!! \App\Helpers\Helper::reward_list($rewards) !!}
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Phân loại</th>
                        <th>Ngày</th>
                        <th>Trạng thái</th>
                        <th>Nhân viên</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
                    {!! \App\Helpers\Helper::punishment_list($punishments) !!}
                </tbody>
            </table>
        </div>

    </div>
    
@endsection
