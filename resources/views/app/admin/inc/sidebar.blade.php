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
                        <i class="fa-solid fa-house"></i>
                        <span>{{__('messages.Dasboard')}}</span>
                    </a>
                </li>

               <li class="sidebar-item {{(request()->is('admin/products')) ? 'active' : ""}} ">
                   <a href="{{route("admin.products.index")}}" class='sidebar-link'>
                       <i class="fa-solid fa-box"></i>
                       <span>{{__('messages.Ürünler')}}</span>
                   </a>
               </li>


                <li class="sidebar-item {{(request()->is('admin/categories')) ? 'active' : ""}} ">
                    <a href="{{route("admin.categories.index")}}" class='sidebar-link'>
                        <i class="fa-solid fa-book-open"></i>
                        <span>{{__('messages.Kategoriler')}}</span>
                    </a>
                </li>
                @can('user-list')
                    <li class="sidebar-item {{(request()->is('admin/users')) ? 'active' : ""}} ">
                        <a href="{{route("admin.users.index")}}" class='sidebar-link'>
                            <i class="fa-solid fa-users"></i>
                            <span>{{__('messages.Kullanıcılar')}}</span>
                        </a>
                    </li>
                @endcan

                @can('role-list')
                    <li class="sidebar-item {{(request()->is('admin/role')) ? 'active' : ""}} ">
                        <a href="{{route("admin.role.index")}}" class='sidebar-link'>
                            <i class="fa-solid fa-user"></i>
                            <span>{{__('messages.Roller')}}</span>
                        </a>
                    </li>
                @endcan

                @can('permission-list')
                    <li class="sidebar-item {{(request()->is('admin/permission')) ? 'active' : ""}} ">
                        <a href="{{route("admin.permission.index")}}" class='sidebar-link'>
                            <i class="fa-solid fa-user-lock"></i>
                            <span>{{__('messages.İzinler')}}</span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-item {{(request()->is('admin/bayi')) ? 'active' : ""}} ">
                    <a href="{{route("admin.bayi.index")}}" class='sidebar-link'>
                        <i class="fa-solid fa-users-line"></i>
                        <span>{{__('messages.Bayiler')}}</span>
                    </a>
                </li>

                <li class="sidebar-item {{(request()->is('admin/slider')) ? 'active' : ""}} ">
                    <a href="{{route("admin.slider.index")}}" class='sidebar-link'>
                        <i class="fa-solid fa-images"></i>
                        <span>Slider</span>
                    </a>
                </li>

                <li class="sidebar-item {{(request()->is('admin/orders')) ? 'active' : ""}} ">
                    <a href="{{route("admin.orders.index")}}" class='sidebar-link'>
                        <i class="fa-solid fa-shopping-basket"></i>
                        <span>Order</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
