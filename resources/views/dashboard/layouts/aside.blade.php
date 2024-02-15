<!--begin::Aside-->
<div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Brand-->

    <div class=" sidebar-logo">
        <a href="{{ route('dashboard.home') }}" href="index.html"
            class="logo d-flex align-items-center justify-content-center">
            <img src="{{ asset('dashboard-assets/media/logos/logo bug 1.png') }}" alt="">

            <h1 class="h-20px theme-light-show text-center mx-2 text-bold" style="color: #FFC107;">Bugfier</h1>
            <h1 class="h-20px theme-dark-show text-center text-bold" style="color: #FFC107;">Bugfier</h1>
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->


    <!--begin::Aside menu-->
    <div class="aside-menu flex-column flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">



        <a class="nav-btn " href="{{ route('dashboard.home') }}">

            <button>{{ __('Dashboard') }} </button>
        </a>


        <!--begin::Aside Menu-->
        <div class="w-100 hover-scroll-overlay-y my-sidebar-nav d-flex pe-2" id="kt_aside_menu_wrapper"
            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto"
                id="#kt_aside_menu" data-kt-menu="true">



                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.admins.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.admins.create' ? 'active' : '' }} "
                    id="dropdown1">
                    <div class="nav-link collapsed" onclick="toggleDropdown(1)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M26.2497 11.5355C26.206 11.5355 26.1768 11.5355 26.1331 11.5355H26.0602C23.3039 11.448 21.2477 9.31878 21.2477 6.69378C21.2477 4.01044 23.4352 1.83752 26.1039 1.83752C28.7727 1.83752 30.9602 4.02503 30.9602 6.69378C30.9456 9.33336 28.8893 11.4625 26.2643 11.55C26.2643 11.5354 26.2643 11.5355 26.2497 11.5355ZM26.1039 4.01045C24.631 4.01045 23.4352 5.20629 23.4352 6.6792C23.4352 8.12295 24.5581 9.28962 26.0018 9.34795C26.0164 9.33337 26.1331 9.33337 26.2643 9.34795C27.6789 9.27504 28.7727 8.10837 28.7873 6.6792C28.7873 5.20629 27.5914 4.01045 26.1039 4.01045Z"
                                    fill="currentColor" />
                                <path
                                    d="M26.2646 22.2834C25.6958 22.2834 25.1271 22.2396 24.5583 22.1375C23.9604 22.0355 23.5667 21.4667 23.6687 20.8688C23.7708 20.2709 24.3396 19.8771 24.9375 19.9792C26.7312 20.2855 28.6271 19.9501 29.8958 19.1042C30.5812 18.6521 30.9458 18.0834 30.9458 17.5146C30.9458 16.9459 30.5667 16.3917 29.8958 15.9396C28.6271 15.0938 26.7021 14.7584 24.8937 15.0792C24.2958 15.1959 23.7271 14.7875 23.625 14.1896C23.5229 13.5917 23.9167 13.023 24.5146 12.9209C26.8917 12.498 29.3563 12.95 31.1063 14.1167C32.3896 14.9771 33.1333 16.2021 33.1333 17.5146C33.1333 18.8125 32.4042 20.0521 31.1063 20.9271C29.7792 21.8021 28.0583 22.2834 26.2646 22.2834Z"
                                    fill="currentColor" />
                                <path
                                    d="M8.70622 11.5354C8.69164 11.5354 8.67705 11.5354 8.67705 11.5354C6.05205 11.4479 3.9958 9.31873 3.98122 6.69373C3.98122 4.0104 6.16872 1.82291 8.83747 1.82291C11.5062 1.82291 13.6937 4.01041 13.6937 6.67916C13.6937 9.31874 11.6375 11.4479 9.01247 11.5354L8.70622 10.4417L8.8083 11.5354C8.77914 11.5354 8.73539 11.5354 8.70622 11.5354ZM8.85205 9.34791C8.93955 9.34791 9.01247 9.3479 9.09997 9.36249C10.3979 9.30415 11.5354 8.13748 11.5354 6.69373C11.5354 5.22082 10.3396 4.02498 8.86664 4.02498C7.39372 4.02498 6.19788 5.22082 6.19788 6.69373C6.19788 8.1229 7.30622 9.27499 8.7208 9.36249C8.73538 9.3479 8.79372 9.34791 8.85205 9.34791Z"
                                    fill="currentColor" />
                                <path
                                    d="M8.69167 22.2834C6.89792 22.2834 5.17709 21.8021 3.85 20.9271C2.56667 20.0667 1.82292 18.8271 1.82292 17.5146C1.82292 16.2167 2.56667 14.9771 3.85 14.1167C5.6 12.95 8.06459 12.498 10.4417 12.9209C11.0396 13.023 11.4333 13.5917 11.3313 14.1896C11.2292 14.7875 10.6604 15.1959 10.0625 15.0792C8.25417 14.7584 6.34376 15.0938 5.06042 15.9396C4.37501 16.3917 4.01042 16.9459 4.01042 17.5146C4.01042 18.0834 4.38959 18.6521 5.06042 19.1042C6.32917 19.9501 8.225 20.2855 10.0188 19.9792C10.6167 19.8771 11.1854 20.2855 11.2875 20.8688C11.3896 21.4667 10.9958 22.0355 10.3979 22.1375C9.82917 22.2396 9.26042 22.2834 8.69167 22.2834Z"
                                    fill="currentColor" />
                                <path
                                    d="M17.4997 22.4292C17.456 22.4292 17.4268 22.4292 17.3831 22.4292H17.3102C14.5539 22.3417 12.4977 20.2125 12.4977 17.5875C12.4977 14.9042 14.6852 12.7312 17.3539 12.7312C20.0227 12.7312 22.2102 14.9187 22.2102 17.5875C22.1956 20.2271 20.1393 22.3562 17.5143 22.4437C17.5143 22.4292 17.5143 22.4292 17.4997 22.4292ZM17.3539 14.9042C15.881 14.9042 14.6852 16.1 14.6852 17.5729C14.6852 19.0167 15.8081 20.1833 17.2518 20.2417C17.2664 20.2271 17.3831 20.2271 17.5143 20.2417C18.9289 20.1687 20.0227 19.0021 20.0373 17.5729C20.0373 16.1146 18.8414 14.9042 17.3539 14.9042Z"
                                    fill="currentColor" />
                                <path
                                    d="M17.4997 33.1916C15.7497 33.1916 13.9997 32.7395 12.6434 31.8208C11.3601 30.9604 10.6163 29.7354 10.6163 28.4229C10.6163 27.125 11.3455 25.8708 12.6434 25.0104C15.3705 23.202 19.6434 23.202 22.3559 25.0104C23.6393 25.8708 24.383 27.0958 24.383 28.4083C24.383 29.7062 23.6539 30.9604 22.3559 31.8208C20.9997 32.725 19.2497 33.1916 17.4997 33.1916ZM13.8539 26.8479C13.1684 27.3 12.8038 27.8687 12.8038 28.4375C12.8038 29.0062 13.183 29.5604 13.8539 30.0125C15.8226 31.3395 19.1622 31.3395 21.1309 30.0125C21.8164 29.5604 22.1809 28.9916 22.1809 28.4229C22.1809 27.8541 21.8018 27.3 21.1309 26.8479C19.1768 25.5208 15.8372 25.5354 13.8539 26.8479Z"
                                    fill="currentColor" />
                            </svg>

                        </i>
                        <span>{{ __('Team') }}</span>
                        <i id="icon1" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a class="with-border" href="{{ route('dashboard.admins.index') }}">{{ __('Admins') }}</a>
                        <a href="{{ route('dashboard.admins.create') }}">{{ __('Add Admin') }}</a>
                    </div>
                </div>



                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.roles.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.roles.create' ? 'active' : '' }} "
                    id="dropdown2">
                    <div class="nav-link collapsed" onclick="toggleDropdown(2)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                                fill="none">
                                <path
                                    d="M29.1667 14C29.1667 8.16668 26.8333 5.83334 21 5.83334H14C8.16666 5.83334 5.83333 8.16668 5.83333 14V21C5.83333 26.8333 8.16666 29.1667 14 29.1667"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M23.8437 11.6667C23.0417 10.6458 21.7 10.2083 19.6875 10.2083H15.3125C11.6667 10.2083 10.2083 11.6667 10.2083 15.3125V19.6875C10.2083 21.7 10.6458 23.0417 11.6521 23.8438"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.6812 5.83332V2.91666" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.5 5.83332V2.91666" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M23.3333 5.83332V2.91666" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M29.1667 11.6667H32.0833" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.6812 29.1667V32.0833" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.91666 11.6667H5.83332" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.91666 17.5H5.83332" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.91666 23.3333H5.83332" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M24.3688 27.1104C25.6494 27.1104 26.6875 26.0723 26.6875 24.7917C26.6875 23.511 25.6494 22.4729 24.3688 22.4729C23.0881 22.4729 22.05 23.511 22.05 24.7917C22.05 26.0723 23.0881 27.1104 24.3688 27.1104Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M16.6396 25.4625V24.1063C16.6396 23.3042 17.2958 22.6479 18.0979 22.6479C19.4979 22.6479 20.0667 21.6563 19.3667 20.4458C18.9583 19.7458 19.2063 18.8417 19.9063 18.4479L21.2333 17.675C21.8458 17.3104 22.6333 17.5292 22.9979 18.1417L23.0854 18.2875C23.7854 19.4979 24.9229 19.4979 25.6229 18.2875L25.7104 18.1417C26.075 17.5292 26.8625 17.325 27.475 17.675L28.8021 18.4479C29.5021 18.8563 29.75 19.7458 29.3417 20.4458C28.6417 21.6563 29.2104 22.6479 30.6104 22.6479C31.4125 22.6479 32.0688 23.3042 32.0688 24.1063V25.4625C32.0688 26.2646 31.4125 26.9208 30.6104 26.9208C29.2104 26.9208 28.6417 27.9125 29.3417 29.1229C29.75 29.8229 29.5021 30.7271 28.8021 31.1208L27.475 31.8938C26.8625 32.2583 26.075 32.0396 25.7104 31.4271L25.6229 31.2813C24.9229 30.0708 23.7854 30.0708 23.0854 31.2813L22.9979 31.4271C22.6333 32.0396 21.8458 32.2438 21.2333 31.8938L19.9063 31.1208C19.2063 30.7125 18.9583 29.8229 19.3667 29.1229C20.0667 27.9125 19.4979 26.9208 18.0979 26.9208C17.2958 26.9354 16.6396 26.2792 16.6396 25.4625Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                        <span>{{ __('Management') }}</span>
                        <i id="icon2" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.roles.index') }}"
                            class="with-border">{{ __('Management') }}</a>
                        <a href="{{ route('dashboard.roles.create') }}">{{ __('Add Management') }}</a>
                    </div>
                </div>







                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.projects.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.projects.create' ? 'active' : '' }} "
                    id="dropdown3">
                    <div class="nav-link collapsed" onclick="toggleDropdown(3)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32" fill="none">
                                <path
                                    d="M25.3333 8.00001H22.6667C22.6667 4.26668 19.7333 1.33334 16 1.33334C12.2667 1.33334 9.33333 4.26668 9.33333 8.00001H6.66667C5.2 8.00001 4 9.20001 4 10.6667V26.6667C4 28.1333 5.2 29.3333 6.66667 29.3333H25.3333C26.8 29.3333 28 28.1333 28 26.6667V10.6667C28 9.20001 26.8 8.00001 25.3333 8.00001ZM16 4.00001C18.2667 4.00001 20 5.73334 20 8.00001H12C12 5.73334 13.7333 4.00001 16 4.00001ZM25.3333 26.6667H6.66667V10.6667H25.3333V26.6667ZM16 16C13.7333 16 12 14.2667 12 12H9.33333C9.33333 15.7333 12.2667 18.6667 16 18.6667C19.7333 18.6667 22.6667 15.7333 22.6667 12H20C20 14.2667 18.2667 16 16 16Z"
                                    fill="currentColor" />
                            </svg>
                        </i>
                        <span>{{ __('Projects') }}
                        </span>
                        <i id="icon3" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.projects.index') }}"
                            class="with-border">{{ __('Projects') }}</a>
                        <a href="{{ route('dashboard.projects.create') }}">{{ __('Add Project') }}</a>
                    </div>
                </div>






                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.levels.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.levels.create' ? 'active' : '' }} "
                    id="dropdown4">
                    <div class="nav-link collapsed" onclick="toggleDropdown(4)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-bar-chart-steps" viewBox="0 0 16 16">
                                <path
                                    d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0M2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </i>
                        <span> {{ __('Levels') }}</span>
                        <i id="icon4" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.levels.index') }}" class="with-border">{{ __('Levels') }}</a>
                        <a href="{{ route('dashboard.levels.create') }}">{{ __('Add Level') }}</a>
                    </div>
                </div>



                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.bugs.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.bugs.create' ? 'active' : '' }} "
                    id="dropdown5">
                    <div class="nav-link collapsed" onclick="toggleDropdown(5)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 30 30" fill="none">
                                <path
                                    d="M11.25 16.25C10.425 16.6625 9.73751 17.275 9.22501 18.0375C8.93751 18.475 8.93751 19.025 9.22501 19.4625C9.73751 20.225 10.425 20.8375 11.25 21.25"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M19.0125 16.25C19.8375 16.6625 20.525 17.275 21.0375 18.0375C21.325 18.475 21.325 19.025 21.0375 19.4625C20.525 20.225 19.8375 20.8375 19.0125 21.25"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M2.5 16.25V18.75C2.5 25 5 27.5 11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M2.78749 10.0125L26.8125 10" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                        <span>{{ __('Bugs') }}</span>
                        <i id="icon5" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.bugs.index') }}" class="with-border">{{ __('Bugs') }}</a>
                        <a href="{{ route('dashboard.bugs.create') }}">{{ __('Add Bug') }}</a>
                    </div>
                </div>



                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.awards.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.awards.create' ? 'active' : '' }} "
                    id="dropdown6">
                    <div class="nav-link collapsed" onclick="toggleDropdown(6)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 30 30" fill="none">
                                <path
                                    d="M24.9625 12.5H4.96249V22.5C4.96249 26.25 6.21249 27.5 9.96249 27.5H19.9625C23.7125 27.5 24.9625 26.25 24.9625 22.5V12.5Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M26.875 8.75V10C26.875 11.375 26.2125 12.5 24.375 12.5H5.625C3.7125 12.5 3.125 11.375 3.125 10V8.75C3.125 7.375 3.7125 6.25 5.625 6.25H24.375C26.2125 6.25 26.875 7.375 26.875 8.75Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M14.55 6.25H7.65001C7.22501 5.7875 7.23751 5.075 7.68751 4.625L9.46251 2.85C9.92501 2.3875 10.6875 2.3875 11.15 2.85L14.55 6.25Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M22.3375 6.25H15.4375L18.8375 2.85C19.3 2.3875 20.0625 2.3875 20.525 2.85L22.3 4.625C22.75 5.075 22.7625 5.7875 22.3375 6.25Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M11.175 12.5V18.925C11.175 19.925 12.275 20.5125 13.1125 19.975L14.2875 19.2C14.7125 18.925 15.25 18.925 15.6625 19.2L16.775 19.95C17.6 20.5 18.7125 19.9125 18.7125 18.9125V12.5H11.175Z"
                                    stroke="currentColor" stroke-width="2.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                        <span>{{ __('Awards') }}</span>
                        <i id="icon6" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.awards.index') }}" class="with-border">{{ __('Awards') }}</a>
                        <a href="{{ route('dashboard.awards.create') }}">{{ __('Add Award') }}</a>
                    </div>
                </div>



                <div class="menu-link {{ Route::currentRouteName() === 'dashboard.statuses.index' ? 'active' : '' }} {{ Route::currentRouteName() === 'dashboard.statuses.create' ? 'active' : '' }} "
                    id="dropdown7">
                    <div class="nav-link collapsed" onclick="toggleDropdown(7)">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                viewBox="0 0 28 28" fill="none">
                                <path
                                    d="M19.1567 9.27501C22.0033 12.1217 22.0033 16.7417 19.1567 19.5883C16.31 22.435 11.69 22.435 8.84334 19.5883C5.99668 16.7417 5.99668 12.1217 8.84334 9.27501C11.69 6.42834 16.31 6.42834 19.1567 9.27501Z"
                                    fill="currentColor" />
                                <path
                                    d="M9.62502 26.1217C9.52002 26.1217 9.40335 26.0983 9.29835 26.0633C6.67335 25.0133 4.55002 23.1583 3.12668 20.7083C1.75002 18.3167 1.20168 15.61 1.56335 12.8567C1.62168 12.3783 2.07668 12.04 2.54335 12.0983C3.02168 12.1567 3.36002 12.6 3.30168 13.0783C2.99835 15.4467 3.46502 17.78 4.64335 19.8333C5.85668 21.9333 7.68835 23.5317 9.94002 24.43C10.3833 24.6167 10.605 25.1183 10.43 25.5733C10.3017 25.9117 9.96335 26.1217 9.62502 26.1217Z"
                                    fill="currentColor" />
                                <path
                                    d="M6.825 6.10166C6.56833 6.10166 6.31166 5.98499 6.13666 5.76333C5.83333 5.38999 5.90333 4.84166 6.28833 4.53833C8.50499 2.79999 11.1767 1.87833 14 1.87833C16.7533 1.87833 19.3783 2.76499 21.5833 4.44499C21.9683 4.73666 22.0383 5.28499 21.7467 5.66999C21.455 6.05499 20.9067 6.12499 20.5217 5.83333C18.62 4.38666 16.3683 3.62833 14 3.62833C11.5733 3.62833 9.27499 4.42166 7.36166 5.91499C7.19833 6.04333 7.01166 6.10166 6.825 6.10166Z"
                                    fill="currentColor" />
                                <path
                                    d="M18.375 26.1217C18.025 26.1217 17.6983 25.9117 17.5583 25.5733C17.3833 25.13 17.5933 24.6167 18.0483 24.43C20.3 23.52 22.1317 21.9333 23.345 19.8333C24.535 17.78 25.0017 15.4467 24.6867 13.09C24.6283 12.6117 24.9667 12.1683 25.445 12.11C25.9117 12.0517 26.3667 12.39 26.425 12.8683C26.775 15.61 26.2383 18.3283 24.8617 20.72C23.45 23.17 21.315 25.0133 18.69 26.075C18.5967 26.0983 18.4917 26.1217 18.375 26.1217Z"
                                    fill="currentColor" />
                            </svg>
                        </i>
                        <span> {{ __('Statuses') }}</span>
                        <i id="icon7" class='arrow-margin'> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-chevron-down"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg> </i>
                    </div>
                    <div class="dropdown-content absolute">
                        <a href="{{ route('dashboard.statuses.index') }}"
                            class="with-border">{{ __('Statuses') }}</a>
                        <a href="{{ route('dashboard.statuses.create') }}">{{ __('Add Status') }}</a>
                    </div>
                </div>



                {{--
                <!--begin:Menu item--> --}}
                {{-- <div data-kt-menu-trigger="click" --}} {{--
                    class="menu-item menu-accordion {{prefixHoverShow('settings')}}"> --}}
                {{--
                    <!--begin:Menu link--> --}}
                {{-- <span class="menu-link"> --}}
                {{-- <span class="menu-icon"> --}}
                {{--
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg--> --}}
                {{-- <span class="svg-icon svg-icon-5"> --}}
                {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" --}} {{--
                                    xmlns="http://www.w3.org/2000/svg"> --}}
                {{--
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" --}} {{--
                                        fill="currentColor" /> --}}
                {{--
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                        --}} {{-- fill="currentColor" /> --}}
                {{--
                                </svg> --}}
                {{-- </span> --}}
                {{--
                            <!--end::Svg Icon--> --}}
                {{--
                        </span> --}}
                {{-- <span class="menu-title">{{__('Settings')}}</span> --}}
                {{-- <span class="menu-arrow"></span> --}}
                {{-- </span> --}}
                {{--
                    <!--end:Menu link--> --}}

                {{--
                    <!--begin:Menu sub--> --}}
                {{-- <div class="menu-sub menu-sub-accordion"> --}}
                {{--
                        <!--begin:Menu item--> --}}
                {{-- <div class="menu-item {{prefixShow('dashboard.settings.index')}}"> --}}
                {{-- @can('view_settings') --}}
                {{--
                            <!--begin:Menu link--> --}}
                {{-- <a class="menu-link" href="{{ route('dashboard.settings.index') }}"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                data-bs-placement="right"> --}}
                {{-- <span class="menu-bullet"> --}}
                {{-- <span class="bullet bullet-dot"></span> --}}
                {{-- </span> --}}
                {{-- <span class="menu-title">{{ __("General Setting") }}</span> --}}
                {{-- </a> --}}
                {{--
                            <!--end:Menu link--> --}}
                {{-- @endcan --}}
                {{--
                        </div> --}}
                {{--
                        <!--end:Menu item--> --}}
                {{--
                    </div>
                    <!--end:Menu sub--> --}}
                {{--
                </div>
                <!--end:Menu item--> --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">

        <!--begin::User panel-->
        <div class="d-flex flex-stack">
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center">
                <!--begin::Avatar-->
                <div class="symbol symbol-circle symbol-40px">
                    <img alt="Profile picture"
                        src="{{ getImageUserPath(auth('admin')->user()->image, 'Admins') }}" />
                </div>
                <!--end::Avatar-->

                <!--begin::User info-->
                <div class="ms-2">
                    <!--begin::Name-->
                    <div class="text-gray-800 fs-6 fw-bold lh-1">{{ auth('admin')->user()->fullName }}</div>
                    <!--end::Name-->

                    <!--begin::Major-->
                    <span class=" fw-semibold d-block fs-7 lh-1"
                        style="color: #FFC107">{{ auth('admin')->user()->roles->first()->name ?? '' }}</span>
                    <!--end::Major-->
                </div>
                <!--end::User info-->
            </div>
            <!--end::Wrapper-->

            <!--begin::User menu-->
            <div class="ms-1">
                <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-end">
                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                fill="currentColor" />
                            <path
                                d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--begin::User account menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <img alt="Profile picture"
                                    src="{{ getImageUserPath(auth('admin')->user()->image, 'Admins') }}" />
                            </div>
                            <!--end::Avatar-->

                            <!--begin::Username-->
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">
                                    {{ auth('admin')->user()->fullName }}
                                    <span
                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ auth('admin')->user()->roles->first()->name ?? '' }}</span>
                                </div>
                                <a href="#"
                                    class="fw-semibold text-muted text-hover-primary fs-7">{{ auth('admin')->user()->email }}</a>
                            </div>
                            <!--end::Username-->
                        </div>
                    </div>
                    <!--end::Menu item-->


                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    {{-- <div class="menu-item px-5">
                        <a href="../../demo3/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                    </div> --}}
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    {{-- <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                        <a href="#" class="menu-link px-5">
                            <span class="menu-title">My Subscription</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/billing.html" class="menu-link px-5">Billing</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/statements.html" class="menu-link px-5">Payments</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo3/dist/account/statements.html"
                                    class="menu-link d-flex flex-stack px-5">Statements
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="View your statements"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3">
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                            checked="checked" name="notifications" />
                                        <span class="form-check-label text-muted fs-7">Notifications</span>
                                    </label>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div> --}}
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    {{-- <div class="separator my-2"></div> --}}
                    <!--end::Menu separator-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                        <a href="#" class="menu-link px-5">
                            <span class="menu-title position-relative">{{ __('Language') }}
                                @if (getLocale() == 'en')
                                    <span
                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ __('English') }}
                                        <img class="w-15px h-15px rounded-1 ms-2"
                                            src="{{ asset('dashboard-assets/media/flags/united-states.svg') }}"
                                            alt="" />
                                    </span>
                            </span>
                        @else
                            <span
                                class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ __('Arabic') }}
                                <img class="w-15px h-15px rounded-1 ms-2"
                                    src="{{ asset('dashboard-assets/media/flags/egypt.svg') }}" alt="" />
                            </span>
                            @endif
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('change-language', 'en') }}"
                                    class="menu-link d-flex px-5 @if (getLocale() == 'en') active @endif ">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1"
                                            src="{{ asset('dashboard-assets/media/flags/united-states.svg') }}"
                                            alt="" />
                                    </span>{{ __('English') }}
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('change-language', 'ar') }}"
                                    class="menu-link d-flex px-5 @if (getLocale() == 'ar') active @endif ">
                                    <span class="symbol symbol-20px me-4">
                                        <img class="rounded-1"
                                            src="{{ asset('dashboard-assets/media/flags/egypt.svg') }}"
                                            alt="" />
                                    </span>{{ __('Arabic') }}
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-5 my-1">
                        <a href="{{ route('dashboard.edit-profile') }}"
                            class="menu-link px-5">{{ __('Account
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Settings') }}</a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->

                    <!--end::Menu item-->
                </div>
                <!--end::User account menu-->
            </div>
            <!--end::User menu-->
        </div>
        <!--end::User panel-->
        <div class="menu-item my-logout-form ">
            <form id="logout-form" method="post" action="{{ route('admin.logout') }}">
                @csrf
                <button onclick="return confirm('{{ __('Are you sure to logout') }}');"
                    onclick="$('#logout-form').submit()" class="menu-link logout-btn btn px-5"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20"
                        fill="none">
                        <path d="M12.1667 5.83314L8 9.99981L12.1667 14.1665" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 9.99982L18 9.99982" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M8 17.4998H4.66667C4.22464 17.4998 3.80072 17.3242 3.48816 17.0117C3.1756 16.6991 3 16.2752 3 15.8332L3 4.16648C3 3.72446 3.1756 3.30053 3.48816 2.98797C3.80072 2.67541 4.22464 2.49982 4.66667 2.49982H8"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> {{ __('Sign Out') }}</button>
            </form>
        </div>
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->



@push('scripts')
    <script>
        let activeDropdown = null;

        function toggleDropdown(index) {
            const dropdown = document.getElementById(`dropdown${index}`);
            const icon = document.getElementById(`icon${index}`);

            if (index === activeDropdown) {
                dropdown.classList.remove('active');
                icon.classList.remove('rotate');
                activeDropdown = null;
            } else {
                if (activeDropdown !== null) {
                    const activeDropdownElement = document.getElementById(`dropdown${activeDropdown}`);
                    const activeIcon = document.getElementById(`icon${activeDropdown}`);
                    activeDropdownElement.classList.remove('active');
                    activeIcon.classList.remove('rotate');
                }

                dropdown.classList.add('active');
                icon.classList.add('rotate');
                activeDropdown = index;
            }
        }
    </script>
@endpush
