<section>
    <i class="material-icons showHideNav navShow hide">chevron_right</i>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="animated sidebar">
        <i class="material-icons showHideNav navHide">chevron_left</i>
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('adminbsb/images/user.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        {{--<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="separator" class="divider"></li>--}}
                        <li><a href="{{ url('logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <a href="#" class="hide btn menuIcon">
            <i class="material-icons hideLeftMenu">keyboard_arrow_left</i>
            <i class="hide material-icons showLeftMenu">keyboard_arrow_right</i>
        </a>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                <li @if ($controller == "dashboard") class="active" @endif>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>{{ trans('adminbsb.dashboard') }}</span>
                    </a>
                </li>
                <li @if ($controller == "user") class="active" @endif>
                    <a href="{{ url('admin/user') }}">
                        <i class="material-icons">person</i>
                        <span>{{ trans('adminbsb.user') }}</span>
                    </a>
                </li>
                <li @if ($controller == "supplier") class="active" @endif>
                    <a href="{{ url('admin/supplier') }}">
                        <i class="material-icons">person_pin</i>
                        <span>{{ trans('adminbsb.supplier') }}</span>
                    </a>
                </li>
                <li @if ($controller == "category") class="active" @endif>
                    <a href="{{ url('admin/category') }}">
                        <i class="material-icons">view_module</i>
                        <span>{{ trans('adminbsb.category') }}</span>
                    </a>
                </li>
                <li @if ($controller == "product") class="active" @endif>
                    <a href="{{ url('admin/product') }}">
                        <i class="material-icons">list</i>
                        <span>{{ trans('adminbsb.product') }}</span>
                    </a>
                </li>
                <li @if ($controller == "order") class="active" @endif>
                    <a href="{{ url('admin/order') }}">
                        <i class="material-icons">shopping_basket</i>
                        <span>{{ trans('adminbsb.order') }}</span>
                    </a>
                </li>
                <li @if ($controller == "contact") class="active" @endif>
                    <a href="{{ url('admin/contact') }}">
                        <i class="material-icons">contacts</i>
                        <span>{{ trans('adminbsb.contact') }}</span>
                    </a>
                </li>
                <li @if ($controller == "subscribe") class="active" @endif>
                    <a href="{{ url('admin/subscribe') }}">
                        <i class="material-icons">mail</i>
                        <span>{{ trans('adminbsb.subscribe') }}</span>
                    </a>
                </li>
                <li @if ($controller == "setting") class="active" @endif>
                    <a href="{{ url('admin/setting') }}">
                        <i class="material-icons">settings</i>
                        <span>{{ trans('adminbsb.setting') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 - 2019 <a href="javascript:void(0);">Design by FeelsyncSystem Co.</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>