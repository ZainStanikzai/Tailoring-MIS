{{-- <div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center p-3">

            <h5 class="m-0 me-2">ترتیبات</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>
        <!-- Settings -->
        <hr class="m-0" />
        <div class="p-4">
            <h6 class="mt-4 mb-3 pt-2">د ترتیب حالت</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">رڼا</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                <label class="form-check-label" for="layout-mode-dark">تیاره</label>
            </div>
            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">د مینو اندازه</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">پوره مینو</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'small')">
                <label class="form-check-label" for="sidebar-size-compact">تړون</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">وړوکی مینو</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">د مینو رنګ</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">رڼا</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">تیاره</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-colored" value="colored" onchange="document.body.setAttribute('data-sidebar', 'colored')">
                <label class="form-check-label" for="sidebar-color-colored">رنګه</label>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div> --}}
<div class="right-bar">
    <div class="h-100">
        <div class="d-flex align-items-center p-3">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);"  class="rightBarClose ms-auto">
                <i class="mdi mdi-close noti-icon" ></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">
            {{-- <div class="d-flex align-items-center justify-content-between">
                <label for="iconInput" class="text-primary text-decoration-underline" style="cursor: pointer">Change Icon</label>
                <input type="file" class="d-none" id="iconInput">
                <img class="rounded-circle border border-1" style="height: 30px; width: 30px" src="{{ asset('assets/images/favicon.ico') }}" alt="">
            </div> --}}

            <h6 class="mt-4 mb-3 pt-2">Layout Mode </h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" onchange="document.body.setAttribute('data-bs-theme', 'light');document.body.setAttribute('data-topbar', 'light');document.body.setAttribute('data-sidebar', 'light')" wire:click='layoutModeLight(1)' name="layout-mode"
                    id="themModeLight" value="light" {{$layoutMode == 'light'? 'checked' : '' }} >
                <label class="form-check-label"  for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onchange="document.body.setAttribute('data-bs-theme', 'dark');document.body.setAttribute('data-topbar', 'dark');document.body.setAttribute('data-sidebar', 'dark')" wire:click='layoutModeDark(1)' type="radio" name="layout-mode"
                    id="themModeDark" value="dark" {{$layoutMode == 'dark'? 'checked' : '' }}>
                <label class="form-check-label"  for="layout-mode-dark">Dark</label>
            </div>
            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color"
                    id="" value="light" {{$topbarColor == 'light'? 'checked' : '' }} onchange="document.body.setAttribute('data-topbar', 'light')" wire:click='topBarColorLight(1)'>
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color"
                    id="" value="dark"  {{$topbarColor == 'dark'? 'checked' : '' }} onchange="document.body.setAttribute('data-topbar', 'dark')" wire:click='topBarColorDark(1)'>
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                    id="" value="default" {{$sidebarSize == 'lg'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar-size', 'lg')" wire:click='sidebarSizeDefault(1)'>
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                    id="" value="compact" {{$sidebarSize == 'small'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar-size', 'small')" wire:click='sidebarSizeCompact(1)'>
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size"
                    id="" value="small" {{$sidebarSize == 'sm'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar-size', 'sm')" wire:click='sidebarSizeSmall(1)'>
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                    id="" value="light" {{$sidebarColor == 'light'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar', 'light')"  wire:click='sidebarColorLight(1)'>
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                    id="" value="dark" {{$sidebarColor == 'dark'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar', 'dark')" wire:click='sidebarColorDark(1)'>
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color"
                    id="" value="colored" {{$sidebarColor == 'colored'? 'checked' : '' }} onchange="document.body.setAttribute('data-sidebar', 'colored')" wire:click='sidebarColorColored(1)'>
                <label class="form-check-label" for="sidebar-color-colored">Colored</label>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
{{-- <div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center p-3">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">
            <h6 class="mb-3 d-none">Layout</h6>
            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"  name="layout-mode" id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark" wire:click='layoutModeDark(1)'>
                <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 d-none">Layout Width</h6>

            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fuild">Fluid</label>
            </div>
            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>
            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'small')">
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-colored" value="colored" onchange="document.body.setAttribute('data-sidebar', 'colored')">
                <label class="form-check-label" for="sidebar-color-colored">Colored</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 d-none">Direction</h6>

            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr" value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline d-none">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl" value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div> --}}
@section('customJS')
{{-- $(selected).removeClass('" class/classes that you want to remove "'); --}}

<script>
    
</script>
@endsection