@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="active">Thành viên</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý thành viên</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên thành viên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Ảnh đại diện</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            @if(isset($user->avatar))
                                <td>
                                    {{ asset(pare_url_file($user->avatar)) }}
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@stop