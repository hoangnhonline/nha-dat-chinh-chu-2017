@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Tạo mới</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Hệ thống</li>
        <li class="active">Thành viên BĐS</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('group.member.index', ['group_id' => $group_id]) }}" style="margin-bottom: 5px;">Quay lại</a>
    <div class="box box-primary">
        <form role="form" method="POST" action="{{ route('group.member.store') }}">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Email<span class="red-star">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Tên truy cập<span class="red-star">*</span></label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu <span class="red-star">*</span></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu <span class="red-star">*</span></label>
                            <input type="password" class="form-control" name="re_password" id="re_password">
                        </div>
                        <div class="form-group">
                            <label>Họ tên <span class="red-star">*</span></label>
                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1"{!! old('status', 1) == 1 ? ' selected="selected"' : '' !!}>Mở</option>
                                <option value="2"{!! old('status', 1) == 2 ? ' selected="selected"' : '' !!}>Khóa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhóm</label>
                            <select class="form-control" name="group_id" id="group_id">
                                <option value="">-- Chọn nhóm --</option>
                                @foreach ($arrListGroup as $group)
                                    <option value="{{ $group->id }}"{!! old('group_id', $group_id) == $group->id ? ' selected="selected"' : '' !!}>{{ $group->name_vi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('group.member.index', ['group_id' => $group_id]) }}">Hủy</a>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@stop

@section('javascript_page')
@stop