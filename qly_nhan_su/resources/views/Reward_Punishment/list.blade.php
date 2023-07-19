@extends('layout')

@section('content')
    <div class="row" style="margin: 1px 0 0 19px">

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
