<div class="app-brand demo">
    <a href="{{ url('admin/dashboard') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img class="brand-logo img-logo h-auto" width="20" src="logo.png" alt="">
        </span>
        <span class="app-brand-text demo menu-text fw-bold">{{__('admin.control_panel')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>
<ul class="menu-inner py-1">

    <li class="menu-item  @if (Route::currentRouteName() == 'dashboard')
        open active
    @endif ">
        <a class="menu-link " href="http://127.0.0.1:8000/admin/dashboard">
            <i class="menu-icon menu-icon tf-icons fa fa-home"></i>
            <div data-i18n="الرئيسية">الرئيسية </div>
        </a>
    </li>

    <li class="menu-item   @if (Route::currentRouteName() == '#')
        open active
    @endif ">
        <a class="menu-link " href="{{route("dashboard")}}">
            <i class="menu-icon menu-icon tf-icons fa fa-user"></i>
            <div data-i18n="البروفايل">البروفايل </div>

        </a>
    </li>

    <li class="menu-item 
        @if (Route::currentRouteName() == 'users.index')
            open active
        @endif
    
    ">
        <a class="menu-link " href="{{route("users.index")}}">
            <i class="menu-icon menu-icon tf-icons fa fa-users"></i>
            <div data-i18n="المستخدمين">المستخدمين </div>

        </a>
    </li>

    <li class="menu-item   @if (Route::currentRouteName() == '#')
        open active
    @endif ">
        <a class="menu-link " href="http://127.0.0.1:8000/admin/admins">
            <i class="menu-icon menu-icon tf-icons fa fa-users"></i>
            <div data-i18n="المشرفين">المشرفين </div>

        </a>
    </li>

    <li class="menu-item  @if (Route::currentRouteName() == '#')
        open active
    @endif  ">
        <a class="menu-link " href="http://127.0.0.1:8000/admin/roles">
            <i class="menu-icon menu-icon tf-icons fa fa-eye"></i>
            <div data-i18n="قائمة الصلاحيات">قائمة الصلاحيات </div>

        </a>
    </li>



</ul>