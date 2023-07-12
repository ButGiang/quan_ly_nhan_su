@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ & Tên</th>
                <th>Ngày sinh</th>
                <th>CCCD</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Phòng ban</th>
                <th>Nghiệp vụ</th>
                <th>Trình độ</th>
                <th>Active</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::staff_list($staffs) !!}
        </tbody>
    </table>
@endsection
