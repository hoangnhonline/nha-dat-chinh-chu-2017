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
            <li class="active">Gói dịch vụ Bất động sản Lý Nguyễn</li>
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
                    <div class="package-item">
                        <div class="package-item-wrap">
                            <div class="box-top">
                                <p class="box-tit">Xác thực bằng CMND</p>
                                <p class="box-price">0 VNĐ</p>
                                <p class="txt">1 lần duy nhất</p>
                            </div>
                            <div class="box-middle">
                                <ul>
                                    <li>Đăng tin miễn phí</li>
                                </ul>
                            </div>
                            <div class="box-bottom">
                                <p class="text-center">
                                    <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- /package-item -->
                    <div class="package-item">
                        <div class="package-item-wrap">
                            <div class="box-top">
                                <p class="box-tit">Xác thực bằng SMS</p>
                                <p class="box-price">15,000 VNĐ</p>
                                <p class="txt">1 lần duy nhất</p>
                            </div>
                            <div class="box-middle">
                                <ul>
                                    <li>Đăng tin miễn phí</li>
                                    <li>Nhận thông tin BĐS qua email hàng tháng</li>
                                </ul>
                            </div>
                            <div class="box-bottom">
                                <p class="text-center">
                                    <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- /package-item -->
                    <div class="package-item">
                        <div class="package-item-wrap">
                            <div class="box-top">
                                <p class="box-tit">Xác thực bằng Bank</p>
                                <p class="box-price">50,000 VNĐ</p>
                                <p class="txt">1 lần duy nhất</p>
                            </div>
                            <div class="box-middle">
                                <ul>
                                    <li>Đăng tin miễn phí</li>
                                    <li>Nhận thông tin BĐS qua email hàng tháng</li>
                                    <li>Rút thăm may mắn thẻ cào 200.000 VNĐ</li>
                                </ul>
                            </div>
                            <div class="box-bottom">
                                <p class="text-center">
                                    <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- /package-item -->
                    <div class="package-item item_active">
                        <div class="package-item-wrap">
                            <div class="box-top">
                                <p class="box-tit">Nâng cấp thành viên<br />*****</p>
                                <p class="box-price">VIP - 300,000 VNĐ</p>
                                <p class="txt">1 tháng</p>
                            </div>
                            <div class="box-middle">
                                <ul class="list_more">
                                    <li>Đăng tin miễn phí khung chính chủ</li>
                                    <li>Đăng tin miễn phí khung thành viên</li>
                                    <li class="text-active">Hiển thị tin đăng Trang Chủ - Trang Chuyên Mục - Tin Mới Nhất - Tin Hot Nhất</li>
                                    <li>Kiểm duyệt tin đăng online 24h/24h</li>
                                    <li>Nhận thông tin BĐS đã kiểm duyệt hàng tuần</li>
                                    <li>Rút thăm trúng thưởng bộ kích sóng wireless Dlink</li>
                                </ul>
                            </div>
                            <div class="box-bottom">
                                <p class="text-center">
                                    <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- /package-item -->
                    <div class="package-item">
                        <div class="package-item-wrap">
                            <div class="box-top">
                                <p class="box-tit">Đối tác</p>
                                <p class="box-price">500,000 VNĐ</p>
                                <p class="txt">1 tháng</p>
                            </div>
                            <div class="box-middle">
                                <ul class="list_more">
                                    <li>Đăng tin miễn phí khung đối tác</li>
                                    <li>Đăng tin miễn phí khung thành viên</li>
                                    <li class="text-active">Hiển thị tin đăng Trang Chủ - Trang Chuyên Mục - Tin Mới Nhất - Tin Hot Nhất</li>
                                    <li>Kiểm duyệt tin đăng online 24h/24h</li>
                                    <li>Nhận thông tin BĐS đã kiểm duyệt hàng tuần</li>
                                    <li>Rút thăm trúng thưởng bộ kích sóng wireless Dlink</li>
                                </ul>
                            </div>
                            <div class="box-bottom">
                                <p class="text-center">
                                    <a href="#" class="btn btn-main add_arrow">MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- /package-item -->
                </div>
            </div><!-- /block-package-service -->
        </div><!-- /block-register-bds -->
    </div><!-- /main-content-wrap -->
</div><!-- /main-content -->
@stop

@section('javascript')
<!-- js link here -->
@stop