<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Language -->
            <li class="nav-item dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-language rounded-circle ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach (locales() as $locale)
                        <li>
                            <a href="{{route("change-lang", $locale)}}" class="dropdown-item" href="{{ route('change-lang', $locale) }}">
                                <span class="align-middle">{{ __('admin.locale.' . $locale) }}</span>
                            </a>
                    @endforeach
                </ul>
            </li>
            <!--/ Language -->

            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class="ti ti-sun me-2"></i>{{ __('admin.light') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon me-2"></i>{{ __('admin.dark') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i
                                    class="ti ti-device-desktop me-2"></i>{{ __('admin.system') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Style Switcher-->


            

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset("storage/users/" . auth()->user()->profile) }}" class="h-auto rounded-circle object-cover" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset("storage/users/" . auth()->user()->profile) }}" class="h-auto rounded-circle object-cover" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">{{ auth()->user()->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route("profile.index") }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">{{ __('admin.profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">{{ __('admin.setting') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route("logout")}}" id="logout-button">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">{{ __('site.logout') }}</span>
                            <form action="{{route("logout")}}" id="logout" method="POST">
                                @csrf
                            </form>
                            <script>
                                const logoutForm = document.getElementById('logout');
                                const logoutBtn = document.getElementById("logout-button");
                                logoutBtn.onclick = function (e) {
                                    e.preventDefault();
                                    logoutForm.submit();
                                }
                            </script>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>


</nav>


