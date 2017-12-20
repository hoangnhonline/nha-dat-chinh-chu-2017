@extends('frontend.layout')

@section('title') Gói dịch vụ Bất động sản Lý Nguyễn @stop

@section('css')
<!-- css link here -->
@stop

@section('content')
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="active">Gói dịch vụ Bất động sản</li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="main-content container">
    <div class="main-content-wrap">
        <div class="block-package-service">
            <div class="block-title-common">
                <h1 class="title-main">Gói dịch vụ Bất động sản Lý Nguyễn</h1>
            </div>
            <div class="block-package-service-wrap">
                <div class="box-txt-wrap">
                    <p class="box-txt">+ Lựa chọn gói thành viên phù hợp để hưởng chính sách ưu đãi từ thongtinnhachinhchu.com:</p>
                    <p class="box-txt txt2">Đăng Tin Miễn Phí - Đăng Quảng Cáo Miễn Phí - Nhận Thông Tin BĐS Qua Email - Tham Gia Chương Trình Khuyến Mãi</p>
                </div>
                <div class="package-item-list">
                    @foreach ($arrListGroup as $index => $group)
                        <div class="package-item{!! $index == $arrListGroup->count() - 1 ? ' item_active' : '' !!}">
                            <div class="package-item-wrap">
                                <div class="box-top">
                                    <p class="box-tit">{!! $group->{'package_title_' . config('app.locale')} !!}</p>
                                    <p class="box-price">{{ number_format($group->package_amount, 0, '.', ',') }} VNĐ</p>
                                    <p class="txt">{{ $group->package_time == 1 ? '1 lần duy nhất' : '1 tháng' }}</p>
                                </div>
                                <div class="box-middle">{!! $group->{'description_' . config('app.locale')} !!}</div>
                                <div class="box-bottom">
                                    <p class="text-center">
                                        <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- /block-package-service -->
        </div><!-- /block-register-bds -->
    </div><!-- /main-content-wrap -->
</div><!-- /main-content -->
@stop

@section('javascript')
<!-- js link here -->
@stop