<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
             <!-- start page title -->
             <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">د {{$ActiveStaff->name}} معلومات</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">د کارکونکو معلومات</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12col-12">
                    <div class="card">
                        <div class="card-body " id="cutomerList">
                            <table id="datatable" class="table staffDatatable table-hover dt-responsive nowrap "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead wire:ignore>
                                    <tr>
                                        <th>#</th>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>د کار نیټه</th>
                                        <th>تعداد د جوړو</th>
                                        {{-- <th>ټول قیمت</th> --}}
                                        <th>اخستل سوی پیسی</th>
                                        {{-- <th>پاتی پیسی</th> --}}
                                        <th>اختیارونه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            
        </div> <!-- container-fluid -->
    </div>
</div>