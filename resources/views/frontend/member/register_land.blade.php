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
                        <div class="box-avatar"></div>
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
                    @include('frontend.partials.member_level', ['group_id' => auth('web')->user()->group_id])
                </div>
                <div class="col-sm-9">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2">Đăng tin bất động sản</h2>
                        <form class="frm-register-bds" action="{{ route('member.register-land') }}" method="post">
                            <div class="form-row row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="type">Loại giao dịch</label>
                                        </div>
                                        <select id="type" name="type" class="form-control select2 load-ajax" data-href="{{ route('ajax.get-estate-type', [0]) }}" data-for="#estate_type_id">
                                            <option value="">--Chọn loại giao dịch--</option>
                                            <option value="1"{!! old('type') == 1 ? ' selected="selected"' : '' !!}>Bán</option>
                                            <option value="2"{!! old('type') == 2 ? ' selected="selected"' : '' !!}>Cho thuê</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="estate_type_id">Loại bất động sản</label>
                                        </div>
                                        <select id="estate_type_id" name="estate_type_id" data-id="{{ old('estate_type_id', 0) }}" class="form-control select2">
                                            <option value="">--Chọn loại bất động sản--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="price">Giá</label>
                                        </div>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="street_num">Địa chỉ</label>
                                        </div>
                                        <input type="text" class="form-control" id="street_num" name="street_num" value="{{ old('street_num') }}" placeholder="Số">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="street_name">&nbsp;</label>
                                        </div>
                                        <input type="text" class="form-control" id="street_name" name="street_name" value="{{ old('street_name') }}" placeholder="Đường">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="city_id">&nbsp;</label>
                                        </div>
                                        <select id="city_id" name="city_id" class="form-control select2 load-ajax" data-href="{{ route('ajax.get-district', [0]) }}" data-for="#district_id">
                                            <option value="">--Chọn thành phố--</option>
                                            @foreach ($arrListCity as $city)
                                                <option value="{{ $city->id }}"{!! old('city_id', 0) == $city->id ? ' selected="selected"' : '' !!}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <select id="district_id" name="district_id" class="form-control select2 load-ajax" data-href="{{ route('ajax.get-ward', [0]) }}" data-for="#ward_id">
                                        <option value="">--Chọn quận--</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="ward_id" name="ward_id" class="form-control select2">
                                            <option value="">--Chọn phường--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="">Mô tả thêm bất động sản</label>
                                        </div>
                                        <textarea id="description" name="description" class="form-control" rows="8" cols="80" placeholder="Mô tả bất động sản...">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="">Tải hình ảnh cho bất động sản của bạn</label>
                                        </div>
                                        <div class="upload-photo">
                                            <div class="upload-photo-wrap">
                                            </div>
                                            <div class="box-btn">
                                                <button type="submit" class="btn btn-main btn-lg add_arrow">Tải Hình Ảnh</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Ít nhất một hình ảnh sẽ được yêu cầu để tạo giá trị cho đăng tin. Hình ảnh sẽ được sử dụng để được hiện thị trong phần danh sách bất động sản trên trang web</p>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="">Cài đặt địa chỉ trên bản đồ</label>
                                        </div>
                                        <div class="map-wrap">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.5197902619793!2d135.5042122155558!3d34.6920673911877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1510627098695" frameborder="0" style="border:0;" allowfullscreen></iframe>
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
<script type="text/javascript">
    $(document).ready(function() {
        Common.loadDataAjax();
    });
</script>
@stop