@extends('backend.layout')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tin tức  
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('articles.index') }}">Sản phẩm</a></li>
      <li class="active">Thêm mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('articles.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('articles.store') }}" id="dataForm">
    <div class="row">
      <!-- left column -->

      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm mới</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
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
                    <li role="presentation" class="active"><a href="#home" data-editor="vi" class="tab_editor" aria-controls="home" role="tab" data-toggle="tab">Thông tin tiếng Việt</a></li>
                    <li role="presentation"><a href="#homeEn" aria-controls="homeEn" data-editor="en" class="tab_editor" role="tab" data-toggle="tab">Thông tin English</a></li>                   
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group">
                          <label for="email">Danh mục <span class="red-star">*</span></label>
                          <select class="form-control" name="cate_id" id="cate_id">
                            <option value="">-- chọn --</option>
                            @if( $cateArr->count() > 0)
                              @foreach( $cateArr as $value )
                              <option value="{{ $value->id }}" >{{ $value->name }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                        <div class="form-group" >                  
                          <label>Tiêu đề <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title_vi" id="title_vi" value="{{ old('title_vi') }}">
                        </div>
                         <input type="hidden" class="form-control" name="slug_vi" id="slug_vi" value="{{ old('slug_vi') }}">
                         <div class="form-group" >                  
                          <label>Mô tả</label>
                          <textarea class="form-control" rows="5" name="description_vi">{{ old('description_vi') }}</textarea>
                          
                        </div> 
                       <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                          <label class="col-md-3 row">Image </label>    
                          <div class="col-md-9">
                            <img id="thumbnail_image" src="{{ old('image_url') ? Helper::showImage(old('image_url')) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="145" height="85">                                                     
                            <button class="btn btn-default btn-sm btnUploadSingle" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                          </div>
                          <div style="clear:both"></div>
                      </div>  <!--image-->               
                        <div class="col-md-12 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" alue="1"> TIN HOT </label>
                          </div>                          
                        </div>                      
                         <div class="form-group">
                          <label>Chi tiết</label>
                          <textarea class="form-control" rows="10" name="content_vi" id="content_vi">{{ old('content_vi') }}</textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="homeEn">                        
                        <div class="form-group" >                  
                          <label>Title <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title_en" id="title_en" value="{{ old('title_en') }}">
                        </div>
                        <div class="form-group" >                  
                          <label>Mô tả</label>
                          <textarea class="form-control"  rows="5" name="description_en">{{ old('description_en') }}</textarea>
                          
                        </div>
                        <input type="hidden" class="form-control" name="slug_en" id="slug_en" value="{{ old('slug_en') }}">                       
                         <div class="form-group">
                          <label>Detail</label>
                          <textarea class="form-control" rows="10" name="content_en" id="content_en">{{ old('content_en') }}</textarea>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                      
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave" onclick="return validateData(); ">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('articles.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     
<input type="hidden" id="editor_active" value="vi" />
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

<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">

<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #114a82 !important;
  }

</style>

@stop

@section('javascript_page')
<script type="text/javascript">

    $(document).ready(function(){
      $('.tab_editor').click(function(){
        var active = $(this).attr('data-editor');
        $('#editor_active').val(active);
      });
      
      $(".select2").select2();
      $('#dataForm').submit(function(){
        
        $('#btnSave').hide();
        $('#btnLoading').show();
      });
      var editor = CKEDITOR.replace( 'content_vi');
      var editor2 = CKEDITOR.replace( 'content_en');     

      $('#title_vi').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' ){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug_vi').val( response.str );
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
      $('#title_en').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' ){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug_en').val( response.str );
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
    });
    
</script>
@stop
