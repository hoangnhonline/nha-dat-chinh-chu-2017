@extends('backend.layout')
@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bất động sản    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('product.index') }}">Bất động sản</a></li>
      <li class="active">Thêm mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['estate_type_id' => $estate_type_id, 'type' => $type]) }}" style="margin-bottom:5px">Quay lại</a>    
    <form role="form" method="POST" action="{{ route('product.store') }}" id="dataForm">
    <div class="row">
      <!-- left column -->      
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            Chỉnh sửa
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
                          
                @if(Session::has('message'))
                <p class="alert alert-info" >{{ Session::get('message') }}</p>
                @endif
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin tiếng Việt</a></li>   
                    <li role="presentation"><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">Thông tin tiếng Anh</a></li>                                      
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                      <div class="form-group col-md-6 pleft-5">
                          <label for="email">Loại <span class="red-star">*</span></label>
                            <select class="form-control" name="type" id="type">
                                <option value="1" {{ old('type', $type) == 1 ? "selected" : "" }}>Bán</option>
                                <option value="2" {{ old('type', $type) == 2 ? "selected" : "" }}>Cho thuê</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Loại bất động sản<span class="red-star">*</span></label>
                          <select class="form-control" name="estate_type_id" id="estate_type_id">
                            <option value="">--Chọn--</option>
                            @foreach( $estateTypeArr as $value )
                            <option value="{{ $value->id }}"
                            {{ old('estate_type_id', $estate_type_id) == $value->id ? "selected" : "" }}
                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                       
                        <div class="form-group col-md-4  pleft-5">
                          <label for="email">Tỉnh/TP <span class="red-star">*</span></label>
                            <select class="form-control" name="city_id" id="city_id">
                                @foreach( $cityList as $value )
                                <option value="{{ $value->id }}"
                                {{ old('city_id', $city_id) == $value->id ? "selected" : "" }}                           

                                >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4  pleft-5">
                          <label for="email">Quận <span class="red-star">*</span></label>
                            <select class="form-control" name="district_id" id="district_id">
                              <option value="">-- chọn --</option>
                            <?php 
                            if($city_id){
                              $districtList = App\Models\District::where('city_id', $city_id)->get();
                            }
                            ?>
                            <?php $district_id = old('district_id', $district_id); ?>
                                @foreach( $districtList as $value )
                                <option value="{{ $value->id }}"
                                {{ $district_id == $value->id ? "selected" : "" }}                           

                                >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label for="email">Phường <span class="red-star">*</span></label>
                          <select class="form-control" name="ward_id" id="ward_id">
                            <option value="">--Chọn--</option>
                            <?php 
                            $wardList = App\Models\Ward::where('district_id', $district_id)->get();
                            ?>
                            @foreach( $wardList as $value )
                            <option value="{{ $value->id }}"
                            {{ old('ward_id') == $value->id ? "selected" : "" }}                           

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4  pleft-5">
                          <label for="email">Số nhà</label>
                           <input type="text" name="street_num" class="form-control" placeholder="Số nhà" value="{{ old('street_num') }}">
                        </div>
                        <div class="form-group col-md-8 none-padding">
                          <label for="email">Đường</label>
                           <input type="text" name="street_name" class="form-control" placeholder="Tên đường" value="{{ old('street') }}">
                        </div>
                       
                        <div class="form-group pleft-5" >                  
                          <label>Tiêu đề <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title_vi" id="title_vi" value="{{ old('title_vi') }}">
                        </div>                        
                        <div class="form-group col-md-4 pleft-5 none-padding" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control number" name="price" id="price" value="{{ old('price') }}">
                        </div>                                                                        
                        <div class="form-group col-md-4 pleft-5 none-padding">
                          <label>Diện tích <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="area" id="area" value="{{ old('area') }}">                        
                        </div>  
                        <div class="form-group col-md-4 pleft-5 none-padding" >                  
                            <label>Điện thoại liên hệ</label>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}">
                        </div>                                             
                        <div class="form-group col-md-4 pleft-5 none-padding">
                          <label>Số phòng ngủ</label>                  
                          <input type="text" class="form-control" name="no_room" id="no_room" value="{{ old('no_room') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số WC</label>                  
                          <input type="text" class="form-control" name="no_wc" id="no_wc" value="{{ old('no_wc') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số garages</label>                  
                          <input type="text" class="form-control" name="no_garages" id="no_garages" value="{{ old('no_garages') }}">                        
                        </div>
                       
                        <div class="form-group col-md-12">
                          <div class="checkbox">
                            <label style="font-weight:bold;color:red">
                              <input type="checkbox" name="is_hot" value="1" {{ old('is_hot') == 1 ? "checked" : "" }}>
                              Tin HOT
                            </label>
                          </div>               
                        </div>                        
                        
                        <div class="form-group form-group col-md-12 pleft-5 none-padding" style="margin-top:10px">
                            <label>Mô tả ngắn</label>
                            <textarea class="form-control" rows="4" name="description_vi" id="description_vi">{{ old('description_vi') }}</textarea>
                          </div>
                          <div class="form-group form-group pleft-5 col-md-12 none-padding" style="margin-top:10px">
                            <label>Chi tiết</label>
                            <textarea class="form-control" rows="4" name="content_vi" id="content_vi">{{ old('content_vi') }}</textarea>
                          </div>
                          <input type="hidden" id="editor" value="description">
                          <div class="clearfix"></div>
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px"> 
                          <input id="pac-input" class="controls" type="text" placeholder="Nhập địa chỉ để tìm kiếm">
                          <div id="map-abc"></div>
                      </div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->
                    <div role="tabpanel" class="tab-pane" id="home2">
                      
                     
                       
                        
                      
                        <div class="form-group pleft-5" >                  
                          <label>Title <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title_en" id="title_en" value="{{ old('title_en') }}">
                        </div>                        
                       
                        
                        <div class="form-group form-group col-md-12 pleft-5 none-padding" style="margin-top:10px">
                            <label>Short description</label>
                            <textarea class="form-control" rows="4" name="description_en" id="description_en">{{ old('description_en') }}</textarea>
                          </div>
                          <div class="form-group form-group pleft-5 col-md-12 none-padding" style="margin-top:10px">
                            <label>Detail</label>
                            <textarea class="form-control" rows="4" name="content_en" id="content_en">{{ old('content_en') }}</textarea>
                          </div>                        
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->
                     <div role="tabpanel" class="tab-pane" id="settings">
                       <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">
                         
                            <button class="btn btn-primary btnMultiUpload" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px"></div>
                          </div>
                          <div style="clear:both"></div>
                        </div>
                     </div><!--end hinh anh-->
                     
                  </div>

                </div>
                  
            </div>

            <div class="box-footer">
              <input type="hidden" name="longt" id="longt" value="" />
              <input type="hidden" name="latt" id="latt" value="" />
              <button type="button" class="btn btn-default btn-sm" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary btn-sm" id="btnSave">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('product.index', ['estate_type_id' => $estate_type_id, 'type' => $type])}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">      
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>

          <!-- /.box-header -->
            <div class="box-body">

               <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#seoVi" aria-controls="seoVi" role="tab" data-toggle="tab">VN</a></li>
                    <li role="presentation"><a href="#seoEn" aria-controls="seoEn" role="tab" data-toggle="tab">EN</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="seoVi">
                         <div class="form-group">
                            <label>Thẻ title </label>
                            <input type="text" class="form-control" name="meta_title_vi" id="meta_title_vi" value="{{ old('meta_title_vi') }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Thẻ desciption</label>
                            <textarea class="form-control" rows="6" name="meta_description_vi" id="meta_description_vi">{{ old('meta_description_vi') }}</textarea>
                          </div>  

                          <div class="form-group">
                            <label>Thẻ keywords</label>
                            <textarea class="form-control" rows="4" name="meta_keywords_vi" id="meta_keywords_vi">{{ old('meta_keywords_vi') }}</textarea>
                          </div>  
                          <div class="form-group">
                            <label>Nội dung tùy chỉnh</label>
                            <textarea class="form-control" rows="6" name="custom_text_vi" id="custom_text_vi">{{ old('custom_text_vi') }}</textarea>
                          </div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="seoEn">                        
                        <div class="form-group">
                            <label>Meta title </label>
                            <input type="text" class="form-control" name="meta_title_en" id="meta_title_en" value="{{ old('meta_title_en') }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Meta desciption</label>
                            <textarea class="form-control" rows="6" name="meta_description_en" id="meta_description_en">{{ old('meta_description_en') }}</textarea>
                          </div>  

                          <div class="form-group">
                            <label>Meta keywords</label>
                            <textarea class="form-control" rows="4" name="meta_keywords_en" id="meta_keywords_en">{{ old('meta_keywords_en') }}</textarea>
                          </div>  
                          <div class="form-group">
                            <label>Custom text</label>
                            <textarea class="form-control" rows="6" name="custom_text_en" id="custom_text_en">{{ old('custom_text_en') }}</textarea>
                          </div>
                    </div><!--end thong tin co ban--> 
                   
                  </div>

                </div>


             
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>

    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
