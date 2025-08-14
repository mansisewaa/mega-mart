<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{url('admin/home')}}" class="logo" style="color: white;font-weight:900;margin-left:3rem;"> VALSTAND
                <!-- <img
                src="{{asset('admin/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              /> -->
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a
                        data-bs-toggle="collapse"
                        href="{{url('admin/home')}}"
                        class="collapsed"
                        aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <!-- <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href=".admin/demo1/index.html">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section"></h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Menu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('menu.index')}}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Announcements</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('notification.index')}}">
                                    <span class="sub-item">Notification</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tender.index')}}">
                                    <span class="sub-item">Tender</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Tender</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('tender.index')}}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-image"></i>
                        <p> Gallery</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('gallery.index')}}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#banners">
                        <i class="fas fa-image"></i>
                        <p>Banner</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="banners">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('banner.index')}}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#brochures">
                        <i class="fas fa-image"></i>
                        <p>Brochure</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="brochures">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('brochure.index')}}">
                                    <span class="sub-item">Manage</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu Content</h4>
                </li>

                @php
                $menu = App\Models\Menu::where('status',1)->get();
                @endphp



                @foreach($menu as $key => $value)
                    @php
                        $submenus = App\Models\SubMenu::where('menu_id',$value->id)->where('status',1)->get();
                    @endphp

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#{{$value->slug}}">
                                <i class="fas fa-image"></i>

                                <p style="text-transform:capitalize;">{{$value->name}}</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="{{$value->slug}}">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('add-content',$value->slug)}}">
                                            <span class="sub-item">Manage</span>
                                        </a>
                                    </li>
                                    @if($value->sublink == 1)
                                        @foreach($submenus as $submenu)
                                            <li>
                                                <a href="{{route('add-submenu-content',$submenu->slug)}}">
                                                    <span class="sub-item">{{$submenu->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    @endif
                                </ul>
                            </div>
                        </li>

                @endforeach







            </ul>
        </div>
    </div>
</div>
