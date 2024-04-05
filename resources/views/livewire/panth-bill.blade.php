@section('customStyle')
    <script>
        var showInfoID, modelStatus;

        function showBill(id, state) {
            modelStatus = state;
            showInfoID = id;
            $("#showBillD").modal("show");
        }
    </script>
@endsection
<div class="main-content">
    @if (session('success'))
        <div class="position-fixed top-0 start-0 p-3 " style="z-index:9999">
            <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-light">
                    <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                    <strong class="me-auto">Muzammel Mustafa Tailoring</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="position-fixed top-0 start-0 p-3 " style="z-index:9999">
            <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-danger text-light">
                    <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                    <strong class="me-auto">Muzammel Mustafa Tailoring</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif
    <livewire:panths.show-bill />
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">د پطلون بیلونه</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">د پطلون بیلونه</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12 col-sm-12col-12">
                    <div class="card">
                        <div class="PageActionBtn  d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2"
                                data-bs-toggle="modal" data-bs-target="#addnewBill">
                                نوی بیل جوړ کړی <i class="uil-book-medical"></i>
                            </button>
                            <div class="mx-3 ">
                                <div class="d-flex align-items-center ">
                                    <div class="d-flex align-items-ce justify-content-center text-muted">
                                        <div class="d-flex align-items-baseline justify-content-center mx-2 p-0 m-0">
                                            قرض:{{ $totalBalance }}</div>
                                        <div class="d-flex align-items-baseline justify-content-center mx-2 p-0 m-0">
                                            نقد:{{ $totalCash }}</div>
                                        <div class="d-flex align-items-baseline justify-content-center mx-2 p-0 m-0">
                                            ټولی+پیسی:{{ $totalBalance + $totalCash }}</div>
                                        <div class="d-flex align-items-baseline justify-content-center mx-2 p-0 m-0">
                                            ټول+فرمایشونه:{{ $totalRecord }}</div>
                                    </div>
                                    <div class="btn-group">
                                        <button wire:click='showFilter("all")'
                                            class="d-flex align-items-center btn btn-info btn-sm {{ $filter == 'all' ? 'active' : '' }}  "
                                            {{ $filter == 'all' ? 'disabled' : '' }}><span wire:loading
                                                class="spinner spinner-border spinner-border-sm font-size-10 "></span>ټول</button>
                                        <button wire:click='showFilter("Qarze")'
                                            class="d-flex align-items-center btn btn-info btn-sm {{ $filter == 'Qarze' ? 'active' : '' }}"
                                            {{ $filter == 'Qarze' ? 'disabled' : '' }}><span wire:loading
                                                class="spinner spinner-border spinner-border-sm font-size-10 "></span>قرضداران</button>
                                    </div>


                                    <input dir="ltr" wire:keyup.prevent='search($event.target.value)'
                                        type="text" placeholder="...و پلټی" name="" class="form-control ms-2"
                                        id="">
                                </div>

                            </div>
                        </div>
                        <!-- add new Bill Modal example -->
                        <div class="modal fade  {{ $modelClass }}" style="{{ $modelStyle }}" id="addnewBill"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <div class="position-absolute" style="left: 10px;top:0">Bill
                                                            :{{ $lastID }}
                                                        </div>
                                                        <div class="invoice-title">
                                                            <div style="left: 10px;top:0"
                                                                class="mt-4 position-absolute  d-flex align-items-baseline justify-content-end">
                                                                <h5 class="font-size-16 mb-1">رسید تاریخ </h5>
                                                                <span>{{ date('m/d/Y') }}</span>
                                                            </div>
                                                            <div class="mb-1">
                                                                <img src="assets/images/logo-dark.png" alt="logo"
                                                                    height="20" class="logo-dark" />
                                                                <img src="assets/images/logo-light.png" alt="logo"
                                                                    height="20" class="logo-light" />
                                                            </div>
                                                            <div class="text-muted">
                                                                <p class="mb-1">پته:{{ Auth::user()->address }}</p>
                                                                <p><i class="uil uil-phone me-1"></i>
                                                                    <span
                                                                        dir="ltr">{{ Auth::user()->phone }}</span>
                                                                    <i class="me-1"></i>
                                                                    مسول:{{ Auth::user()->name }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <form id="addnewbillForm" wire:submit='create'>
                                                            <div style="left:-20px;top:20px"
                                                                class="mt-4 position-absolute  d-flex align-items-baseline justify-content-end">
                                                                <h5 class="font-size-16 mb-1">انتها تاریخ </h5>
                                                                <input type="date"
                                                                    class="border-0 bg-transparent shadow-none"
                                                                    name="" wire:model='sewDate'
                                                                    id="date" required>
                                                            </div>
                                                            <div class="d-flex align-items-baseline col-sm-5 col-4 position-absolute "
                                                                style="left: 10px; top:70px">
                                                                <label class="form-label me-2" style=""
                                                                    for="validationCustom02">
                                                                    خیاط</label>
                                                                <select name="" required
                                                                    class="w-100 border border-1 bg-transparent"
                                                                    id="selectStaff" wire:model='staff_id' required>
                                                                    <option value="-1"></option>
                                                                    @foreach ($staffs as $staff)
                                                                        <option value="{{ $staff->id }}">
                                                                            {{ $staff->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('staff_id')
                                                                    <span
                                                                        class="text-danger feedBackError">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                    <div class="text-muted">

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
                                                                                            wire:model='customerName'
                                                                                            class="form-control border w-100"
                                                                                            id="validationCustom01"
                                                                                            placeholder="د مشتری نوم"
                                                                                            required>
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
                                                                                            min="0700000000"
                                                                                            wire:model='customerPhone'
                                                                                            max="0799999999"
                                                                                            class="form-control border w-100"
                                                                                            id="validationCustom01"
                                                                                            placeholder="د مشتری مبایل شمیره"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-3 col-3">
                                                                    <div class="d-flex align-items-baseline ">
                                                                        <label class="form-label" style="width: 50px"
                                                                            for="validationCustom01">قد</label>
                                                                        <input step="0.5" type="number"
                                                                            min="1" wire:model='height'
                                                                            max="150" class="form-control p-1"
                                                                            id="validationCustom01" placeholder="00"
                                                                            required>
                                                                    </div>
                                                                    <div class="d-flex align-items-baseline ">
                                                                        <label class="form-label" style="width: 50px"
                                                                            for="validationCustom01">سورین</label>
                                                                        <input step="0.5" type="number"
                                                                            min="1" wire:model='souren'
                                                                            max="150" class="form-control p-1"
                                                                            id="validationCustom01" placeholder="00"
                                                                            required>
                                                                    </div>

                                                                    <div class="d-flex align-items-baseline ">
                                                                        <label class="form-label" style="width: 50px"
                                                                            for="validationCustom01">کمر</label>
                                                                        <input step="0.5" type="number"
                                                                            min="1" wire:model='waist'
                                                                            max="150" class="form-control p-1"
                                                                            id="validationCustom01" placeholder="00"
                                                                            required>
                                                                    </div>
                                                                    <div class="d-flex align-items-baseline ">
                                                                        <label class="form-label" style="width: 50px"
                                                                            for="validationCustom01">پاچه</label>
                                                                        <input step="0.5" type="number"
                                                                            min="1" wire:model='leg'
                                                                            max="150" class="form-control p-1"
                                                                            id="validationCustom01" placeholder="00"
                                                                            required>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-9 col-sm-9 col-9 p-0 ">
                                                                    <textarea name="" wire:model='description' rows="5" class="form-control w-100 rounded-0"
                                                                        id="" placeholder="نوټ..."></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="row invoice-pricing pt-2"
                                                                style="border-top:1px solid rgb(236, 233, 233); ">
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtQty">تعداد</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0"
                                                                        id="txtQty" placeholder="00" required
                                                                        wire:model='qty'>
                                                                </div>
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtPrice">نرخ</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0"
                                                                        id="txtPrice" placeholder="00" required
                                                                        wire:model='price'>
                                                                </div>
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtRakht">رخت</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0"
                                                                        id="txtRakht" placeholder="00"
                                                                        wire:model='rakht'>
                                                                </div>
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtTotal">جمله</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0" disabled
                                                                        id="txtTotal" placeholder="00" required
                                                                        wire:model='total'>
                                                                </div>
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtAdvance">پیشکی</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0"
                                                                        id="txtAdvance" wire:model='paid'
                                                                        placeholder="00">
                                                                </div>
                                                                <div
                                                                    class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                                                    <label class="form-label" style="width: 50px"
                                                                        for="txtBalance">باقی</label>
                                                                    <input type="number" min="0"
                                                                        class="form-control p-1 border-0" disabled
                                                                        id="txtBalance" placeholder="00" required
                                                                        wire:model='balance'>
                                                                </div>
                                                            </div>
                                                        </form>
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
                            <table id="datatabl" class="table   table-striped table-hover "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="">

                                    <tr class="text-bold">
                                        <th>#</th>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>تاریخ</th>
                                        <th>یوی جوری قیمت</th>
                                        <th>رخت قیت</th>
                                        <th>ټول قیمت</th>
                                        <th>تحویل پیسی</th>
                                        <th>پاتی پیسی</th>
                                        <th>اختیارونه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Panths as $panth)
                                        <tr id="panth_{{ $panth->id }}" wire:key='panth_{{ $panth->id }}'>
                                            <td>{{ $panth->id }}</td>
                                            <td>{{ $panth->customer_name }}</td>
                                            <td>{{ $panth->customer_number }}</td>
                                            <td>{{ $panth->sewDate }}</td>
                                            <td>{{ $panth->price }}</td>
                                            <td>{{ $panth->rakht }}</td>
                                            <td>{{ $panth->price * $panth->qty + $panth->rakht }}</td>
                                            <td>{{ $panth->paid }}</td>
                                            <td class="{{ $panth->balance != '0' ? 'text-danger' : '' }}">
                                                {{ $panth->balance }}
                                            </td>
                                            <td class="text-center">
                                                <i class="uil-newspaper font-size-20 text-primary mx-1"
                                                    onclick="showBill({{ $panth->id }},'show')"
                                                    style="cursor: pointer"></i>
                                                <i class="uil-trash-alt font-size-20 text-danger mx-1 deleteBtn"
                                                    wire:click='delete({{ $panth->id }})'
                                                    wire:confirm='ایا غواړی چی دا فرمایش پاک کړی؟'
                                                    style="cursor: pointer"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $Panths->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="" wire:ignore>
        @section('customJS')
            <script>
                $(document).ready(function() {
                    $("#txtQty , #txtPrice , #txtRakht , #txtAdvance").keyup(function(e) {
                        // alert()
                        var textQTY = $("#txtQty").val();
                        var textPrice = $("#txtPrice").val();
                        var textRakht = $("#txtRakht").val();
                        var textAdvance = $("#txtAdvance").val();
                        var total = (parseInt(textQTY) * parseInt(textPrice)) + parseInt(textRakht);
                        var balance = parseInt(total) - parseInt(textAdvance);
                        $("#txtTotal").val(total);
                        $("#txtBalance").val(balance);
                    });
                    $("select").change(function(e) {
                        e.preventDefault();
                        $(".feedBackError").hide();
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    window.addEventListener("newRecordCreated", event => {
                        $('#addnewbillForm')[0].reset();
                        $("#addnewBill").modal("hide");
                        $(".modal-backdrop").addClass("d-none");
                    })
                });
            </script>
        @endsection
    </div>
</div>
