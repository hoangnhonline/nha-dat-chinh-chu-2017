<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth('backend')->user()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @foreach ($arrListModule as $module)
                @if (!check_permission(auth('backend')->user()->group_id, $module->code, 'view') && !check_permission(auth('backend')->user()->group_id, $module->code, 'add'))
                    @continue
                @endif
                <?php
                $link_list = $link_add = '#';
                switch ($module->code) {
                    case 'logo':
                        $link_list = route('banner.index');
                        $link_add = route('banner.create');
                        break;
                    case 'news':
                        $link_list = route('articles.index');
                        $link_add = route('articles.create');
                        break;
                    default:
                        $link_list = route('product.index', ['cate' => $module->cate_related]);
                        $link_add = route('product.create', ['cate' => $module->cate_related]);
                        break;
                }
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-hand-o-right"></i>
                        <span>{{ $module->name }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if (check_permission(auth('backend')->user()->group_id, $module->code, 'view'))
                            <li>
                                <a href="{{ $link_list }}"><i class="fa fa-navicon"></i> Danh sách</a>
                            </li>
                        @endif
                        @if (check_permission(auth('backend')->user()->group_id, $module->code, 'add'))
                            <li>
                                <a href="{{ $link_add }}"><i class="fa fa-plus"></i> Thêm mới</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endforeach
            @if (auth('backend')->user()->group_id == config('nhadat.admin_group_id'))
                <li class="treeview{!! $namespace == 'backend_system' ? ' active' : '' !!}">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Hệ thống</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li{!! $menu_code == 'backend_system_group' ? ' class="active"' : '' !!}>
                            <a href="{{ route('group.index') }}"><i class="fa fa-circle-o"></i> Nhóm</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_admin' ? ' class="active"' : '' !!}>
                            <a href="{{ route('group.admin.index') }}"><i class="fa fa-circle-o"></i> Thành viên quản trị</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_member' ? ' class="active"' : '' !!}>
                            <a href="{{ route('group.member.index') }}"><i class="fa fa-circle-o"></i> Thành viên BĐS</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_cate' ? ' class="active"' : '' !!}>
                            <a href="{{ route('cate.index') }}"><i class="fa fa-circle-o"></i> Danh mục BĐS</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_estatetype' ? ' class="active"' : '' !!}>
                            <a href="{{ route('estate-type.index') }}"><i class="fa fa-circle-o"></i> Loại BĐS</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_articlescate' ? ' class="active"' : '' !!}>
                            <a href="{{ route('articles-cate.index') }}"><i class="fa fa-circle-o"></i> Danh mục tin tức</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_newsletter' ? ' class="active"' : '' !!}>
                            <a href="{{ route('newsletter.index') }}"><i class="fa fa-circle-o"></i> Newsletter</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_tinh' ? ' class="active"' : '' !!}>
                            <a href="{{ route('tinh.index') }}"><i class="fa fa-circle-o"></i> Tỉnh/thành phố</a>
                        </li>
                        <li{!! $menu_code == 'backend_system_district' ? ' class="active"' : '' !!}>
                            <a href="{{ route('district.index') }}"><i class="fa fa-circle-o"></i> Quận</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<style type="text/css">
    .skin-blue .sidebar-menu > li > .treeview-menu {
        padding-left: 15px !important;
    }
</style>