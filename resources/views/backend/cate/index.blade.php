@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Danh sách</h1>
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
            <div class="box-body">
                <table class="table table-bordered" id="table-list-data">
                    <thead>
                    <tr>
                        <th style="width: 1%;">#</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (!$arrListCate->isEmpty())
                        @foreach ($arrListCate as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name_vi }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('cate.edit', [$item->id ]) }}" class="btn-sm btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu.</td>
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