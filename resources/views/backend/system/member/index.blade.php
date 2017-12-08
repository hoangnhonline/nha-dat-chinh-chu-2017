@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Nhóm</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Hệ thống</li>
        <li class="active">Thành viên BĐS</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    @if (Session::has('message'))
        <div class="alert alert-info" >{{ Session::get('message') }}</div>
    @endif
    <a href="{{ route('system.member.create', ['group_id' => $group_id]) }}" class="btn btn-info btn-sm" style="margin-bottom: 5px;">Tạo mới</a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
            <form class="form-inline" id="searchForm" role="form" method="GET" action="{{ route('system.member.index') }}">
                <div class="form-group">
                    <select class="form-control" name="group_id" id="group_id">
                        <option value="">-- Nhóm --</option>
                        @foreach ($arrListGroup as $item)
                            <option value="{{ $item->id }}"{!! $item->id == $group_id ? ' selected="selected"' : '' !!}>{{ $item->name_vi }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Lọc</button>
            </form>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered" id="table-list-data">
                <thead>
                    <tr>
                        <th style="width: 1%;">#</th>
                        <th>Họ và tên</th>
                        <th>Tên truy cập</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$arrListUser->isEmpty())
                        @foreach ($arrListUser as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ route('system.member.edit', [$item->id ]) }}" class="btn-sm btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="javascript:void(0);" class="btn-sm btn btn-danger" onclick="return callDelete('{{ $item->full_name }}', '{{ route('system.member.destroy', [$item->id]) }}');"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@stop

@section('javascript_page')
@stop