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
                    @include('frontend.partials.member_info')
                    @include('frontend.partials.member_level', ['group_id' => auth('web')->user()->group_id])
                </div>
                <div class="col-sm-9">
                    <div class="block-register-bds block-common">
                        <h2 class="title-style text-color2">Đăng tin bất động sản</h2>
                        <form class="frm-register-bds" action="{{ route('member.realestate.create') }}" method="post">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (count($arrListCate) > 1)
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="cate_id">Danh mục</label>
                                        </div>
                                        <select id="cate_id" name="cate_id" class="form-control select2">
                                            <option value="">--Chọn danh mục--</option>
                                            @foreach ($arrListCate as $cate)
                                                <option value="{{ $cate->id }}"{!! old('cate_id') == $cate->id ? ' selected="selected"' : '' !!}>{{ $cate->{'name_' . config('app.locale')} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" id="cate_id" name="cate_id" value="{{ old('cate_id', $arrListCate[0]->id) }}">
                            @endif
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
                                        <textarea id="description" name="description" class="form-control editorBasic" rows="8" cols="80" placeholder="Mô tả bất động sản...">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label>Tải hình ảnh cho bất động sản của bạn</label>
                                        </div>
                                        <div class="upload-photo">
                                            <div class="upload-photo-wrap" id="photo_panel" style="height: auto; line-height: normal; overflow: scroll-y;">
                                                @if (old('image_url'))
                                                    <div class="row">
                                                        @foreach (old('image_url') as $index => $image_url)
                                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                <div class="thumbnail" style="position: relative;">
                                                                    <a href="#" class="delete" style="position: absolute; top: -6px; left: -2px; z-index: 99; color: #ff7f27;"><i class="fa fa-times"></i></a>
                                                                    <img src="{{ image_url($image_url) }}" class="img-responsive" style="height: 90px;" />
                                                                    <div class="text-center" style="margin-top: 5px;">
                                                                        <input type="hidden" name="image_url[]" value="{{ $image_url }}">
                                                                        <input type="radio" name="thumbnail" value="{{ $image_url }}"{!! old('thumbnail') == $image_url ? ' checked="checked"' : '' !!}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="box-btn">
                                                <div id="fileUploader">Tải Hình Ảnh</div>
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
                                            <input type="hidden" id="longt" name="longt" value="{{ old('longt') }}">
                                            <input type="hidden" id="latt" name="latt" value="{{ old('latt') }}">
                                            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.5197902619793!2d135.5042122155558!3d34.6920673911877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1510627098695" frameborder="0" style="border:0;" allowfullscreen></iframe>-->
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
<script type="text/javascript" src="{!! asset('public/assets/lib/tinymce/tinymce.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.uploadfile.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        tinymce.init({
            selector: '.editorBasic',
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
            ],

            toolbar1: "undo redo | bold italic | styleselect | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink",

            menubar: 'false'
        });

        Frontend.loadDataAjax();

        var mediaUrl = '{{ config('nhadat.upload_url') . '/' }}';

        $('#fileUploader').uploadFile({
            url: '{!! route('ajax.upload-image') !!}',
            uploadPanel: $('#photo_panel'),
            maxFileAllowed: 10,
            allowedTypes: 'jpeg,jpg,png', //seperate with ','
            maxFileSize: '5242880', //in byte
            onSuccess: function(instance, panel, files, data, xhr) {
                if (instance.fileCounter > 0) {
                    instance.fileCounter--;
                }

                if (panel.find('.row').size() <= 0) {
                    var row = $('<div class="row"></div>').appendTo(panel);
                } else {
                    var row = panel.find('.row');
                }

                $(row).append('<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6"><div class="thumbnail" style="position: relative;"><a href="#" class="delete" style="position: absolute; top: -6px; left: -2px; z-index: 99; color: #ff7f27;"><i class="fa fa-times"></i></a><img src="' + mediaUrl + data.info.filename + '" class="img-responsive" style="height: 90px;" /><div class="text-center" style="margin-top: 5px;"><input type="hidden" name="image_url[]" value="' + data.info.filename + '"><input type="radio" name="thumbnail" value="' + data.info.filename + '"></div></div></div>');
            },
            onDelete: function(obj, instance, panel) {
                $(obj).parent().parent().remove();
                instance.fileCounter--;
            }
        });
    });
</script>
@stop