@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Nhóm</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Hệ thống</li>
        <li class="active">Nhóm</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    @if (Session::has('message'))
        <div class="alert alert-info" >{{ Session::get('message') }}</div>
    @endif
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
                        <th>Tên</th>
                        <th>Loại nhóm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$arrListGroup->isEmpty())
                        @foreach ($arrListGroup as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name_vi }}</td>
                                <td>{{ $item->type == 'admin' ? 'Quản trị' : 'Thành viên BĐS' }}</td>
                                <td>
                                    <a href="{{ route('system.group.edit', [$item->id ]) }}" class="btn-sm btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    @if ($item->type == 'admin')
                                        <a href="{{ route('system.admin.index', ['group_id' => $item->id ]) }}" class="btn-sm btn btn-info"><i class="fa fa-eye"></i> Thành viên</a>
                                    @else
                                        <a href="{{ route('system.member.index', ['group_id' => $item->id ]) }}" class="btn-sm btn btn-info"><i class="fa fa-eye"></i> Thành viên</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">Không có dữ liệu.</td>
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