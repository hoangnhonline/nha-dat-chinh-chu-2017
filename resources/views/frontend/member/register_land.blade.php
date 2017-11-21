@extends('frontend.layout')

@section('title') Đăng tin bất động sản @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Đăng tin bất động sản</li>
            </ul>
        </div>
    </div><!-- /block-breadcrumb -->
    <div class="main-content container">
        <div class="main-content-wrap">
            <div class="row my-account-page">
                <div class="col-sm-3 block-col-sidebar">
                    <div class="block-module">
                        <div class="box-avatar">
                            <img src="uploads/" alt="">
                        </div>
                        <div class="block-content">
                            <form method="" action="">
                                <div class="form-group">
                                    <ul class="menu-my-account">
                                        <li><a href="{{ route('member.register-land') }}"><i class="fa fa-cog"></i> Đăng tin bđs</a></li>
                                        <li><a href="{{ route('member.detail') }}"><i class="fa fa-user"></i> Tài khoản của bạn</a></li>
                                        <li><a href="{{ route('member.land') }}"><i class="fa fa-home"></i> Bất động sản của bạn</a></li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <div class="btn-submit">
                                        <a role="button" class="btn btn-main btn-lg show add_arrow" href="{{ route('auth.logout') }}">Đăng xuất</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /block-module -->
                    @include('frontend.partials.member_level')
                </div>
                <div class="col-sm-9">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2">Đăng tin bất động sản</h2>
                        <form class="frm-register-bds" action="{{ route('member.register-land') }}" method="post">
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
@stop