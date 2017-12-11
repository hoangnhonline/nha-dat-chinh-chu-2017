@extends('backend.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Danh sách</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Hệ thống</li>
        <li class="active">Nhóm</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    @if (Session::has('message'))
        <div class="alert alert-info" >{{ Session::get('message') }}</div>
    @endif
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered" id="table-list-data">
                    <thead>
                    <tr>
                        <th style="width: 1%;">#</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (!$arrListCate->isEmpty())
                        @foreach ($arrListCate as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name_vi }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('cate.edit', [$item->id ]) }}" class="btn-sm btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->
</section>
<!-- /.content -->
@stop

@section('javascript_page')
<script type="text/javascript">
    function callDelete(name, url) {
        swal({
            title: 'Bạn muốn xóa "' + name + '"?',
            text: "Dữ liệu sẽ không thể phục hồi.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function () {
            location.href = url;
        })
        return flag;
    }

    $(document).ready(function () {
        $('#type, #estate_type_id').change(function () {
            $('#searchForm').submit();
        });
        $('#type_id').change(function () {
            $('#estate_type_id').val('');
            $('#searchForm').submit();
        });
        $('#is_hot').change(function () {
            $('#searchForm').submit();
        });
        $('#table-list-data tbody').sortable({
            placeholder: 'placeholder',
            handle: ".move",
            start: function (event, ui) {
                ui.item.toggleClass("highlight");
            },
            stop: function (event, ui) {
                ui.item.toggleClass("highlight");
            },
            axis: "y",
            update: function () {
                var rows = $('#table-list-data tbody tr');
                var strOrder = '';
                var strTemp = '';
                for (var i = 0; i < rows.length; i++) {
                    strTemp = rows[i].id;
                    strOrder += strTemp.replace('row-', '') + ";";
                }
                updateOrder("cate", strOrder);
            }
        });
    });

    function updateOrder(table, strOrder) {
        $.ajax({
            url: $('#route_update_order').val(),
            type: "POST",
            async: false,
            data: {
                str_order: strOrder,
                table: table
            },
            success: function (data) {
                var countRow = $('#table-list-data tbody tr span.order').length;
                for (var i = 0; i < countRow; i++) {
                    $('span.order').eq(i).html(i + 1);
                }
            }
        });
    }
</script>
@stop