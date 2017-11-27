<div class="block-module">
    @if (!empty(auth('web')->user()->avatar))
        <div class="box-avatar">
            <img src="{{ image_url(auth('web')->user()->avatar) }}">
        </div>
    @endif
    <div class="block-content">
        <div class="form-group">
            <ul class="menu-my-account">
                <li><a href="{{ route('member.register-land') }}"><i class="fa fa-cog"></i> Đăng tin bđs</a></li>
                <li><a href="{{ route('member.detail') }}"><i class="fa fa-user"></i> Tài khoản của bạn</a></li>
                <li><a href="{{ route('member.land') }}"><i class="fa fa-home"></i> Bất động sản của bạn</a></li>
            </ul>
        </div>
        <div class="form-group">
            <div class="btn-submit">
                <a role="button" class="btn btn-main btn-lg show add_arrow" href="{{ route('auth.logout') }}">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>