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
                        <h4 class="mb-0">د مشتریانو معلومات</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">د مشتریانو معلومات</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12 col-sm-12col-12">
                    <div class="card">
                        
                        {{-- ...... --}}
                        <div class="card-body " id="cutomerList">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>تعداد د جوړو</th>
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
@endsection
