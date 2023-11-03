<nav class="sb-sidenav accordion " id="sidenavAccordion" style="background: #f0ffffde;">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{--#1.0 Core Start--}}
            <group1>
                <div class="sb-sidenav-menu-heading">Core</div>
                @include('layouts.back-end.sidebar-components._core')
            </group1>{{--#1.0Core End--}}

            {{--#2.0 Interface Start--}}
            <group2>
                <div class="sb-sidenav-menu-heading">Interface</div>
            </group2>{{--#2.0Interface End--}}

            {{--#2.1 Super Admin Components Start--}}
            <group3>
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('super-admin'))
                    @include('layouts.back-end.sidebar-components.interface._only_super_admin')
                @endif
            </group3>{{--#2.1 Super Admin Components End--}}
{{--#2.2    User Management Start--}}
            <group4>
{{--                #2.2.1  Permission Chck User Management Start--}}
                @if(auth()->user()->hasUserPermission('add_department') || auth()->user()->hasUserPermission('add_user') || auth()->user()->hasUserPermission('list_user') || auth()->user()->hasUserPermission('view_user') || auth()->user()->hasUserPermission('edit_user') || auth()->user()->hasUserPermission('delete_user') || auth()->user()->hasUserPermission('add_department'))
{{--               #2.2.1.1   Route/URL Chck and set navigation header User Management Start--}}
                    <subgroup1>
                        @if(Route::currentRouteName() == 'add.user'|| Route::currentRouteName() == 'user.list' || Route::currentRouteName() == 'user.single.view' || Route::currentRouteName() == 'add.department'|| Route::currentRouteName() == 'user.edit')
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#userLayouts"
                               aria-expanded="true" aria-controls="userLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-group"></i></div>
                                User Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="userLayouts" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordion">
                                @else
                                    <a class="nav-link collapsed text-chl" href="#" data-bs-toggle="collapse"
                                       data-bs-target="#userLayouts" aria-expanded="false" aria-controls="userLayouts">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-group"></i></div>
                                        User Management
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="userLayouts" aria-labelledby="headingOne"
                                         data-bs-parent="#sidenavAccordion">
                                        @endif
                                        <nav class="sb-sidenav-menu-nested nav ">
{{--                                                                Only User Related Menu and Submenu is here--}}
                                            @include('layouts.back-end.sidebar-components.interface._user_menu_submenu')
{{--                                                                Only Department Related Menu and Submenu is here--}}
                                            @include('layouts.back-end.sidebar-components.interface._department_menu_submenu')
                                        </nav>
                                    </div>
                    </subgroup1>{{--#2.2.1.1   Route/URL Chck and set navigation header User Management End--}}
                @endif{{--#2.2.1  Permission Chck User Management End--}}
            </group4>{{--#2.2    User Management End--}}

{{--            --}}{{--#2.3    Accounts File Storage System Start--}}
{{--            <group5>--}}
{{--                --}}{{--#2.3.1  Permission Chck Accounts File Storage System Start--}}
{{--                @if(auth()->user()->hasUserPermission('add_voucher_type') || auth()->user()->hasUserPermission('edit_voucher_type') || auth()->user()->hasUserPermission('delete_voucher_type') || auth()->user()->hasUserPermission('add_voucher_document') || auth()->user()->hasUserPermission('edit_voucher_document') || auth()->user()->hasUserPermission('add_fr_document')|| auth()->user()->hasUserPermission('view_voucher_document') || auth()->user()->hasUserPermission('salary_certificate_input') || auth()->user()->hasUserPermission('salary_certificate_list'))--}}
{{--                    --}}{{--#2.3.1.1   Route/URL Chck and set navigation header Accounts File Storage Start--}}
{{--                    <subgroup1>--}}
{{--                        @if(Route::currentRouteName() == 'add.voucher.info' || Route::currentRouteName() == 'add.voucher.type' || Route::currentRouteName() == 'edit.voucher.type' || Route::currentRouteName() == 'uploaded.voucher.list' || Route::currentRouteName() == 'add.bill.info' || Route::currentRouteName() == 'add.fr.info'|| Route::currentRouteName() == 'view.voucher.document' || Route::currentRouteName() == 'input.salary.certificate' || Route::currentRouteName() == 'salary.certificate.list')--}}
{{--                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#accLayouts"--}}
{{--                               aria-expanded="true" aria-controls="accLayouts">--}}
{{--                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>--}}
{{--                                Accounts--}}
{{--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                            </a>--}}
{{--                            <div class="collapse show" id="accLayouts" aria-labelledby="headingOne"--}}
{{--                                 data-bs-parent="#sidenavAccordion">--}}
{{--                                @else--}}
{{--                                    <a class="nav-link collapsed text-chl" href="#" data-bs-toggle="collapse"--}}
{{--                                       data-bs-target="#accLayouts" aria-expanded="false" aria-controls="accLayouts">--}}
{{--                                        <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>--}}
{{--                                        Accounts--}}
{{--                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                                    </a>--}}
{{--                                    <div class="collapse" id="accLayouts" aria-labelledby="headingOne"--}}
{{--                                         data-bs-parent="#sidenavAccordion">--}}
{{--                                        @endif--}}
{{--                                        <nav class="sb-sidenav-menu-nested nav ">--}}
{{--                                            --}}{{--                    Only Accounts Document related menu and submenu--}}
{{--                                            @include('layouts.back-end.sidebar-components.interface.accounts._add_menu_submenu')--}}
{{--                                            --}}{{--                    Only Document Upload related menu and submenu Here--}}
{{--                                            @include('layouts.back-end.sidebar-components.interface.accounts._upload_option_menu_submenu')--}}
{{--                                            --}}{{--                    Only List of Documet related menu and submenu Here--}}
{{--                                            @include('layouts.back-end.sidebar-components.interface.accounts._view_list_menu_submenu')--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
{{--                    </subgroup1>--}}{{--#2.3.1.1   Route/URL Chck and set navigation header Accounts File Storage End--}}
{{--                @endif --}}{{--#2.3.1  Permission Chck Accounts File Storage System End--}}
{{--            </group5>--}}{{--#2.3    Accounts File Storage System End--}}

{{--            --}}{{--#2.4    Complain section Start--}}
{{--            <group6>--}}
{{--                --}}{{--#2.4.1  Permission Chck Complain section Start--}}
{{--                @if(auth()->user()->hasUserPermission('add_complain') || auth()->user()->hasUserPermission('delete_complain') || auth()->user()->hasUserPermission('edit_complain') || auth()->user()->hasUserPermission('list_complain_all') || auth()->user()->hasUserPermission('list_department_complain_all') || auth()->user()->hasUserPermission('list_my_complain') || auth()->user()->hasUserPermission('list_my_complain_trash') || auth()->user()->hasUserPermission('view_complain_single'))--}}
{{--                    --}}{{--#2.4.1.1   Route/URL Chck and set navigation header Complain section Start--}}
{{--                    <subgroup1>--}}
{{--                        @if(Route::currentRouteName() == 'add.complain' || Route::currentRouteName() == 'individual.list.complain'|| Route::currentRouteName() == 'my.list.complain'|| Route::currentRouteName() == 'single.view.complain' || Route::currentRouteName() == 'edit.my.complain' || Route::currentRouteName() == 'my.complain.trash.list' || Route::currentRouteName() == 'departmental.list.complain')--}}
{{--                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"--}}
{{--                               aria-expanded="true" aria-controls="collapseLayouts">--}}
{{--                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>--}}
{{--                                Complains--}}
{{--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                            </a>--}}
{{--                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne"--}}
{{--                                 data-bs-parent="#sidenavAccordion">--}}
{{--                                @else--}}
{{--                                    <a class="nav-link collapsed text-chl" href="#" data-bs-toggle="collapse"--}}
{{--                                       data-bs-target="#collapseLayouts" aria-expanded="false"--}}
{{--                                       aria-controls="collapseLayouts">--}}
{{--                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>--}}
{{--                                        Complains--}}
{{--                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                                    </a>--}}
{{--                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"--}}
{{--                                         data-bs-parent="#sidenavAccordion">--}}
{{--                                        @endif--}}
{{--                                        <nav class="sb-sidenav-menu-nested nav ">--}}
{{--                                            @include('layouts.back-end.sidebar-components.interface._complain_menu_submenu')--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
{{--                    </subgroup1>--}}{{--#2.4.1.1   Route/URL Chck and set navigation header Complain section End--}}
{{--                @endif--}}{{--#2.4.1  Permission Chck Complain section End--}}
{{--            </group6>--}}{{--#2.4    Complain section End--}}

{{--            --}}{{--#2.5    Mobile Sim section Start--}}
{{--            <group7>--}}
{{--                --}}{{--#2.5.1  Permission Chck Mobile SIM section Start--}}
{{--                @if(auth()->user()->hasUserPermission('add_sim_number'))--}}
{{--                    --}}{{--#2.5.1.1   Route/URL Chck and set navigation header Mobile SIM section Start--}}
{{--                    <subgroup1>--}}
{{--                        @if(Route::currentRouteName() == 'add.number' )--}}
{{--                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#simLayouts"--}}
{{--                               aria-expanded="true" aria-controls="simLayouts">--}}
{{--                                <div class="sb-nav-link-icon"><i class="fas fa-file-lines"></i></div>--}}
{{--                                Mobile SIM--}}
{{--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                            </a>--}}
{{--                            <div class="collapse show" id="simLayouts" aria-labelledby="headingOne"--}}
{{--                                 data-bs-parent="#sidenavAccordion">--}}
{{--                                @else--}}
{{--                                    <a class="nav-link collapsed text-chl" href="#" data-bs-toggle="collapse"--}}
{{--                                       data-bs-target="#simLayouts" aria-expanded="false" aria-controls="simLayouts">--}}
{{--                                        <div class="sb-nav-link-icon"><i class="fas fa-file-lines"></i></div>--}}
{{--                                        Mobile SIM--}}
{{--                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                                    </a>--}}
{{--                                    <div class="collapse" id="simLayouts" aria-labelledby="headingOne"--}}
{{--                                         data-bs-parent="#sidenavAccordion">--}}
{{--                                        @endif--}}
{{--                                        <nav class="sb-sidenav-menu-nested nav ">--}}
{{--                                            @include('layouts.back-end.sidebar-components.interface._mobile_sim_menu_submenu')--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
{{--                    </subgroup1>--}}{{--#2.5.1.1   Route/URL Chck and set navigation header Mobile SIM section End--}}
{{--                @endif--}}
{{--            </group7>--}}
        </div>
    </div>
    <div class="sb-sidenav-footer text-chl">
        <div class="small">
            Welcome Mr./Ms. {{\Illuminate\Support\Facades\Auth::user()->name}}
        </div>
        <div class="small">Logged in
            as: {!! \Illuminate\Support\Facades\Auth::user()->roles->first()->display_name !!}</div>
        {{config('app.name')}}
    </div>
</nav>
