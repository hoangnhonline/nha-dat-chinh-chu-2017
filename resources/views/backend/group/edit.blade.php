@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Chỉnh sửa</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Hệ thống</li>
        <li class="active"><a href="{{ route('group.index') }}">Nhóm</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('group.index') }}" style="margin-bottom: 5px;">Quay lại</a>
    <div class="box box-primary">
        <form role="form" method="POST" action="{{ route('group.update', [$groupInfo->id]) }}">
            <div class="box-body">
                @if (Session::has('message'))
                    <div class="alert alert-info" >{{ Session::get('message') }}</div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        @if ($groupInfo->type == 'admin')
                            <div class="form-group">
                                <label>Tên nhóm</label>
                                <input type="text" class="form-control" id="name_vi" name="name_vi" value="{{ old('name_vi', $groupInfo->name_vi) }}">
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" id="description_vi" name="description_vi" rows="5">{{ old('description_vi', $groupInfo->description_vi) }}</textarea>
                            </div>
                        @else
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#vi" role="tab" data-toggle="tab">Tiếng Việt</a>
                                </li>
                                <li role="presentation">
                                    <a href="#en" role="tab" data-toggle="tab">Tiếng Anh</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="vi" class="tab-pane active" role="tabpanel">
                                    <div class="form-group">
                                        <label>Tên nhóm</label>
                                        <input type="text" class="form-control" id="name_vi" name="name_vi" value="{{ old('name_vi', $groupInfo->name_vi) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giới thiệu</label>
                                        <textarea class="form-control" id="description_vi" name="description_vi" rows="5">{{ old('description_vi', $groupInfo->description_vi) }}</textarea>
                                    </div>
                                </div>
                                <div id="en" class="tab-pane" role="tabpanel">
                                    <div class="form-group">
                                        <label>Tên nhóm</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $groupInfo->name_en) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giới thiệu</label>
                                        <textarea class="form-control" id="description_en" name="description_en" rows="5">{{ old('description_en', $groupInfo->description_en) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="row">
                            @foreach ($arrListModule as $module)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>{{ $module->name }}</label>
                                        <div class="checkbox">
                                            @foreach ($arrPermission[$module->code] as $index => $role)
                                                <?php
                                                if ($module->code == 'view') {
                                                    $i = $index + 4;
                                                } else {
                                                    $i = $index;
                                                }
                                                ?>
                                                <label style="padding-right: 20px;"><input type="checkbox" name="permission[{!! $module->code !!}][{!! $arrRole[$i][0] !!}]" value="1"{!! $role == 1 ? ' checked="checked"' : '' !!}> {{ $arrRole[$i][1] }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('group.index')}}">Hủy</a>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@stop

@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function() {
        @if ($groupInfo->type == 'member')
            CKEDITOR.replace('description_vi', {
                language: 'vi',
                height: 300,
                toolbarGroups: [
                    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
                    { name: 'links', groups: ['links'] }
                ]
            });
            CKEDITOR.replace('description_en', {
                language: 'vi',
                height: 300,
                toolbarGroups: [
                    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
                    { name: 'links', groups: ['links'] }
                ]
            });
        @endif
    });
</script>
@stop