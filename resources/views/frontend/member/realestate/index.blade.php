@extends('frontend.layout')

@section('title') My Land @stop

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
                <li class="active">Bất động sản</li>
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
                        <h2 class="title-style text-color2">Danh sách bất động sản</h2>
                        @if (Session::has('message'))
                            <div class="alert alert-info" >{{ Session::get('message') }}</div>
                        @endif
                        <div class="block-content-wrap">
                            @if (check_permission(auth('web')->user()->group_id, 'news', 'add'))
                                <a href="{{ route('member.realestate.create') }}" class="btn btn-main add_arrow">Đăng tin BĐS</a>
                            @endif
                            <div class="property-list style-grid" style="margin-top: 20px;">
                                @if ($arrListProduct->count() > 0)
                                    <div class="row">
                                        @foreach ($arrListProduct as $product)
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="property-item">
                                                    <div class="property-thumb">
                                                        @if (check_permission_estate(auth('web')->user()->group_id, 'edit'))
                                                            <a href="{{ route('member.realestate.edit', [$product->id]) }}" title="{{ $product->{'title_' . config('app.locale')} }}">
                                                                <img src="{{ image_url($product->image_url) }}" alt="{{ $product->{'title_' . config('app.locale')} }}">
                                                            </a>
                                                        @else
                                                            <img src="{{ image_url($product->image_url) }}" alt="{{ $product->{'title_' . config('app.locale')} }}">
                                                        @endif
                                                    </div>
                                                    <div class="property-info">
                                                        <h3 class="property-title">
                                                            @if (check_permission_estate(auth('web')->user()->group_id, 'edit'))
                                                                <a href="{{ route('member.realestate.edit', [$product->id]) }}" title="{{ $product->{'title_' . config('app.locale')} }}">{{ $product->{'title_' . config('app.locale')} }}</a>
                                                            @else
                                                                {{ $product->{'title_' . config('app.locale')} }}
                                                            @endif
                                                        </h3>
                                                        <p class="property-location">{{ $product->street_num . ' ' . $product->{'street_name_' . config('app.locale')} }}</p>
                                                        <div class="property-price">
                                                            <div class="price-new">{{ $product->price }} đ</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="block-pagination">{{ $pagination }}</div>
                                @endif
                            </div>
                        </div>
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