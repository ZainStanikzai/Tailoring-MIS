<div class="card mb-0 h-100 ">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#password" role="tab">
                <i class="uil uil-lock-alt font-size-20"></i>
                <span class="d-none d-sm-block">پټ نوم</span>
            </a>
        </li>
    </ul>
    <!-- Tab content -->
    <div class="tab-content p-4 h-100">

        <div class="tab-pane active" id="password" role="tabpanel">
            @if (session('error'))
                <div class="text-danger text-center">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="position-fixed top-0 start-0 p-3 " style="z-index:9999">
                    <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-success">
                            <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
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
            <div class="row  d-flex justify-content-center">
                <form class="col-md-6" wire:submit='update({{ Auth::user()->id }})'>
                    <div class="mt-4">
                        <label for="setting.name">زوړ پټ نوم</label>
                        <input wire:model='oldPassword' type="password" autocomplete="false"
                            class="form-control text-start" placeholder="خپل زوړ پټ نوم ولیکی..." value="">
                        @error('oldPassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="setting.name">نوی پټ نوم</label>
                        <input wire:model='password' type="password" class="form-control text-start"
                            placeholder="خپل نوی پټ نوم ولیکی..." value="">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="setting.name">بیاځلی</label>
                        <input wire:model='confirm_password' type="password" class="form-control text-start"
                            placeholder="خپل نوی پټ نوم بیاځلی ولیکی..." value="">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <div class="">
                                ذخیره یی کړی
                                <span wire:loading class="spinner spinner-border spinner-border-sm"></span>
                            </div>
                        </button>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
