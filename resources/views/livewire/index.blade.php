<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">داشبورد</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">
                                    <span data-plugin="counterup">
                                        <?php
                                        $total = 0;
                                        foreach (App\Models\Cloth::all() as $value) {
                                            $total += $value->price * $value->qty + $value->rakht;
                                        }
                                        foreach (App\Models\Vaskates::all() as $value) {
                                            $total += $value->price * $value->qty + $value->rakht;
                                        }
                                        
                                        foreach (App\Models\Coat::all() as $value) {
                                            $total += $value->price * $value->qty + $value->rakht;
                                        }
                                        foreach (App\Models\Panth::all() as $value) {
                                            $total += $value->price * $value->qty + $value->rakht;
                                        }
                                        foreach (App\Models\Tshirt::all() as $value) {
                                            $total += $value->price * $value->qty + $value->rakht;
                                        }
                                        echo $total;
                                        ?>
                                    </span>
                                </h4>
                                <p class="text-muted mb-0">ټول عاید</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">
                                    <span data-plugin="counterup">
                                        <?php
                                        $total = 0;
                                        $total += App\Models\Cloth::count();
                                        $total += App\Models\Coat::count();
                                        $total += App\Models\Vaskates::count();
                                        $total += App\Models\Panth::count();
                                        $total += App\Models\Tshirt::count();
                                        echo $total;
                                        ?>

                                    </span>
                                </h4>
                                <p class="text-muted mb-0">ټول فرمایشونه</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">
                                    <span data-plugin="counterup">
                                        <?php
                                        $total = 0;
                                        $total += App\Models\Cloth::where('sewStatus', '<>', '1')->count();
                                        $total += App\Models\Coat::where('sewStatus', '<>', '1')->count();
                                        $total += App\Models\Vaskates::where('sewStatus', '<>', '1')->count();
                                        $total += App\Models\Panth::where('sewStatus', '<>', '1')->count();
                                        $total += App\Models\Tshirt::where('sewStatus', '<>', '1')->count();
                                        echo $total;
                                        ?>
                                    </span>
                                </h4>
                                <p class="text-muted mb-0">نوی فرمایشونه</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">
                                    <span data-plugin="counterup">
                                        {{ $totalCustomers }}
                                    </span>
                                </h4>
                                <p class="text-muted mb-0">ټول مشتریان</p>

                            </div>
                        </div>
                    </div>

                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> کالنی تحلیل د"{{date("Y")}}"کال</h4>
                            <div class="mt-3">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                <hr>

                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">نوی فرمایشونه</h4>
                            <div class="mt-3">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $activePanel == 'cloth' ? 'active' : '' }} "
                                            id="cloth-tab" data-bs-toggle="tab" data-bs-target="#cloth" type="button"
                                            role="tab" aria-controls="cloth" aria-selected="true">
                                            جامی <span class="text-muted mx-2 font-size-10">{{ $allCloths }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $activePanel == 'vasket' ? 'active' : '' }}"
                                            id="vasket-tab" data-bs-toggle="tab" data-bs-target="#vasket" type="button"
                                            role="tab" aria-controls="vasket" aria-selected="false">
                                            واسکټ<span class="text-muted mx-2 font-size-10">{{ $allVaskets }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $activePanel == 'coat' ? 'active' : '' }}"
                                            id="coat-tab" data-bs-toggle="tab" data-bs-target="#coat" type="button"
                                            role="tab" aria-controls="coat" aria-selected="false">
                                            کوټ<span class="text-muted mx-2 font-size-10">{{ $allCoats }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $activePanel == 'cloth' ? 'panth' : '' }}"
                                            id="panth-tab" data-bs-toggle="tab" data-bs-target="#panth"
                                            type="button" role="tab" aria-controls="panth"
                                            aria-selected="false">
                                            پطلون<span class="text-muted mx-2 font-size-10">{{ $allPanths }}</span>
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Cloths as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td>
                                                                    <a wire:navigate.hover href="/cloths?q={{ $item->customer_number }}">{{ $item->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $item->sewDate }}</td>
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

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Vaskets as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td>
                                                                    <a wire:navigate.hover href="/vaskate?q={{ $item->customer_number }}">{{ $item->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $item->sewDate }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane {{ $activePanel == 'coat' ? 'active' : '' }}" id="coat"
                                        role="tabpanel" aria-labelledby="coat-tab">
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
                                                        @foreach ($Coats as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td>
                                                                    <a wire:navigate.hover href="/coat?q={{ $item->customer_number }}">{{ $item->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $item->sewDate }}</td>
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

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Panths as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td>
                                                                    <a wire:navigate.hover href="/panth?q={{ $item->customer_number }}">{{ $item->customer_number }}</a>
                                                                </td>
                                                                <td>{{ $item->sewDate }}</td>

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

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Tshirts as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td>
                                                                    <a wire:navigate.hover href="/tshirt?q={{ $item->customer_number }}">{{ $item->customer_number }}</a>
                                                                </td>
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
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->





                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@section('customJS')
    {{-- <script src=" {{ asset('assets/js/pages/chartjs.init.js') }}"></script> --}}


    <script src=" {{ asset('assets/libs/apexcharts/apexcharts.min.js') }} "></script>

    <script src="{{ asset('assets/js/pages/dashboard.init.js') }} "></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [{{ $Jan }}, {{ $Feb }}, {{ $Mar }},
                        {{ $Apr }}, {{ $May }}, {{ $Jun }},
                        {{ $Jul }}, {{ $Aug }}, {{ $Sep }},
                        {{ $Oct }}, {{ $Nov }}, {{ $Dec }}
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: true,
                            drawBorder: true
                        },
                        ticks: {
                            maxTicksLimit: 100
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 10,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return 'AF' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: true,
                            borderDash: [2],
                            zeroLineBorderDash: [1]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': AF' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
        //-------------
    </script>
@endsection
