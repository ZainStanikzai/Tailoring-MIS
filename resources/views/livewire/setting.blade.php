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
                                        <img src=" {{ asset('assets/images/users/avatar-4.jpg') }} " alt=""
                                            class="avatar-lg rounded-circle img-thumbnail">
                                    </label>
                                    <input type="file" id="setting_image" class="hidden">
                                </div>
                                <h5 class="mt-1 mb-1">زین</h5>
                            </div>

                            <hr class="my-4">

                            <div class="text-muted">
                                <div class="table-responsive mt-4">
                                    <div>
                                        <label for="setting.name">نوم</label>
                                        <input type="text" class="form-control text-start"
                                            placeholder="خپل نوم ولیکی..." value="زین الله">
                                    </div>
                                    <div class="mt-4">
                                        <label for="setting.name">مبایل شمیره</label>
                                        <input type="number" class="form-control text-start"
                                            placeholder="...خپل مبایل شمیره ولیکی" value="02932399">
                                    </div>
                                    <div class="mt-4">
                                        <label for="setting.name">ادرس</label>
                                        <input type="text" class="form-control text-start"
                                            placeholder="خپل ادرس ولیکی..." value="">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 h-100">
                    <div class="card mb-0 h-100 ">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#backup" role="tab">
                                    <i class="uil uil-clipboard-notes font-size-20"></i>
                                    <span class="d-none d-sm-block">بک اپ</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#password" role="tab">
                                    <i class="uil uil-lock-alt font-size-20"></i>
                                    <span class="d-none d-sm-block">پټ نوم</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content p-4 h-100">
                            {{-- <div class="tab-pane h-100" id="backup" role="tabpanel">
                                <div class="h-100 align-items-stretch">
                                    <div class="d-flex align-items-center flex-column justify-content-center h-100">
                                        <div class="btn btn-primary">
                                            BACKUP THE DATABASE <i class="uil-file-copy-alt"></i>
                                        </div>
                                        <div class="btn btn-primary">
                                            RESTORE DATABASE <i class="uil-history-alt"></i>
                                        </div>
                                        
                                    </div>
                                    <div class=""></div>
                                </div>
                            </div> --}}
                            <div class="tab-pane active" id="password" role="tabpanel">
                                <div class="row  d-flex justify-content-center">
                                    <form class="col-md-6">
                                        <div class="mt-4">
                                            <label for="setting.name">زوړ پټ نوم</label>
                                            <input type="password" autocomplete="false" required
                                                class="form-control text-start" placeholder="خپل زوړ پټ نوم ولیکی..."
                                                value="">
                                        </div>
                                        <div class="mt-4">
                                            <label for="setting.name">نوی پټ نوم</label>
                                            <input type="password" class="form-control text-start"
                                                placeholder="خپل نوی پټ نوم ولیکی..." required value="">
                                        </div>
                                        <div class="mt-4">
                                            <label for="setting.name">بیاځلی</label>
                                            <input type="password" class="form-control text-start"
                                                placeholder="خپل نوی پټ نوم بیاځلی ولیکی..." required value="">
                                        </div>
                                        <div class="mt-4">
                                            <input type="submit" class="btn btn-primary" value="ذخیره یی کړی">
                                        </div>

                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
