@extends('layout')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Method</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::major_list($majors) !!}
        </tbody>
    </table>
@endsection
