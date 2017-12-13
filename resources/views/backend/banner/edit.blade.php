@extends('backend.layout')
@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Banner của <span style="color:red">{{ $detail->name }}</span>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type]) }}">banner</a></li>
      <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm " href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type]) }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('banner.update') }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            Chỉnh sửa
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
                 <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Banner </label>  
                  <input type="hidden" name="id" value="{{ $detailBanner->id }}">  
                  <div class="col-md-9">
                    <img id="thumbnail_image" src="{{ $detailBanner->image_url ? Helper::showImage($detailBanner->image_url) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="145" height="85">
                    
                    <input type="file" id="file-image" style="display:none" />
                 
                    <button class="btn btn-default btn-sm" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <div style="clear:both"></div>
                </div>  
                <div class="form-group">
                  <label>Ẩn / Hiện</label>
                  <select name="status" class="form-control" id="status">
                  	<option value="1" {{ $detailBanner->status == 1  ? "selected" : "" }}>Hiện</option>
                  	<option value="2" {{ $detailBanner->status == 2  ? "selected" : "" }}>Ẩn</option>
                  </select>
                </div>           
                <!-- textarea -->
                <div class="form-group">
                  <label>Loại banner</label>
                  <select name="type" class="form-control" id="type">
                  	<option value="1" {{ $detailBanner->type == 1  ? "selected" : "" }}>Không liên kết</option>
                  	<option value="2" {{ $detailBanner->type == 2 ? "selected" : "" }}>Có liên kết</option>
                  </select>
                </div>  
                <div class="form-group" id="div_lk" style="display:none">
                  <label>Liên kết</label>
                  <input type="text" name="ads_url" id="ads_url" value="{{ $detailBanner->ads_url }}" class="form-control">
                </div>  
                <input type="hidden" name="image_url" id="image_url" value="{{ $detailBanner->image_url }}"/>          
            	<input type="hidden" name="image_name" id="image_name" value="{{ old('image_name') }}"/>
                <input type="hidden" name="object_id" value="{{ $object_id }}">
                <input type="hidden" name="object_type" value="{{ $object_type }}">
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type])}}">Hủy</a>
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
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){
      
      $('#btnUploadImage').click(function(){        
        $('#file-image').click();
      });      
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 1);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_image').attr('src',$('#upload_url').val() + response.image_path);
                $( '#image_url' ).val( response.image_path );
                $( '#image_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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
      
      var type = $('#type').val();
      checkType( type );

      $('#type').change(function(){
      	checkType( $(this).val() );
      });
      
     
    });
    function checkType( type ){
    	if( type == 1){
    		$('#div_lk').hide();
    	}else{
    		$('#div_lk').show();
    	}
    }
</script>
@stop