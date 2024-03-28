<div class="vertical-menu" >

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" wire:navigate class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="/" wire:navigate  class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" onclick="document.body.setAttribute('data-sidebar-size','sm')" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">مینو</li>

                <li>
                    <a href="/" wire:navigate class="waves-effect">
                        <i class="uil-home-alt"></i>
                        <span>داشبورد</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect has-arrow" aria-expanded="false">
                        <i class="uil-receipt-alt"></i>
                        <span>بیلونه</span>
                    </a>
                    <ul class="sub-menu mm-collapse " aria-expanded="false">

                        <li><a href="{{ route('bill.cloths') }}" wire:navigate.hover>د جامو بیل </a></li>
                        <li><a href="{{ route('bill.vaskate') }}" wire:navigate.hover>د واسکټ بیل</a></li>
                        <li><a href="{{ route('bill.coat') }}" wire:navigate.hover>د کوټ بیل </a></li>
                        <li><a href="{{ route('bill.panth') }}" wire:navigate.hover>د پطلون بیل</a></li>
                        <li><a href="{{ route('bill.tshirt') }}" wire:navigate.hover>د یخن قاق بیل</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="{{ route('page.customer') }}" wire:navigate.hover  class="waves-effect">
                        <i class="uil-users-alt"></i>
                        <span>مشتریان</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('page.staff') }}" wire:navigate.hover class="waves-effect">
                        <i class="uil-user-arrows"></i>
                        <span>کارکونکی</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('page.style') }}" wire:navigate.hover class="waves-effect">
                        <i class="uil-horizontal-distribution-center"></i>
                        <span>ستایلونه</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('page.setting') }}" wire:navigate.hover class="waves-effect">
                        <i class="uil-setting"></i>
                        <span>ترتیبات</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>