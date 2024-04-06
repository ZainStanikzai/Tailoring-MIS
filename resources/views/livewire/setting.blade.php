<div class="main-content">



    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">ترتیبات</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">ترتیبات</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card ">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="clearfix"></div>
                                <div>
                                    <label for="setting_image">
                                        <img src=" {{ asset('assets/images/logo-sm.png') }} " alt=""
                                            class="avatar-lg rounded-circle img-thumbnail">
                                    </label>
                                </div>
                            </div>

                            @if (session('error'))
                                <div class="text-danger text-center" dir="ltr">{{ session('error') }} </div>
                            @endif
                            @if (session('success'))
                                <div class="position-fixed top-0 start-0 p-3 " style="z-index:9999">
                                    <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive"
                                        aria-atomic="true">
                                        <div class="toast-header bg-success text-light">
                                            <img src="assets/images/logo-sm.png" alt="" class="me-2"
                                                height="18">
                                            <strong class="me-auto">Muzammel Mustafa Tailoring</strong>
                                            <small class="text-muted">just now</small>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="text-muted">
                                <div class="table-responsive mt-1">
                                    <div>
                                        <label for="setting.name">نوم</label>
                                        <input wire:model='name' type="text" class="form-control text-start"
                                            placeholder="خپل نوم ولیکی..." value="">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label for="setting.name">مبایل شمیره</label>
                                        <input wire:model='phone' type="text" dir="ltr"
                                            class="form-control text-start" placeholder="...خپل مبایل شمیره ولیکی"
                                            value="">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label for="setting.name">ادرس</label>
                                        <input wire:model='address' type="text" class="form-control text-start"
                                            placeholder="خپل ادرس ولیکی..." value="">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label for="setting.name">یوزرنم</label>
                                        <input wire:model='username' type="text" class="form-control text-start"
                                            placeholder="خپل یوزرنم ولیکی..." value="">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-primary"
                                            wire:click='update({{ Auth::user()->id }})'>
                                            <div class="">
                                                ذخیره یی کړی
                                                <span wire:loading
                                                    class="spinner spinner-border spinner-border-sm"></span>
                                            </div>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 h-100">
                    <livewire:change-password />
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
