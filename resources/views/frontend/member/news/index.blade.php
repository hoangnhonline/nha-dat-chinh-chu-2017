@extends('frontend.layout')

@section('title') Thành viên - Tin tức @stop

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
                <li class="active">Tin tức</li>
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
                        <h2 class="title-style text-color2">Danh sách tin tức</h2>
                        @if (Session::has('message'))
                            <div class="alert alert-info" >{{ Session::get('message') }}</div>
                        @endif
                        <div class="block-content-wrap">
                            @if (check_permission(auth('web')->user()->group_id, 'news', 'add'))
                                <a href="{{ route('member.news.create') }}" class="btn btn-main add_arrow">Đăng tin tức</a>
                            @endif
                            <div class="property-list style-grid" style="margin-top: 20px;">
                                @if ($arrListArticle->count() > 0)
                                    <div class="row">
                                        @foreach ($arrListArticle as $article)
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="property-item">
                                                    <div class="property-thumb">
                                                        @if (check_permission(auth('web')->user()->group_id, 'news', 'edit'))
                                                            <a href="{{ route('member.news.edit', [$article->id]) }}" title="{{ $article->{'title_' . config('app.locale')} }}">
                                                                <img src="{{ image_url($article->image_url) }}" alt="{{ $article->{'title_' . config('app.locale')} }}">
                                                            </a>
                                                        @else
                                                            <img src="{{ image_url($article->image_url) }}" alt="{{ $article->{'title_' . config('app.locale')} }}">
                                                        @endif
                                                    </div>
                                                    <div class="property-info">
                                                        <h3 class="property-title">
                                                            @if (check_permission(auth('web')->user()->group_id, 'news', 'edit'))
                                                                <a href="{{ route('member.news.edit', [$article->id]) }}" title="{{ $article->{'title_' . config('app.locale')} }}">{{ $article->{'title_' . config('app.locale')} }}</a>
                                                            @else
                                                                {{ $article->{'title_' . config('app.locale')} }}
                                                            @endif
                                                        </h3>
                                                        <p>{{ $article->{'description_' . config('app.locale')} }}</p>
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