<div class="block-module">
    @if (!empty(auth('web')->user()->avatar))
        <div class="box-avatar">
            <img src="{{ image_url(auth('web')->user()->avatar) }}">
        </div>
    @endif
    <div class="block-content">
        <div class="form-group">
            <ul class="menu-my-account">
                @if (check_permission_estate(auth('web')->user()->group_id, 'add'))
                    <li><a href="{{ route('member.realestate.create') }}"><i class="fa fa-cog"></i> Đăng tin bđs</a></li>
                @endif
                <li><a href="{{ route('member.detail') }}"><i class="fa fa-user"></i> Tài khoản của bạn</a></li>
                @if (check_permission_estate(auth('web')->user()->group_id, 'view'))
                    <li><a href="{{ route('member.realestate.index') }}"><i class="fa fa-home"></i> Bất động sản của bạn</a></li>
                @endif
                @if (check_permission(auth('web')->user()->group_id, 'logo', 'view'))
                    <li><a href="{{ route('member.logo.index') }}"><i class="fa fa-id-badge"></i> Logo</a></li>
                @endif
                @if (check_permission(auth('web')->user()->group_id, 'news', 'view'))
                    <li><a href="{{ route('member.news.index') }}"><i class="fa fa-book"></i> Tin tức</a></li>
                @endif
            </ul>
        </div>
        <div class="form-group">
            <div class="btn-submit">
                <a role="button" class="btn btn-main btn-lg show add_arrow" href="{{ route('auth.logout') }}">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>