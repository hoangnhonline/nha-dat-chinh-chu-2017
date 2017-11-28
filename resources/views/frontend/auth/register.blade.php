@extends('frontend.layout')

@section('title') Đăng ký @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Đăng ký</li>
            </ul>
        </div>
    </div><!-- /block-breadcrumb -->
    <div class="main-content container">
        <div class="main-content-wrap">
            <div class="block-login-signin">
                <ul class="nav nav-tabs">
                    <li><a href="{{ route('auth.login') }}">ĐĂNG NHẬP</a></li>
                    <li class="active"><a data-toggle="tab" href="#block_signin">ĐĂNG KÝ THÀNH VIÊN</a></li>
                </ul>
                <div class="tab-content">
                    <div id="block_signin" class="tab-pane fade in active">
                        <div class="block-form-signin">
                            <h2 class="signin-title title-style text-color2">Đăng ký thành viên</h2>
                            <div class="row">
                                <div class="col-sm-7">
                                    <form class="frm-signin" action="{{ route('auth.register.post') }}" method="post">
                                        <div class="form-row row">
                                            <div class="col-sm-8 col-xs-12 col-sm-offset-4">
                                                <div class="login-by">
                                                    <strong>Đăng ký bằng:</strong>
                                                    <span><a href="{{ route('auth.social.login', ['facebook']) }}" title="Facebook"><img src="{!! asset('public/assets/images/icon_facebook.png') !!}" alt="Facebook"></a></span>
                                                    <span><a href="{{ route('auth.social.login', ['google']) }}" title="Google+"><img src="{!! asset('public/assets/images/icon_google.png') !!}" alt="Google+"></a></span>
                                                    <span><a href="{{ route('auth.social.login', ['twitter']) }}" title="Twitter"><img src="{!! asset('public/assets/images/icon_twitter.png') !!}" alt="Twitter"></a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Tên đầy đủ</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Điền tên đầy đủ tại đây...">
                                                @if ($errors->has('full_name'))
                                                    <label class="error" for="full_name">{{ $errors->first('full_name') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Tên đăng nhập</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Điền tên đăng nhập tại đây...">
                                                <p class="note">Có ít nhất 6 ký tự, bao gồm chữ cái và số</p>
                                                @if ($errors->has('username'))
                                                    <label class="error" for="username">{{ $errors->first('username') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Mật khẩu</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Điền mật khẩu tại đây...">
                                                <p class="note">Có ít nhất 6 ký tự, bao gồm chữ cái và số<br>
                                                    Phải có ít nhất một con số trong dãy mật khẩu bạn chọn</p>
                                                @if ($errors->has('password'))
                                                    <label class="error" for="password">{{ $errors->first('password') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Xác nhận mật khẩu</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="password_confirmed" class="form-control" id="password_confirmed" name="password_confirmed" placeholder="Điền xác nhận mật khẩu tại đây...">
                                                <p class="note">Vui lòng xác nhận mật khẩu của bạn lần nữa</p>
                                                @if ($errors->has('password_confirmed'))
                                                    <label class="error" for="password_confirmed">{{ $errors->first('password_confirmed') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Loại thành viên</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <select id="group_id" name="group_id" class="form-control select2" style="width: 100%;">
                                                    @foreach ($arrListGroup as $group)
                                                        <option value="{{ $group->id }}">{{ $group->{'name_' . config('app.locale')} }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="note">Chọn loại thành viên bạn muốn đăng ký</p>
                                                @if ($errors->has('group_id'))
                                                    <label class="error" for="group_id">{{ $errors->first('group_id') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Địa chỉ email</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Vui lòng điền email của bạn tại đây">
                                                @if ($errors->has('email'))
                                                    <label class="error" for="email">{{ $errors->first('email') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4">
                                                <div class="label-group">
                                                    <label>Di động</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                                @if ($errors->has('phone'))
                                                    <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" id="agree_term" name="agree_term" value="1"{!! old('agree_term', 0) == 1 ? ' checked="checked"' : '' !!}> Tôi đã đọc và đồng ý với các điều khoản của dịch vụ</label>
                                                    @if ($errors->has('agree_term'))
                                                        <label class="error" for="agree_term">{{ $errors->first('agree_term') }}</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-sm-8 col-xs-12 col-sm-offset-4">
                                                <div class="boxBtnSubmit">
                                                    <button type="submit" class="btn btn-main btn-lg add_arrow">Đăng ký</button>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </div>
                                                <p><span>Bạn đã có tài khoản? <a href="#">Hãy đăng nhập tại đây</a></span></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <div class="box-note">
                                        <p class="txt1">Thêm tài sản của bạn vào danh sách của chúng tôi chưa bao giờ được dễ dàng hơn</p>
                                        <ul>
                                            <li>Đăng ký</li>
                                            <li>Điền vào chi tiết sản phẩm</li>
                                            <li>Bán bất động sản của bạn ngay</li>
                                        </ul>
                                        <p class="txt2">Đăng ký thành viên ngay để được đăng tin BĐS của bạn miễn phí</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- block-form-signin -->
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