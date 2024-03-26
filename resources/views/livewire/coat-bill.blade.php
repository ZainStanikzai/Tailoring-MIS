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
                        <h4 class="mb-0">د کوټ بیلونه</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">د کوټ بیلونه</li>
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
                                نوی بیل جوړ کړی <i class="uil-book-medical"></i>
                            </button>
                        </div>
                        <!-- add new Bill Modal example -->
                        <div class="modal fade " id="addnewBill" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">د نوی بیل معلومات ولیکی</h5>
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
                                                                <h5 class="font-size-16 mb-1">رسید تاریخ </h5>
                                                                <span>{{ date('m/d/Y') }}</span>
                                                            </div>
                                                            <div style="left: 10px;top:0"
                                                                class="text-bold position-absolute bg-light">NO:
                                                                2011
                                                            </div>
                                                            <div style="left:-22px;top:20px"
                                                                class="mt-4 position-absolute  d-flex align-items-baseline justify-content-end">
                                                                <h5 class="font-size-16 mb-1">انتها تاریخ </h5>
                                                                <input type="date" value="{{ date('m/d/Y') }}"
                                                                    class="border-0 bg-transparent shadow-none"
                                                                    name="" id="">
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
                                                                <p><i class="uil uil-phone me-1"></i> <span dir="ltr">+93 77 701 3094</span>
                                                                    <i class="me-1"></i> مسول: خان استاد
                                                                </p>
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
                                                                                            placeholder="د مشتری نوم"
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
                                                                                            placeholder="د مشتری مبایل شمیره"
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
                                                        <div class="py-2">
                                                            <form action="">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-3">
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">قد</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">شانه</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">آستین</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">بغل</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">کمر</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">سورین</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">کراسب</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 50px"
                                                                                for="validationCustom01">کراس</label>
                                                                            <input type="number" min="1"
                                                                                max="150"
                                                                                class="form-control p-1"
                                                                                id="validationCustom01"
                                                                                placeholder="00" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-6 ">
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width:100px"
                                                                                for="validationCustom02">دامن</label>
                                                                            <select name=""
                                                                                class="w-100  border border-light "
                                                                                id="">
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 100px"
                                                                                for="validationCustom02">یخن</label>
                                                                            <select name=""
                                                                                class="w-100  border border-light "
                                                                                id="">
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width: 100px"
                                                                                for="validationCustom02">یخن_سب</label>
                                                                            <select name=""
                                                                                class="w-100  border border-light "
                                                                                id="">
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width:100px"
                                                                                for="validationCustom02">پشت</label>
                                                                            <select name=""
                                                                                class="w-100  border border-light "
                                                                                id="">
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="d-flex align-items-baseline ">
                                                                            <label class="form-label"
                                                                                style="width:100px"
                                                                                for="validationCustom02">شانه</label>
                                                                            <select name=""
                                                                                class="w-100  border border-light "
                                                                                id="">
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                                <option value="">عام</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3 col-3 p-0 ">
                                                                        <textarea name="" rows="12" class="form-control w-100 rounded-0" id="" placeholder="نوټ..."></textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="row invoice-pricing pt-1"
                                                            style="border-top:1px solid rgb(236, 233, 233); ">
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-md-3 col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">تعداد</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0"
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">نرخ</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0"
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">جمله</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0" disabled
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">رخت</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0"
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">پیشکی</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0"
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div
                                                                class="mr-1 d-flex align-items-baseline col-sm-3 col-3 float-right">
                                                                <label class="form-label" style="width: 50px"
                                                                    for="validationCustom01">باقی</label>
                                                                <input type="number" min="1" max="150"
                                                                    class="form-control p-1 border-0" disabled
                                                                    id="validationCustom01" placeholder="00" required>
                                                            </div>
                                                            <div class="d-flex align-items-baseline col-sm-6 col-6 ">
                                                                <label class="form-label" style="width: 100px"
                                                                    for="validationCustom02">خیاط</label>
                                                                <select name="" class="w-100 border-0 "
                                                                    id="">
                                                                    <option value="">عام</option>
                                                                    <option value="">عام</option>
                                                                    <option value="">عام</option>
                                                                </select>
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>تاریخ</th>
                                        <th>یوی جوری قیمت</th>
                                        <th>رخت قیت</th>
                                        <th>ټول قیمت</th>
                                        <th>تحویل پیسی</th>
                                        <th>پاتی پیسی</th>
                                        <th>قد اندازه</th>
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
    <!-- parsleyjs -->
    <script src=" {{ asset('assets/libs/parsleyjs/parsley.min.js') }} "></script>
    <script src=" {{ asset('assets/js/pages/form-validation.init.js') }} "></script>
@endsection
