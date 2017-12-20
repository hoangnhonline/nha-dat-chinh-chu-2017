@extends('frontend.layout')

@section('title') Đăng tin bất động sản @stop

@section('css')
<!-- css link here -->
<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map-abc {
      height: 400px;
    }


    #infowindow-content .title {
      font-weight: bold;
    }

    #infowindow-content {
      display: none;
    }

    #map-abc #infowindow-content {
      display: inline;
    }

    .pac-card {
      margin: 10px 10px 0 0;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      background-color: #fff;
      font-family: Roboto;
    }

    #pac-container {
      padding-bottom: 12px;
      margin-right: 12px;
    }

    .pac-controls {
      display: inline-block;
      padding: 5px 11px;
    }

    .pac-controls label {
      font-family: Roboto;
      font-size: 13px;
      font-weight: 300;
    }

    #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 400px;
      border: 2px solid #45a44b;
      height: 30px;
    }

    #pac-input:focus {
      border-color: #4d90fe;
    }
</style>
@stop

@section('content')
<div class="main">
    <div class="block block-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Thành viên</li>
                <li class="active">Chỉnh sửa tin bất động sản</li>
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
                        <h2 class="title-style text-color2">Chỉnh sửa tin bất động sản</h2>
                        <form id="frmRealEstate" name="frmRealEstate"  class="frm-register-bds" action="{{ route('member.realestate.update', [$productInfo->id]) }}" method="post">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>- {{ $error }}</li>
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
                                                <option value="{{ $cate->id }}"{!! old('cate_id', $productInfo->cate_id) == $cate->id ? ' selected="selected"' : '' !!}>{{ $cate->{'name_' . config('app.locale')} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" id="cate_id" name="cate_id" value="{{ old('cate_id', $productInfo->cate_id) }}">
                            @endif
                            <div class="form-row row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="type">Loại giao dịch</label>
                                        </div>
                                        <select id="type" name="type" class="form-control select2 load-ajax" data-href="{{ route('ajax.get-estate-type', [0]) }}" data-for="#estate_type_id">
                                            <option value="">--Chọn loại giao dịch--</option>
                                            <option value="1"{!! old('type', $productInfo->type) == 1 ? ' selected="selected"' : '' !!}>Bán</option>
                                            <option value="2"{!! old('type', $productInfo->type) == 2 ? ' selected="selected"' : '' !!}>Cho thuê</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="estate_type_id">Loại bất động sản</label>
                                        </div>
                                        <select id="estate_type_id" name="estate_type_id" data-id="{{ old('estate_type_id', $productInfo->estate_type_id) }}" class="form-control select2">
                                            <option value="">--Chọn loại bất động sản--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="price">Giá</label>
                                        </div>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $productInfo->price) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="street_num">Địa chỉ</label>
                                        </div>
                                        <input type="text" class="form-control" id="street_num" name="street_num" value="{{ old('street_num', $productInfo->street_num) }}" placeholder="Số">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="street_name">&nbsp;</label>
                                        </div>
                                        <input type="text" class="form-control" id="street_name" name="street_name" value="{{ old('street_name', $productInfo->{'street_name_' . config('app.locale')}) }}" placeholder="Đường">
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
                                                <option value="{{ $city->id }}"{!! old('city_id', $productInfo->estate_type_id) == $city->id ? ' selected="selected"' : '' !!}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <select id="district_id" name="district_id" class="form-control select2 load-ajax" data-href="{{ route('ajax.get-ward', [0]) }}" data-for="#ward_id" data-id="{{ old('district_id', $productInfo->district_id) }}">
                                        <option value="">--Chọn quận--</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="ward_id" name="ward_id" class="form-control select2" data-id="{{ old('ward_id', $productInfo->ward_id) }}">
                                            <option value="">--Chọn phường--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="label-group">
                                            <label for="description">Mô tả thêm bất động sản</label>
                                        </div>
                                        <textarea id="description" name="description" class="form-control editorBasic" rows="8" cols="80" placeholder="Mô tả bất động sản...">{{ old('description', $productInfo->{'street_name_' . config('app.locale')}) }}</textarea>
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
                                            <div class="upload-photo-wrap" id="photo_panel" style="height: auto; line-height: normal; overflow: auto;">
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
                                            <input id="pac-input" class="controls" type="text" placeholder="Nhập địa chỉ để tìm kiếm">
                                            <div id="map-abc"></div>
                                            <input type="hidden" id="longt" name="longt" value="{{ old('longt', $productInfo->longt) }}">
                                            <input type="hidden" id="latt" name="latt" value="{{ old('latt', $productInfo->latt) }}">
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
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
      var map = new google.maps.Map(document.getElementById('map-abc'), {
        center: {lat: 10.7860332, lng: 106.6950147},
        zoom: 17,
        mapTypeId: 'roadmap'
      });

      // Create the search box and link it to the UI element.
      var input = document.getElementById('pac-input');
      var searchBox = new google.maps.places.SearchBox(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      // Bias the SearchBox results towards current map's viewport.
      map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(10.7860332, 106.6950147),
            draggable:true,
            map: map            
          });
         google.maps.event.addListener(marker,'dragend',function(event) {
              document.getElementById('latt').value = this.position.lat();
              document.getElementById('longt').value = this.position.lng();                
          });
      });

      var markers = [];       
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {

          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }
          document.getElementById('latt').value = place.geometry.location.lat();
          document.getElementById('longt').value = place.geometry.location.lng();
          var icon = {              
            size: new google.maps.Size(128, 128),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            draggable:true,
            position: place.geometry.location
          }));

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }

           // Clear out the old markers.
        markers.forEach(function(marker) {
          google.maps.event.addListener(marker,'dragend',function(event) {
              document.getElementById('latt').value = this.position.lat();
              document.getElementById('longt').value = this.position.lng();                
          });
        });

        });
        map.fitBounds(bounds);
      });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhxs7FQ3DcyDm8Mt7nCGD05BjUskp_k7w&libraries=places&callback=initAutocomplete" async defer></script>
<script type="text/javascript" src="{!! asset('public/admin/dist/js/ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/jquery.uploadfile.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('description', {
            language: "{{ config('app.locale') }}",
            height: 300,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Strike', 'Subscript', 'Superscript'],
                ['TextColor', 'BGColor'],
                ['Undo', 'Redo', 'RemoveFormat'],
                ['Link', 'Unlink', 'Anchor']
            ]
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

                $(row).append('<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6"><div class="thumbnail" style="position: relative;"><a href="#" class="delete" style="position: absolute; top: -6px; left: -2px; z-index: 99; color: #ff7f27;"><i class="fa fa-times"></i></a><img src="' + mediaUrl + data.filename + '" class="img-responsive" style="height: 90px;" /><div class="text-center" style="margin-top: 5px;"><input type="hidden" name="image_url[]" value="' + data.filename + '"><input type="radio" name="thumbnail" value="' + data.info.filename + '"></div></div></div>');
            },
            onDelete: function(obj, instance, panel) {
                $(obj).parent().parent().remove();
                instance.fileCounter--;
            }
        });

        $('#frmRealEstate').on('submit', function() {
            if (confirm('Khi nhấn lưu, tin bất động sản này sẽ chuyển về tình trạng chờ duyệt, bạn có chắc là muốn lưu không?')) {
                return true;
            }

            return false;
        });
    });
</script>
@stop