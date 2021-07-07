<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro">
                    <p class="" style="text-align: center">{{ Auth::user()->getRole('name') }}</p>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <img src="{{ getSrc(Auth::user(), 'image') }}" alt="{{ Auth::user()->name }}" class="img-circle">
                        <span class="hide-menu"> {{ Auth::user()->name }} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('mainUser.profile') }}"><i class="ti-user"></i> {{ trans('main.My Profile') }}</a></li>
                        {{-- <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li> --}}
                        <li>
                            <a href="javascript:void(0)" onclick="event.preventDefault();
                                $('#logOutForm2').submit();"
                            ><i class="fa fa-power-off"></i> {{ trans('main.Logout') }}</a>
                            <form id="logOutForm2" method="POST" action="{{ (Auth::guard('admin')->check()) ? route('admin.logout') : route('logout') }}">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-small-cap">--- PERSONAL</li> --}}

                @if(Auth::user()->can(['SupperAdmin']))
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="icon-speedometer"></i><span class="hide-menu">الصلاحيات<span
                                    class="badge badge-pill badge-cyan ml-auto">{{ Spatie\Permission\Models\Permission::all()->count() }}</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('permissions.index') }}">كل الصلاحيات</a></li>
                            <li><a href="{{ route('permissions.create') }}">إنشاء صلاحية</a></li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="icon-speedometer"></i><span class="hide-menu">الرتب<span
                                    class="badge badge-pill badge-cyan ml-auto">{{ Spatie\Permission\Models\Role::all()->count() }}</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('roles.index') }}">كل الرتب</a></li>
                            <li><a href="{{ route('roles.create') }}">إنشاء رتبة</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->can(['manageusers']))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-speedometer"></i><span class="hide-menu">إدارة الأعضاء <span
                                class="badge badge-pill badge-cyan ml-auto">{{ App\Models\User::all()->count() }}</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('manageusers.index') }}">كل الأعضاء</a></li>
                        <li><a href="{{ route('manageusers.create') }}">إضافة عضو</a></li>
                    </ul>
                </li>
                @endif

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-speedometer"></i><span class="hide-menu">إدارة الأقسام</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('deps.index') }}">كل الأقسام</a></li>
                        <li><a href="{{ route('deps.create') }}">إضافة قسم</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
