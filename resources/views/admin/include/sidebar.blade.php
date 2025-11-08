<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route('dashboard')}}">
                <img src="{{asset($webLogo->desktop_logo)}}" class="header-brand-img light-logo1" alt="logo">
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                                  fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menu</h3>
                </li>
                @php
        // Fetch the user type of the authenticated user
        $userType = auth()->user()->user_type;

        // Initialize roleRoutes variable
        $roleRoutes = [];

        // If user_type is not 1, fetch the role IDs and route names
        if ($userType !== 1) {
            $roleIds = DB::table('user_roles')->where('user_id', auth()->user()->id)->pluck('role_id')->toArray();
            $roleRoutes = DB::table('role_routes')->whereIn('role_id', $roleIds)->pluck('route_name')->toArray();
        }
    @endphp

    <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z"/></svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

    {{-- ==================
     USER MODULE MENU SECTION
================== --}}





@if ($userType == 1 || in_array('post.index', $roleRoutes))
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('post.*') ? 'active' : '' }}"
                       href="{{ route('post.index') }}">
                        <i class="las la-newspaper side-menu__icon"></i>
                        <span class="side-menu__label">Post</span>
                    </a>
                </li>
                @endif
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('video.*') ? 'active' : '' }}"
                       href="{{ route('video.index') }}">
                        <i class="las la-video side-menu__icon"></i>
                        <span class="side-menu__label">Video</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('reporter.*') ? 'active' : '' }}"
                       href="{{ route('reporter.index') }}">
                        <i class="las la-user-tie side-menu__icon"></i>
                        <span class="side-menu__label">Reporter</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('slider.*') ? 'active' : '' }}"
                       href="{{ route('slider.index') }}">
                        <i class="las la-images side-menu__icon"></i>
                        <span class="side-menu__label">Slider</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('ads.*') ? 'active' : '' }}"
                       href="{{ route('ads.index') }}">
                        <i class="las la-ad side-menu__icon"></i>
                        <span class="side-menu__label">Ads</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('category.*') ? 'active' : '' }}"
                       href="{{ route('category.index') }}">
                        <i class="las la-list-ul side-menu__icon"></i>
                        <span class="side-menu__label">Category</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('subcategory.index') ? 'active' : '' }}"
                       href="{{ route('subcategory.index') }}">
                        <i class="las la-list-alt side-menu__icon"></i>
                        <span class="side-menu__label">Subcategory</span>
                    </a>
                </li>


                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('subsubcategory.index') ? 'active' : '' }}"
                       href="{{ route('subsubcategory.index') }}">
                        <i class="las la-map-marked-alt side-menu__icon"></i>
                        <span class="side-menu__label">District</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('upazila.index') ? 'active' : '' }}"
                       href="{{ route('upazila.index') }}">
                        <i class="las la-map side-menu__icon"></i>
                        <span class="side-menu__label">Upazila</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('editoral.index') ? 'active' : '' }}"
                       href="{{ route('editoral.index') }}">
                        <i class="las la-edit side-menu__icon"></i>
                        <span class="side-menu__label">Editorial</span>
                    </a>
                </li>


                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('logo.index') ? 'active' : '' }}"
                       data-bs-toggle="slide"
                       href="{{ route('logo.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm0 2v14h16V5H4zm4 3a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm-2 9l3.5-4.5 2.5 3 3.5-4.5 4.5 6H6z"/>
                        </svg>
                        <span class="side-menu__label">Logo</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('notice.index') ? 'active' : '' }}"
                       href="{{ route('notice.index') }}">
                        <i class="las la-bullhorn side-menu__icon"></i>
                        <span class="side-menu__label">Notice</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('webextra.index') ? 'active' : '' }}"
                       href="{{ route('webextra.index') }}">
                        <i class="las la-cogs side-menu__icon"></i>
                        <span class="side-menu__label">Web Extra</span>
                    </a>
                </li>
                @if ($userType == 1 || !empty(array_filter(['role.add', 'role.manage', 'user.add', 'user.manage'], fn($route) => in_array($route, $roleRoutes))))
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="las la-users side-menu__icon"></i>
                            <span class="side-menu__label">User Module</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>

                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">User Module</a></li>

                            {{-- Add Role --}}
                            @if ($userType == 1 || in_array('role.add', $roleRoutes))
                                <li>
                                    <a href="{{ route('role.add') }}" class="slide-item {{ request()->routeIs('role.add') ? 'active' : '' }}">
                                        <i class="las la-user-shield me-1"></i> Add Role
                                    </a>
                                </li>
                            @endif

                            {{-- Manage Role --}}
                            @if ($userType == 1 || in_array('role.manage', $roleRoutes))
                                <li>
                                    <a href="{{ route('role.manage') }}" class="slide-item {{ request()->routeIs('role.manage') ? 'active' : '' }}">
                                        <i class="las la-user-cog me-1"></i> Manage Role
                                    </a>
                                </li>
                            @endif

                            {{-- Add User --}}
                            @if ($userType == 1 || in_array('user.add', $roleRoutes))
                                <li>
                                    <a href="{{ route('user.add') }}" class="slide-item {{ request()->routeIs('user.add') ? 'active' : '' }}">
                                        <i class="las la-user-plus me-1"></i> Add User
                                    </a>
                                </li>
                            @endif

                            {{-- Manage User --}}
                            @if ($userType == 1 || in_array('user.manage', $roleRoutes))
                                <li>
                                    <a href="{{ route('user.manage') }}" class="slide-item {{ request()->routeIs('user.manage') ? 'active' : '' }}">
                                        <i class="las la-users-cog me-1"></i> Manage User
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                                           width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
