@section('customStyle')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
<div class="main-content">


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">د کارکونکو معلومات</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">د کارکونکو معلومات</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12 col-sm-12col-12">
                    <div class="card">
                        <div class="clothPageActionBtn">
                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2"
                                data-bs-toggle="modal" data-bs-target="#addnewBill">
                                نوی کارکونکی جوړ کړی <i class="uil-book-medical"></i>
                            </button>
                        </div>
                        <div class="modal fade " id="addnewBill" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">د نوی کارکونکی معلومات ولیکی</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row m-0 p-0" id="invoiceModal">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="invoice-title">
                                                            <div style="left: 10px;top:0"
                                                                class="mt-4 position-absolute  d-flex align-items-baseline justify-content-end">
                                                                <h5 class="font-size-16 mb-1"> تاریخ </h5>
                                                                <span>{{ date('m/d/Y') }}</span>
                                                            </div>
                                                            
                                                            <div class="mb-1">
                                                                <img src="assets/images/logo-dark.png" alt="logo"
                                                                    height="20" class="logo-dark" />
                                                                <img src="assets/images/logo-light.png" alt="logo"
                                                                    height="20" class="logo-light" />
                                                            </div>
                                                            <div class="text-muted">
                                                                <p class="mb-1">پته: کارت نو د پشتون مارکیت مخاخ,کابل
                                                                    افغانستان.</p>
                                                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-12">
                                                                <div class="text-muted">
                                                                    <form action="">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                                <div class="mb-1">
                                                                                    <div
                                                                                        class="d-flex align-items-baseline ">
                                                                                        <label class="form-label"
                                                                                            style="width: 40px"
                                                                                            for="validationCustom01">نوم</label>
                                                                                        <input type="text"
                                                                                            min="1"
                                                                                            max="150"
                                                                                            class="form-control border w-100"
                                                                                            id="validationCustom01"
                                                                                            placeholder="د کارکونکی نوم"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="valid-feedback">
                                                                                        Looks good!
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                                <div class="mb-1">
                                                                                    <div
                                                                                        class="d-flex align-items-baseline ">
                                                                                        <label class="form-label"
                                                                                            style="width: 40px"
                                                                                            for="validationCustom01">مبایل</label>
                                                                                        <input type="number"
                                                                                            min="1"
                                                                                            max="150"
                                                                                            class="form-control border w-100"
                                                                                            id="validationCustom01"
                                                                                            placeholder="د کارکونکی مبایل شمیره"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="valid-feedback">
                                                                                        Looks good!
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <input type="submit" class="btn btn-primary" form="addnewbillForm"
                                            value="ذخیره یی کړی" />
                                        <a href="javascript:window.print()"
                                            class="btn btn-success waves-effect waves-light me-1"><i
                                                class="fa fa-print"></i></a>
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ...... --}}
                        <div class="card-body " id="cutomerList">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>د کار نیټه</th>
                                        <th>تعداد د جوړو</th>
                                        <th>ټول قیمت</th>
                                        <th>اخستل سوی پیسی</th>
                                        <th>پاتی پیسی</th>
                                        <th>اختیارونه</th>
                                    </tr>
                                </thead>


                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@section('customJS')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src=" {{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }} "></script>
    <script src=" {{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }} "></script>
    
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
