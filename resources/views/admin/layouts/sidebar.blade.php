<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{route('admin.dashboard')}}"><img src="{{ asset('admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="{{route('admin.dashboard')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/4.svg') }}" alt>
                </div>
                <span>Catelogues</span>
            </a>
            <ul>
                <li><a href="{{route('admin.categories.listCategories')}}">List Catelogues</a></li>    
                <li><a href="{{route('admin.categories.addCategories')}}">Add Catelogues</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/2.svg') }}" alt>
                </div>
                <span>Products</span>
            </a>
            <ul>
                <li><a href="{{route('admin.products.listProducts')}}">List Products</a></li>
                <li><a href="{{route('admin.products.addProducts')}}">Add Products</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/3.svg') }}" alt>
                </div>
                <span>Users</span>
            </a>
            <ul>
                <li><a href="{{route('admin.users.listUsers')}}">List Users</a></li>
                <li><a href="{{route('admin.users.addUsers')}}">Add Users</a></li>
            </ul>
        </li>
        <li class="mm-active">
            <a class="" href="{{route('home')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Client</span>
            </a>
        </li>
    </ul>
</nav>
