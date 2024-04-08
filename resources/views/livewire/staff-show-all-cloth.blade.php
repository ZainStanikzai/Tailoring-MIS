<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">د {{ $ActiveStaff->name }} معلومات</h4>

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
                    <ul class="nav nav-tabs" id="generalTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="unCompletedCloth-tab" data-bs-toggle="tab"
                                data-bs-target="#unCompletedCloth" type="button" role="tab"
                                aria-controls="unCompletedCloth" aria-selected="true">
                                پاتی جامی <span
                                    class="text-muted mx-2 font-size-10">{{ $allCloths + $allCoats + $allVaskets + $allPanths + $allTshirts }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="completedCloth-tab" data-bs-toggle="tab"
                                data-bs-target="#completedCloth" type="button" role="tab"
                                aria-controls="completedCloth" aria-selected="true">
                                ګنډل شوی جامی <span
                                    class="text-muted mx-2 font-size-10">{{ $comallCloths + $comallCoats + $comallVaskets + $comallPanths + $comallTshirts }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary"
                                type="button" role="tab" aria-controls="salary" aria-selected="true">
                                د پیسو د اخستلو تاریخجه<span class="text-muted mx-2 font-size-10"></span>
                            </button>
                        </li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="unCompletedCloth" role="tabpane1"
                            aria-labelledby="unCompletedCloth-tab">
                            <div class="card">
                                <div class="card-body " id="">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $activePanel == 'cloth' ? 'active' : '' }} "
                                                id="cloth-tab" data-bs-toggle="tab" data-bs-target="#cloth"
                                                type="button" role="tab" aria-controls="cloth"
                                                aria-selected="true">
                                                جامی <span
                                                    class="text-muted mx-2 font-size-10">{{ $allCloths }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $activePanel == 'vasket' ? 'active' : '' }}"
                                                id="vasket-tab" data-bs-toggle="tab" data-bs-target="#vasket"
                                                type="button" role="tab" aria-controls="vasket"
                                                aria-selected="false">
                                                واسکټ<span
                                                    class="text-muted mx-2 font-size-10">{{ $allVaskets }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $activePanel == 'coat' ? 'active' : '' }}"
                                                id="coat-tab" data-bs-toggle="tab" data-bs-target="#coat"
                                                type="button" role="tab" aria-controls="coat"
                                                aria-selected="false">
                                                کوټ<span class="text-muted mx-2 font-size-10">{{ $allCoats }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $activePanel == 'cloth' ? 'panth' : '' }}"
                                                id="panth-tab" data-bs-toggle="tab" data-bs-target="#panth"
                                                type="button" role="tab" aria-controls="panth"
                                                aria-selected="false">
                                                پطلون<span
                                                    class="text-muted mx-2 font-size-10">{{ $allPanths }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $activePanel == 'tshirt' ? 'active' : '' }}"
                                                id="tshirt-tab" data-bs-toggle="tab" data-bs-target="#tshirt"
                                                type="button" role="tab" aria-controls="tshirt"
                                                aria-selected="false">
                                                یخن قاق<span
                                                    class="text-muted mx-2 font-size-10">{{ $allTshirts }}</span>
                                            </button>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane {{ $activePanel == 'cloth' ? 'active' : '' }}"
                                            id="cloth" role="tabpanel" aria-labelledby="cloth-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>د جامو ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                <th>اختیارونه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Cloths as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("cloths","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    <td>
                                                                        <button
                                                                            wire:click='completed({{ $item->id }},"cloth")'
                                                                            wire:confirm='ایا غواړی چی دا فرمایش مکمل کړی؟'
                                                                            class="btn btn-sm btn-primary ">مکمل یی
                                                                            کړی</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $activePanel == 'vasket' ? 'active' : '' }}"
                                            id="vasket" role="tabpanel" aria-labelledby="vasket-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>د واسکټ ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                <th>اختیارونه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Vaskets as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("vaskate","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    <td>
                                                                        <button
                                                                            wire:click='completed({{ $item->id }},"vasket")'
                                                                            wire:confirm='ایا غواړی چی دا فرمایش مکمل کړی؟'
                                                                            class="btn btn-sm btn-primary ">مکمل یی
                                                                            کړی</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $activePanel == 'coat' ? 'active' : '' }}"
                                            id="coat" role="tabpanel" aria-labelledby="coat-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>د کوټ ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                <th>اختیارونه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Coats as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("coat","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    <td>
                                                                        <button
                                                                            wire:click='completed({{ $item->id }},"coat")'
                                                                            wire:confirm='ایا غواړی چی دا فرمایش مکمل کړی؟'
                                                                            class="btn btn-sm btn-primary ">مکمل یی
                                                                            کړی</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $activePanel == 'panth' ? 'active' : '' }}"
                                            id="panth" role="tabpanel" aria-labelledby="panth-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>د پطلون ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                <th>اختیارونه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Panths as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("panth","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    <td>
                                                                        <button
                                                                            wire:click='completed({{ $item->id }},"panth")'
                                                                            wire:confirm='ایا غواړی چی دا فرمایش مکمل کړی؟'
                                                                            class="btn btn-sm btn-primary ">مکمل یی
                                                                            کړی</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $activePanel == 'tshirt' ? 'active' : '' }}"
                                            id="tshirt" role="tabpanel" aria-labelledby="tshirt-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>د یخن قاق ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                <th>اختیارونه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Tshirts as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("tshirt","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    <td>
                                                                        <button
                                                                            wire:click='completed({{ $item->id }},"tshirt")'
                                                                            wire:confirm='ایا غواړی چی دا فرمایش مکمل کړی؟'
                                                                            class="btn btn-sm btn-primary ">مکمل یی
                                                                            کړی</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="completedCloth" role="tabpane1"
                            aria-labelledby="completedCloth-tab">
                            <div class="card">
                                <div class="card-body " id="cutomerList">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="comCloth-tab" data-bs-toggle="tab"
                                                data-bs-target="#comCloth" type="button" role="tab"
                                                aria-controls="comCloth" aria-selected="true">
                                                جامی<span
                                                class="text-muted mx-2 font-size-10">{{ $comallCloths }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comVaskate-tab" data-bs-toggle="tab"
                                                data-bs-target="#comVaskate" type="button" role="tab"
                                                aria-controls="comVaskate" aria-selected="false">
                                                واسکټ<span
                                                class="text-muted mx-2 font-size-10">{{ $comallVaskets }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comCoat-tab" data-bs-toggle="tab"
                                                data-bs-target="#comCoat" type="button" role="tab"
                                                aria-controls="comCoat" aria-selected="false">
                                                کوټ<span
                                                class="text-muted mx-2 font-size-10">{{ $comallCoats }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comPanth-tab" data-bs-toggle="tab"
                                                data-bs-target="#comPanth" type="button" role="tab"
                                                aria-controls="comPanth" aria-selected="false">
                                                پطلون<span
                                                class="text-muted mx-2 font-size-10">{{ $comallPanths }}</span>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="comTshirt-tab" data-bs-toggle="tab"
                                                data-bs-target="#comTshirt" type="button" role="tab"
                                                aria-controls="comTshirt" aria-selected="false">
                                                یخن قاق<span
                                                class="text-muted mx-2 font-size-10">{{ $comallTshirts }}</span>
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="comCloth" role="tabpanel"
                                            aria-labelledby="comCloth-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                    
                                                                <th>د جامو ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($comCloths as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("cloths","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                    
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comVaskate" role="tabpanel"
                                            aria-labelledby="comVaskate-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                    
                                                                <th>د واسکټ ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($comVaskets as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("vaskate","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comCoat" role="tabpanel"
                                            aria-labelledby="comCoat-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                    
                                                                <th>د کوټ ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($comCoats as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("coat","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comPanth" role="tabpanel"
                                            aria-labelledby="comPanth-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                    
                                                                <th>د پطلون ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($comPanths as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("panth","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="comTshirt" role="tabpanel"
                                            aria-labelledby="comTshirt-tab">
                                            <div class="card">
                                                <div class="card-body " id="cutomerList">
                                                    <table id="datatable"
                                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                    
                                                                <th>د یخن قاق ID</th>
                                                                <th>مشتری</th>
                                                                <th>نمبر</th>
                                                                <th>د واپسی نیټه</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($comTshirts as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->customer_name }}</td>
                                                                    <td class="text-success" style="cursor: pointer"
                                                                        wire:click='showClothInfo("tshirt","{{ $item->customer_number }}")'>
                                                                        {{ $item->customer_number }}</td>
                                                                    <td>{{ $item->sewDate }}</td>
                                                                   
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="salary" role="tabpane">
                            <div class="card">
                                <div class="card-body " id="">
                                    <table id="datatable"
                                        class="table staffDatatable table-hover dt-responsive nowrap "
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>د پیسو اندازه</th>
                                                <th>تاریخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Salary as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
</div>
