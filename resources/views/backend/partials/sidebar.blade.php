<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth('admin')->user()->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview{!! $namespace == 'backend_system' ? ' active' : '' !!}">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Quản trị</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li{!! $menu_code == 'backend_system_group' ? ' class="active"' : '' !!}>
                        <a href="{{ route('system.group.index') }}"><i class="fa fa-circle-o"></i> Nhóm</a>
                    </li>
                    <li{!! $menu_code == 'backend_system_member' ? ' class="active"' : '' !!}>
                        <a href="{{ route('system.member.index') }}"><i class="fa fa-circle-o"></i> Thành viên BĐS</a>
                    </li>
                    <li{!! $menu_code == 'backend_system_admin' ? ' class="active"' : '' !!}>
                        <a href="{{ route('system.admin.index') }}"><i class="fa fa-circle-o"></i> Thành viên quản trị</a>
                    </li>
                    <li{!! $menu_code == 'backend_system_cate' ? ' class="active"' : '' !!}>
                        <a href="{{ route('system.realestate-cate.index') }}"><i class="fa fa-circle-o"></i> Danh mục BĐS</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<style type="text/css">
    .skin-blue .sidebar-menu > li > .treeview-menu {
        padding-left: 15px !important;
    }
</style>