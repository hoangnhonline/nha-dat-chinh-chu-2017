<div class="block-module">
    <div class="block-title">
        <h2 class="title">Cấp độ thành viên của bạn</h2>
    </div>
    <div class="block-content">
        <form method="post" action="" class="frm-">
            <div class="form-group">
                <select id="group_id" name="group_id" class="form-control select2">
                    @foreach ($arrListGroup as $group)
                        <option value="{{ $group->id }}"{!! $group->id == $group_id ? ' selected="selected"' : '' !!}>{{ $group->{'name_' . config('app.locale')} }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="btn-submit">
                    <button type="submit" class="btn btn-main btn-lg show add_arrow">Thanh toán ngay</button>
                </div>
            </div>
            <div class="form-group">
                <p><a href="{{ route('package-service') }}"><i class="fa fa-angle-double-right"></i> Chi tiết các loại cấp độ thành viên</a></p>
            </div>
        </form>
    </div>
</div><!-- /block-module -->