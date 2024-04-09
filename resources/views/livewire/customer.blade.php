@section('customStyle')
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
    <div class="page-content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">د مشتریانو معلومات</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
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
                        <div class="card-body">




                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button wire:click='changeTab(infoDetails)' class="nav-link {{$activeTabe == "infoDetails" ? "active" : ""}}" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        د مشتریانو معلومات
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button  wire:click='changeTab(infoList)' class="nav-link {{$activeTabe == "infoList" ? "active" : ""}}" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        د مشتریانو لیست
                                    </button>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane {{$activeTabe == "infoDetails" ? "active" : ""}}" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    {{-- add and edit  customer --}}
                                    <div class="mb-2">
                                        <form action="" class=""
                                            wire:submit='{{ $customer == null ? 'create' : 'update' }}'>
                                            <div class="row">
                                                <div class="form-group mx-1 col-md-1">
                                                    <label for="customer-id"
                                                        class="form-label d-flex justify-content-between align-items-end">کوډ
                                                        نمبر <span
                                                            class="text-muted font-size-10">{{ $newID }}</span></label>
                                                    <input wire:model.blur='id' min="1" required
                                                        wire:loading.class='opacity-25' type="number"
                                                        placeholder="کوډ نمبر" class="form-control ">
                                                </div>
                                                @php
                                                    if ($customer != null) {
                                                        $this->name = $customer->name;
                                                        $this->phone = $customer->numbers;
                                                    } else {
                                                        $this->name = '';
                                                        $this->phone = '';
                                                    }
                                                @endphp
                                                <div class="form-group mx-1 col-md-2">
                                                    <label for="customer-name" class="form-label">نوم</label>
                                                    <input wire:model='name' dir="ltr" required type="text"
                                                        placeholder="...د مشتری نوم" class="form-control">
                                                </div>
                                                <div class="form-group mx-1 col-md-2">
                                                    <label for="customer-number" class="form-label">تلفون
                                                        شمیره</label>
                                                    <input wire:model='phone' type="number" required
                                                        placeholder="...د مشتری مبایل نمبر" class="form-control">
                                                </div>
                                                <div class="form-group mx-1 col-md-2 d-flex align-items-end">
                                                    <button {{ $customer == null ? '' : 'disabled' }} type="submit"
                                                        class="btn btn-primary mx-1">
                                                        نوی مشتری
                                                    </button>
                                                    <button {{ $customer == null ? 'disabled' : '' }} type="submit"
                                                        class="btn btn-primary mx-1">
                                                        تغییرات
                                                    </button>
                                                </div>
                                                <div class="form-group mx-1 col-md-3 ms-auto d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm mx-1 ">
                                                        <i class="uil-search font-size-20"></i>
                                                    </button>
                                                    <input type="number" wire:model.blur='searchTerm'
                                                        placeholder=" ...کوډ نمبر یا مبایل" class="form-control">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    {{-- end  --}}
                                    <!-- Nav tabs for customer cloths-->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="comCloth-tab" data-bs-toggle="tab"
                                                data-bs-target="#comCloth" type="button" role="tab"
                                                aria-controls="comCloth" aria-selected="true">
                                                جامی<span class="text-muted mx-2 font-size-10">
                                                    {{-- {{ $comallCloths }} --}}
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comVaskate-tab" data-bs-toggle="tab"
                                                data-bs-target="#comVaskate" type="button" role="tab"
                                                aria-controls="comVaskate" aria-selected="false">
                                                واسکټ<span class="text-muted mx-2 font-size-10">
                                                    {{-- {{ $comallVaskets }} --}}
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comCoat-tab" data-bs-toggle="tab"
                                                data-bs-target="#comCoat" type="button" role="tab"
                                                aria-controls="comCoat" aria-selected="false">
                                                کوټ<span class="text-muted mx-2 font-size-10">
                                                    {{-- {{ $comallCoats }} --}}
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comPanth-tab" data-bs-toggle="tab"
                                                data-bs-target="#comPanth" type="button" role="tab"
                                                aria-controls="comPanth" aria-selected="false">
                                                پطلون<span class="text-muted mx-2 font-size-10">
                                                    {{-- {{ $comallPanths }} --}}
                                                </span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comTshirt-tab" data-bs-toggle="tab"
                                                data-bs-target="#comTshirt" type="button" role="tab"
                                                aria-controls="comTshirt" aria-selected="false">
                                                یخن قاق<span class="text-muted mx-2 font-size-10">
                                                    {{-- {{ $comallTshirts }} --}}
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="comCloth" role="tabpanel"
                                            aria-labelledby="comCloth-tab">
                                            <div class="d-flex mx-2">
                                                <table id="datatabl" class="table   table-striped table-hover "
                                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="">
                                                        <tr class="text-bold">
                                                            <th>#</th>
                                                            <th>نوم</th>
                                                            <th>نمبر</th>
                                                            <th>تاریخ</th>
                                                            <th>حالت</th>
                                                            <th>ټول قیمت</th>
                                                            <th>تحویل پیسی</th>
                                                            <th>پاتی پیسی</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Cloths as $cloth)
                                                            <tr id="cloth_{{ $cloth->id }}"
                                                                wire:key='cloth_{{ $cloth->id }}'>
                                                                <td>{{ $cloth->customer_id }}</td>
                                                                <td>{{ $cloth->customer_name }}</td>
                                                                <td> <a wire:navigate.hover
                                                                        href="cloths?q={{ $cloth->customer_id }}">{{ $cloth->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $cloth->created_at->format('Y-m-d') }}</td>
                                                                <td
                                                                    class="font-weight-bold {{ $cloth->sewStatus == 0 ? 'text-danger' : 'text-primary' }}">
                                                                    {{ $cloth->sewStatus == 0 ? 'ندی ګنډل شوی' : 'ګنډل شوی' }}
                                                                </td>
                                                                <td>{{ $cloth->price * $cloth->qty + $cloth->rakht }}
                                                                </td>
                                                                <td>{{ $cloth->paid }}</td>
                                                                <td
                                                                    class="{{ $cloth->balance != '0' ? 'text-danger' : '' }}">
                                                                    {{ $cloth->balance }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="comVaskate" role="tabpanel"
                                            aria-labelledby="comVaskate-tab">
                                            <div class="d-flex mx-2">
                                                <table id="datatabl" class="table   table-striped table-hover "
                                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="">
                                                        <tr class="text-bold">
                                                            <th>#</th>
                                                            <th>نوم</th>
                                                            <th>نمبر</th>
                                                            <th>تاریخ</th>
                                                            <th>حالت</th>
                                                            <th>ټول قیمت</th>
                                                            <th>تحویل پیسی</th>
                                                            <th>پاتی پیسی</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Vaskets as $vasket)
                                                            <tr id="vasket_{{ $vasket->id }}"
                                                                wire:key='vasket_{{ $vasket->id }}'>
                                                                <td>{{ $vasket->customer_id }}</td>
                                                                <td>{{ $vasket->customer_name }}</td>
                                                                <td> <a wire:navigate.hover
                                                                        href="vaskate?q={{ $vasket->customer_id }}">{{ $vasket->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $vasket->created_at->format('Y-m-d') }}</td>
                                                                <td
                                                                    class="font-weight-bold {{ $vasket->sewStatus == 0 ? 'text-danger' : 'text-primary' }}">
                                                                    {{ $vasket->sewStatus == 0 ? 'ندی ګنډل شوی' : 'ګنډل شوی' }}
                                                                </td>
                                                                <td>{{ $vasket->price * $vasket->qty + $vasket->rakht }}
                                                                </td>
                                                                <td>{{ $vasket->paid }}</td>
                                                                <td
                                                                    class="{{ $vasket->balance != '0' ? 'text-danger' : '' }}">
                                                                    {{ $vasket->balance }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comCoat" role="tabpanel"
                                            aria-labelledby="comCoat-tab">
                                            <div class="d-flex mx-2">
                                                <table id="datatabl" class="table   table-striped table-hover "
                                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="">
                                                        <tr class="text-bold">
                                                            <th>#</th>
                                                            <th>نوم</th>
                                                            <th>نمبر</th>
                                                            <th>تاریخ</th>
                                                            <th>حالت</th>
                                                            <th>ټول قیمت</th>
                                                            <th>تحویل پیسی</th>
                                                            <th>پاتی پیسی</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Coats as $coat)
                                                            <tr id="coat_{{ $coat->id }}"
                                                                wire:key='coat_{{ $coat->id }}'>
                                                                <td>{{ $coat->customer_id }}</td>
                                                                <td>{{ $coat->customer_name }}</td>
                                                                <td> <a wire:navigate.hover
                                                                        href="coat?q={{ $coat->customer_id }}">{{ $coat->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $coat->created_at->format('Y-m-d') }}</td>
                                                                <td
                                                                    class="font-weight-bold {{ $coat->sewStatus == 0 ? 'text-danger' : 'text-primary' }}">
                                                                    {{ $coat->sewStatus == 0 ? 'ندی ګنډل شوی' : 'ګنډل شوی' }}
                                                                </td>
                                                                <td>{{ $coat->price * $coat->qty + $coat->rakht }}
                                                                </td>
                                                                <td>{{ $coat->paid }}</td>
                                                                <td
                                                                    class="{{ $coat->balance != '0' ? 'text-danger' : '' }}">
                                                                    {{ $coat->balance }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comPanth" role="tabpanel"
                                            aria-labelledby="comPanth-tab">
                                            <div class="d-flex mx-2">
                                                <table id="datatabl" class="table   table-striped table-hover "
                                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="">
                                                        <tr class="text-bold">
                                                            <th>#</th>
                                                            <th>نوم</th>
                                                            <th>نمبر</th>
                                                            <th>تاریخ</th>
                                                            <th>حالت</th>
                                                            <th>ټول قیمت</th>
                                                            <th>تحویل پیسی</th>
                                                            <th>پاتی پیسی</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Panths as $panth)
                                                            <tr id="panth_{{ $panth->id }}"
                                                                wire:key='panth_{{ $panth->id }}'>
                                                                <td>{{ $panth->customer_id }}</td>
                                                                <td>{{ $panth->customer_name }}</td>
                                                                <td> <a wire:navigate.hover
                                                                        href="panth?q={{ $panth->customer_id }}">{{ $panth->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $panth->created_at->format('Y-m-d') }}</td>
                                                                <td
                                                                    class="font-weight-bold {{ $panth->sewStatus == 0 ? 'text-danger' : 'text-primary' }}">
                                                                    {{ $panth->sewStatus == 0 ? 'ندی ګنډل شوی' : 'ګنډل شوی' }}
                                                                </td>
                                                                <td>{{ $panth->price * $panth->qty + $panth->rakht }}
                                                                </td>
                                                                <td>{{ $panth->paid }}</td>
                                                                <td
                                                                    class="{{ $panth->balance != '0' ? 'text-danger' : '' }}">
                                                                    {{ $panth->balance }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comTshirt" role="tabpanel"
                                            aria-labelledby="comTshirt-tab">
                                            <div class="d-flex mx-2">
                                                <table id="datatabl" class="table   table-striped table-hover "
                                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="">
                                                        <tr class="text-bold">
                                                            <th>#</th>
                                                            <th>نوم</th>
                                                            <th>نمبر</th>
                                                            <th>تاریخ</th>
                                                            <th>حالت</th>
                                                            <th>ټول قیمت</th>
                                                            <th>تحویل پیسی</th>
                                                            <th>پاتی پیسی</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Tshirts as $tshirt)
                                                            <tr id="tshirt_{{ $tshirt->id }}"
                                                                wire:key='tshirt_{{ $tshirt->id }}'>
                                                                <td>{{ $tshirt->customer_id }}</td>
                                                                <td>{{ $tshirt->customer_name }}</td>
                                                                <td> <a wire:navigate.hover
                                                                        href="tshirt?q={{ $tshirt->customer_id }}">{{ $tshirt->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $tshirt->created_at->format('Y-m-d') }}</td>
                                                                <td
                                                                    class="font-weight-bold {{ $tshirt->sewStatus == 0 ? 'text-danger' : 'text-primary' }}">
                                                                    {{ $tshirt->sewStatus == 0 ? 'ندی ګنډل شوی' : 'ګنډل شوی' }}
                                                                </td>
                                                                <td>{{ $tshirt->price * $tshirt->qty + $tshirt->rakht }}
                                                                </td>
                                                                <td>{{ $tshirt->paid }}</td>
                                                                <td
                                                                    class="{{ $tshirt->balance != '0' ? 'text-danger' : '' }}">
                                                                    {{ $tshirt->balance }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end nav customer cloths --}}


                                </div>
                                <div class="tab-pane {{$activeTabe == "infoList" ? "active" : ""}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatabl" class="table   table-striped table-hover "
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="">
                                                <tr class="text-bold">
                                                    <th>#</th>
                                                    <th>نوم</th>
                                                    <th>نمبر</th>
                                                    <th>تاریخ</th>
                                                    <th>پاتی پیسی</th>
                                                    <th>اختیارونه</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Customers as $custommer)
                                                    <tr id="custommer_{{ $custommer->id }}"
                                                        wire:key='custommer_{{ $custommer->id }}'>
                                                        <td>{{ $custommer->id }}</td>
                                                        <td>{{ $custommer->name }}</td>
                                                        <td>{{$custommer->numbers}}</td>
                                                        <td>{{ $custommer->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            @php
                                                                $totalBalance = 0;
                                                                foreach ($custommer->Cloth as $value) {
                                                                   $totalBalance += $value->balance;
                                                                }
                                                                foreach ($custommer->Vaskate as $value) {
                                                                   $totalBalance += $value->balance;
                                                                }
                                                                foreach ($custommer->Coat as $value) {
                                                                   $totalBalance += $value->balance;
                                                                }
                                                                foreach ($custommer->Panth as $value) {
                                                                   $totalBalance += $value->balance;
                                                                }
                                                                foreach ($custommer->Tshirt as $value) {
                                                                   $totalBalance += $value->balance;
                                                                }
                                                                if($totalBalance != 0){
                                                                    echo "<span class='text-danger'>$totalBalance</span>";
                                                                }else{
                                                                    echo "<span class=''>$totalBalance</span>";   
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>
                                                           <i wire:click='delete({{$custommer->id}})' wire:confirm='are you sure?' class="uil-user-minus font-size-20 text-danger"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="">
                                            {{$Customers->links()}}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@section('customJS')
@endsection
