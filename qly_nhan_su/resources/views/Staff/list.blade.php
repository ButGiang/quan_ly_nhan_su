@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Nghiệp vụ</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Method</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::user_list($users) !!}
        </tbody>
    </table>
@endsection
