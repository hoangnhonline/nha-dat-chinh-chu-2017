@extends('backend.layout')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh mục bài viết  
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('articles-cate.index') }}">Danh mục bài viết</a></li>
      <li class="active">Thêm mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('articles-cate.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('articles-cate.store') }}" id="dataForm">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
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
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="name_vi" id="name_vi" value="{{ old('name_vi') }}">
                        </div>
                         <input type="hidden" class="form-control" name="slug_vi" id="slug_vi" value="{{ old('slug_vi') }}">
                         <div class="form-group" >                  
                          <label>Mô tả</label>
                          <textarea class="form-control" rows="5" name="description_vi">{{ old('description_vi') }}</textarea>
                          
                        </div> 
                                   
                        <div class="col-md-12 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" alue="1"> Danh mục HOT </label>
                          </div>                          
                        </div>                                               
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="homeEn">                        
                        <div class="form-group" >                  
                          <label>Name <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="name_en" id="name_en" value="{{ old('name_en') }}">
                        </div>
                        <div class="form-group" >                  
                          <label>Description</label>
                          <textarea class="form-control"  rows="5" name="description_en">{{ old('description_en') }}</textarea>
                          
                        </div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                      
                  </div>

                </div>
                  
            </div>
            
            
        </div>
        <!-- /.box -->     
<input type="hidden" id="editor_active" value="vi" />
      </div>
      <div class="col-md-12">      
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
                            <input type="text" class="form-control" name="meta_name_vi" id="meta_name_vi" value="{{ old('meta_name_vi') }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Thẻ desciption</label>
                            <textarea class="form-control" rows="4" name="meta_description_vi" id="meta_description_vi">{{ old('meta_description_vi') }}</textarea>
                          </div>  

                          <div class="form-group">
                            <label>Thẻ keywords</label>
                            <textarea class="form-control" rows="3" name="meta_keywords_vi" id="meta_keywords_vi">{{ old('meta_keywords_vi') }}</textarea>
                          </div>  
                          <div class="form-group">
                            <label>Nội dung tùy chỉnh</label>
                            <textarea class="form-control" rows="4" name="custom_text_vi" id="custom_text_vi">{{ old('custom_text_vi') }}</textarea>
                          </div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="seoEn">                        
                        <div class="form-group">
                            <label>Meta title </label>
                            <input type="text" class="form-control" name="meta_name_en" id="meta_name_en" value="{{ old('meta_name_en') }}">
                          </div>
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Meta desciption</label>
                            <textarea class="form-control" rows="4" name="meta_description_en" id="meta_description_en">{{ old('meta_description_en') }}</textarea>
                          </div>  

                          <div class="form-group">
                            <label>Meta keywords</label>
                            <textarea class="form-control" rows="3" name="meta_keywords_en" id="meta_keywords_en">{{ old('meta_keywords_en') }}</textarea>
                          </div>  
                          <div class="form-group">
                            <label>Custom text</label>
                            <textarea class="form-control" rows="3" name="custom_text_en" id="custom_text_en">{{ old('custom_text_en') }}</textarea>
                          </div>
                    </div><!--end thong tin co ban--> 
                   
                  </div>

                </div>


             
            
        </div>
        <!-- /.box -->     
<div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave" onclick="return validateData(); ">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('articles-cate.index')}}">Hủy</a>
            </div>
      </div>
      <!--/.col (left) -->

    </div>
    </form>
    <!-- /.row -->
  </section>

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
      $(".select2").select2();
      $('#dataForm').submit(function(){
        
        $('#btnSave').hide();
        $('#btnLoading').show();
      });
    });
    
</script>
@stop