<!-- Modal -->
<div id="tagModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="POST" action="{{ route('tag.ajax-save') }}" id="formAjaxTag">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tạo mới tag</h4>
      </div>
      <div class="modal-body" id="contentTag">
          <input type="hidden" name="type" value="1">
           <!-- text input -->
          <div class="col-md-12">
            <div class="form-group">
              <label>Tags<span class="red-star">*</span></label>
              <textarea class="form-control" name="str_tag" id="str_tag" rows="4" >{{ old('str_tag') }}</textarea>
            </div>
            
          </div>
          <div classs="clearfix"></div>
      </div>
      <div style="clear:both"></div>
      <div class="modal-footer" style="text-align:center">
        <button type="button" class="btn btn-primary btn-sm" id="btnSaveTagAjax"> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btnCloseModalTag">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
<input type="hidden" id="route_get_tien_ich" value="{{ route('product.ajax-get-tien-ich') }}">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #3C8DBC !important;
  }

</style>

    <style>
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
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }     
      
    </style>
@stop
@section('js')
<script>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhxs7FQ3DcyDm8Mt7nCGD05BjUskp_k7w&libraries=places&callback=initAutocomplete"
         async defer></script>
<script type="text/javascript">

$(document).ready(function(){

$('#pac-input').on('keypress', function(e) {
    return e.which !== 13;
});
  $('#btnAddTag').click(function(){
      $('#tagModal').modal('show');
  });
});
$(document).on('click', '.remove-image', function(){
  if( confirm ("Bạn có chắc chắn không ?")){
    $(this).parents('.col-md-3').remove();
  }
});
$(document).on('click', '#btnSaveTagAjax', function(){
    $.ajax({
      url : $('#formAjaxTag').attr('action'),
      data: $('#formAjaxTag').serialize(),
      type : "post", 
      success : function(str_id){          
        $('#btnCloseModalTag').click();
        $.ajax({
          url : "{{ route('tag.ajax-list') }}",
          data: { 
            type : 1 ,
            tagSelected : $('#tags').val(),
            str_id : str_id
          },
          type : "get", 
          success : function(data){
              $('#tags').html(data);
              $('#tags').select2('refresh');
              
          }
        });
      }
    });
 }); 
 $('#contentTag #name').change(function(){
       var name = $.trim( $(this).val() );
       if( name != '' && $('#contentTag #slug').val() == ''){
          $.ajax({
            url: $('#route_get_slug').val(),
            type: "POST",
            async: false,      
            data: {
              str : name
            },              
            success: function (response) {
              if( response.str ){                  
                $('#contentTag #slug').val( response.str );
              }                
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
       }
    });



    $(document).ready(function(){     
      $(".select2").select2();
      $('#dataForm').submit(function(){
        
        $('#btnSave').hide();
        $('#btnLoading').show();
      });
      
      var editor3 = CKEDITOR.replace( 'content_vi',{
          language : 'vi',
          height : 200,
          toolbarGroups : [
            
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },           
            '/',
            
          ]
      });
      var editor3 = CKEDITOR.replace( 'content_en',{
          language : 'vi',
          height : 200,
          toolbarGroups : [
            
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },           
            '/',
            
          ]
      });
      $('#btnUploadImage').click(function(){        
        $('#file-image').click();
      }); 
     
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file[]', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image_multiple').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#div-image').append(response);
                if( $('input.thumb:checked').length == 0){
                  $('input.thumb').eq(0).prop('checked', true);
                }
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
     

      $('#title').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' && $('#slug').val() == ''){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      });
      
      $('#district_id').change(function(){

            var district_id = $(this).val();
          $.ajax({
            url : '{{ route('get-child') }}',
            data : {
              mod : 'ward',
              col : 'district_id',
              id : district_id
            },
            type : 'POST',
            dataType : 'html',
            success : function(data){
              $('#ward_id').html(data);
            }
          });

          $.ajax({
            url : '{{ route('get-child') }}',
            data : {
              mod : 'street',
              col : 'district_id',
              id : district_id
            },
            type : 'POST',
            dataType : 'html',
            success : function(data){
              $('#street_id').html(data);
            }
          });

          $.ajax({
            url : '{{ route('get-child') }}',
            data : {
              mod : 'project',
              col : 'district_id',
              id : district_id
            },
            type : 'POST',
            dataType : 'html',
            success : function(data){
              $('#project_id').html(data);
            }
          })
        
      });
      $('#city_id').change(function(){         

          $.ajax({
            url : '{{ route('get-child') }}',
            data : {
              mod : 'district',
              col : 'city_id',
              id : $('#city_id').val()
            },
            type : 'POST',
            dataType : 'html',
            success : function(data){
              $('#district_id').html(data);
              $('#ward_id, #project_id, #street_id').html('');
            }
          })
        
      });

    });
    
</script>
@stop
