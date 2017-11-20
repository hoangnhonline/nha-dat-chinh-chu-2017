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
                    <div class="block-module">
                        <div class="box-avatar">
                            <img src="uploads/" alt="">
                        </div>
                        <div class="block-content">
                            <form method="" action="">
                                <div class="form-group">
                                    <ul class="menu-my-account">
                                        <li><a href="{{ route('member.register-land') }}"><i class="fa fa-setting"></i> Đăng tin bđs</a></li>
                                        <li><a href="{{ route('member.detail') }}"><i class="fa fa-user"></i> Tài khoản của bạn</a></li>
                                        <li><a href="#"><i class="fa fa-home"></i> Bất động sản của bạn</a></li>
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
                    <div class="block-module">
                        <div class="block-title">
                            <h2 class="title">Cấp độ thành viên của</h2>
                        </div>
                        <div class="block-content">
                            <form method="" action="" class="frm-">
                                <div class="form-group">
                                    <select name="" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option value="0">Miễn phí - Vip - Supper Vip</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 238px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2--container"><span class="select2-selection__rendered" id="select2--container" title="Miễn phí - Vip - Supper Vip">Miễn phí - Vip - Supper Vip</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                                <div class="form-group">
                                    <div class="btn-submit">
                                        <button type="submit" class="btn btn-main btn-lg show add_arrow">Thanh toán ngay</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p><a href="#"><i class="fa fa-angle-double-right"></i> Chi tiết các loại cấp độ thành viên</a></p>
                                </div>
                            </form>
                        </div>
                    </div><!-- /block-module -->
                </div>
                <div class="col-sm-9 block-col-main">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2 text-center">Tài khoản của bạn</h2>
                        <form class="frm-register-bds" action="{{ route('member.detail.update') }}" method="post">
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="full_name">Tên bạn</label>
                                        </div>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', auth('web')->user()->full_name) }}">
                                        @if ($errors->has('full_name'))
                                            <label class="error" for="full_name">{{ $errors->first('full_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="email">Email</label>
                                        </div>
                                        <input type="email" class="form-control" value="{{ old('email', auth('web')->user()->email) }}" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <div class="form-group form-row">
                                        <div class="label-group">
                                            <label for="address">Địa chỉ</label>
                                        </div>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', auth('web')->user()->address) }}">
                                        @if ($errors->has('address'))
                                            <label class="error" for="address">{{ $errors->first('address') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="phone">Phone</label>
                                        </div>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth('web')->user()->phone) }}">
                                        @if ($errors->has('phone'))
                                            <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                                        @endif
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
@stop