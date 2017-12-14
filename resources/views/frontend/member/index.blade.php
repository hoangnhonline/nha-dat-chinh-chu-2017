@extends('frontend.layout')

@section('title') My Account @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">My Account</li>
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
                <div class="col-sm-9 block-col-main">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2 text-center">Tài khoản của bạn</h2>
                        <form class="frm-register-bds" action="{{ route('member.detail.update') }}" method="post">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="full_name">Tên bạn</label>
                                        </div>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', auth('web')->user()->full_name) }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="email">Email</label>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth('web')->user()->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="phone">Phone</label>
                                        </div>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth('web')->user()->phone) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="username">Tên truy cập</label>
                                        </div>
                                        <input type="username" class="form-control" id="username" name="username" value="{{ old('username', auth('web')->user()->username) }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="avatar">Hình đại diện</label>
                                        </div>
                                        <div class="upload-photo">
                                            <div class="upload-photo-wrap" id="photo_panel" style="height: auto; line-height: normal; overflow: scroll-y;">
                                                @if (old('avatar'))
                                                    <div style="position: relative;">
                                                        <a href="#" class="delete" style="position: absolute; top: -15px; left: -11px; z-index: 99; color: #ff7f27;"><i class="fa fa-2x fa-times"></i></a>
                                                        <img src="{{ image_url(old('avatar')) }}" class="img-responsive" />
                                                        <input type="hidden" name="avatar" value="{{ old('avatar') }}">
                                                    </div>
                                                @elseif (!empty(auth('web')->user()->avatar))
                                                    <div style="position: relative;">
                                                        <a href="#" class="delete" style="position: absolute; top: -15px; left: -11px; z-index: 99; color: #ff7f27;"><i class="fa fa-2x fa-times"></i></a>
                                                        <img src="{{ image_url(auth('web')->user()->avatar) }}" class="img-responsive" />
                                                        <input type="hidden" name="avatar" value="{{ auth('web')->user()->avatar }}">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="box-btn">
                                                <div id="fileUploader">Tải Hình Ảnh</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="old_password">Password cũ</label>
                                        </div>
                                        <input type="password" class="form-control" id="old_password" name="old_password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="new_password">Password mới</label>
                                        </div>
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="boxBtnSubmit">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-main btn-lg add_arrow">Đổi mật khẩu</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="put">
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
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.uploadfile.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
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

                $(panel).html('<div style="position: relative;"><a href="#" class="delete" style="position: absolute; top: -15px; left: -11px; z-index: 99; color: #ff7f27;"><i class="fa fa-2x fa-times"></i></a><img src="' + mediaUrl + data.info.filename + '" class="img-responsive" /><input type="hidden" name="avatar" value="' + data.info.filename + '"></div>');
            },
            onDelete: function(obj, instance, panel) {
                $(obj).parent().remove();
                instance.fileCounter--;
            }
        });
    });
</script>
@stop