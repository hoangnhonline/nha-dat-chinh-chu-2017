@extends('frontend.layout')

@section('title') Đăng tin tức @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Thành viên</li>
                <li class="active">Đăng tin tức</li>
            </ul>
        </div>
    </div><!-- /block-breadcrumb -->
    <div class="main-content container">
        <div class="main-content-wrap">
            <div class="row my-account-page">
                <div class="col-sm-3 block-col-sidebar">
                    @include('frontend.partials.member_info')
                    @include('frontend.partials.member_level', ['group_id' => auth('web')->user()->group_id])
                </div>
                <div class="col-sm-9">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2">Đăng tin tức</h2>
                        <form class="frm-register-bds" action="{{ route('member.news.store') }}" method="post">
                            @if (Session::has('message'))
                                <div class="alert alert-info" >{{ Session::get('message') }}</div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>- {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="cate_id">Danh mục</label>
                                        </div>
                                        <select id="cate_id" name="cate_id" class="form-control select2">
                                            <option value="">--Chọn danh mục--</option>
                                            @foreach ($arrListCate as $cate)
                                                <option value="{{ $cate->id }}"{!! old('cate_id', 0) == $cate->id ? ' selected="selected"' : '' !!}>{{ $cate->{'name_' . config('app.local')} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="title">Tiêu đề</label>
                                        </div>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Tiêu đề">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="description">Mô tả</label>
                                        </div>
                                        <textarea id="description" name="description" class="form-control editorBasic" rows="4" cols="80" placeholder="Mô tả tin tức...">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="content">Nội dung</label>
                                        </div>
                                        <textarea id="content" name="content" class="form-control editorBasic" rows="8" cols="80" placeholder="Nội dung tin tức...">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label>Hình đại diện</label>
                                        </div>
                                        <div class="upload-photo">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="upload-photo-wrap" id="photo_panel" style="height: auto; line-height: normal; overflow: auto;">
                                                        @if (old('image_url'))
                                                            <div>
                                                                <img src="{{ image_url(old('image_url')) }}" class="img-responsive" style="height: 90px;" />
                                                                <input type="hidden" name="image_url" value="{{ old('image_url') }}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="box-btn">
                                                        <div id="fileUploader">Tải Hình Ảnh</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="boxBtnSubmit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-main btn-lg add_arrow">Đăng tin</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /block-register-bds -->
                </div>
            </div><!-- /row -->
        </div><!-- /main-content-wrap -->
    </div><!-- /main-content -->
</div>
@stop

@section('javascript')
<!-- js link here -->
<script type="text/javascript" src="{!! asset('public/admin/dist/js/ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.uploadfile.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('content', {
            language: "{{ config('app.locale') }}",
            height: 300,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Strike', 'Subscript', 'Superscript'],
                ['TextColor', 'BGColor'],
                ['Undo', 'Redo', 'RemoveFormat'],
                ['Link', 'Unlink', 'Anchor']
            ]
        });

        var mediaUrl = '{{ config('nhadat.upload_url') . '/' }}';

        $('#fileUploader').uploadFile({
            url: '{!! route('ajax.upload-image') !!}',
            uploadPanel: $('#photo_panel'),
            maxFileAllowed: 1,
            allowedTypes: 'jpeg,jpg,png', //seperate with ','
            maxFileSize: '5242880', //in byte
            onSuccess: function(instance, panel, files, data, xhr) {
                if (instance.fileCounter > 0) {
                    instance.fileCounter--;
                }

                $(panel).html('<div><img src="' + mediaUrl + data.filename + '" class="img-responsive" style="height: 90px;" /><input type="hidden" name="image_url" value="' + data.filename + '"></div>');
            },
            onDelete: function(obj, instance, panel) {
                $(obj).parent().parent().remove();
                instance.fileCounter--;
            }
        });
    });
</script>
@stop