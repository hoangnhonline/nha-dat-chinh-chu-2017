@extends('frontend.layout')

@section('title') Đăng nhập @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Đăng nhập</li>
            </ul>
        </div>
    </div><!-- /block-breadcrumb -->
    <div class="main-content container">
        <div class="main-content-wrap">
            <div class="block-login-signin">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#block_login">ĐĂNG NHẬP</a></li>
                    <li><a href="{{ route('auth.register') }}">ĐĂNG KÝ THÀNH VIÊN</a></li>
                </ul>
                <div class="tab-content">
                    <div id="block_login" class="tab-pane fade in active">
                        <div class="block-form-login">
                            <div class="row">
                                <div class="col-md-7">
                                    <form class="frm-login" action="{{ route('auth.login.post') }}" method="post">
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
                                            <div class="col-sm-8 col-xs-12 col-sm-offset-4">
                                                <div class="login-by">
                                                    <strong>Đăng nhập bằng:</strong>
                                                    <span><a href="{{ route('auth.social.login', ['facebook']) }}" title="Facebook"><img src="{!! asset('public/assets/images/icon_facebook.png') !!}" alt="Facebook"></a></span>
                                                    <span><a href="{{ route('auth.social.login', ['google']) }}" title="Google+"><img src="{!! asset('public/assets/images/icon_google.png') !!}" alt="Google+"></a></span>
                                                    <span><a href="{{ route('auth.social.login', ['twitter']) }}" title="Twitter"><img src="{!! asset('public/assets/images/icon_twitter.png') !!}" alt="Twitter"></a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>TÊN ĐĂNG NHẬP</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="username" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Điền tên đăng nhập của bạn vào đây...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>MẬT KHẨU</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Điền mật khẩu của bạn vào đây...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row box-btn-action row">
                                            <div class="col-sm-8 col-xs-12 col-sm-offset-4 box-btn-submit">
                                                <button type="submit" class="btn btn-main btn-lg add_arrow">Đăng nhập</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div><!-- block-form-login -->
                    </div>
                </div>
            </div><!-- /block-login-signin -->
        </div><!-- /main-content-wrap -->
    </div><!-- /main-content -->
</div><!-- /main -->
@include('frontend.partials.email_register')
@stop

@section('javascript')
<!-- js link here -->
@stop