<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route("admin.index")}}"><img src="{{asset("app/admin")}}/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="{{route("admin.index")}}" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{(request()->is('/admin')) ? 'active' : ""}} ">
                    <a href="{{route("admin.index")}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               <li class="sidebar-item {{(request()->is('admin/products')) ? 'active' : ""}} ">
                   <a href="{{route("admin.products.index")}}" class='sidebar-link'>
                       <i class="bi bi-box"></i>
                       <span>Ürünler</span>
                   </a>
               </li>
                <li class="sidebar-item {{(request()->is('admin/categories')) ? 'active' : ""}} ">
                    <a href="{{route("admin.categories.index")}}" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Kategoriler</span>
                    </a>
                </li>
                @can('user-list')
                    <li class="sidebar-item {{(request()->is('admin/users')) ? 'active' : ""}} ">
                        <a href="{{route("admin.users.index")}}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Kullanıcılar</span>
                        </a>
                    </li>
                @endcan

                @can('role-list')
                    <li class="sidebar-item {{(request()->is('admin/role')) ? 'active' : ""}} ">
                        <a href="{{route("admin.role.index")}}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Roller</span>
                        </a>
                    </li>
                @endcan

                @can('permission-list')
                    <li class="sidebar-item {{(request()->is('admin/permission')) ? 'active' : ""}} ">
                        <a href="{{route("admin.permission.index")}}" class='sidebar-link'>
                            <i class="bi bi-grid"></i>
                            <span>İzinler</span>
                        </a>
                    </li>
                @endcan


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
