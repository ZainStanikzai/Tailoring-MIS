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
                        <h4 class="mb-0">سټایلونه</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> --}}
                                <li class="breadcrumb-item active">سټایلونه</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTabe == 'cloth' ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#navtabs-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">د جامو سټایلونه</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTabe == 'vasket' ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#navtabs-2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">د واسکټو سټایلونه</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTabe == 'coat' ? 'active' : '' }}" data-bs-toggle="tab"
                                        href="#navtabs-3" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">د کوټ سټایلونه</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $activeTabe == 'tShirt' ? 'active' : '' }}" 
                                        data-bs-toggle="tab" href="#navtabs-4" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">د یخن قاق سټایلونه</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane {{ $activeTabe == 'cloth' ? 'active' : '' }}" id="navtabs-1"
                                    role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link {{ $activePane == 'strip' ? 'active' : '' }}"
                                                    id="v-pills-1-tab" data-bs-toggle="pill" href="#v-pills-1"
                                                    role="tab" aria-controls="v-pills-1"
                                                    aria-selected="true">پڼی</a>
                                                <a class="nav-link {{ $activePane == 'neck' ? 'active' : '' }}"
                                                    id="v-pills-2-tab" data-bs-toggle="pill" href="#v-pills-2"
                                                    role="tab" aria-controls="v-pills-2"
                                                    aria-selected="false">یخن</a>
                                                <a class="nav-link {{ $activePane == 'sidePocket' ? 'active' : '' }}"
                                                    id="v-pills-3-tab" data-bs-toggle="pill" href="#v-pills-3"
                                                    role="tab" aria-controls="v-pills-3"
                                                    aria-selected="false">جیب_بغل</a>
                                                <a class="nav-link {{ $activePane == 'frontPocket' ? 'active' : '' }}"
                                                    id="v-pills-4-tab" data-bs-toggle="pill" href="#v-pills-4"
                                                    role="tab" aria-controls="v-pills-4"
                                                    aria-selected="false">جیب_روی</a>
                                                <a class="nav-link {{ $activePane == 'skirt' ? 'active' : '' }}"
                                                    id="v-pills-5-tab" data-bs-toggle="pill" href="#v-pills-5"
                                                    role="tab" aria-controls="v-pills-5"
                                                    aria-selected="false">دامن</a>
                                                <a class="nav-link {{ $activePane == 'salayee' ? 'active' : '' }}"
                                                    id="v-pills-6-tab" data-bs-toggle="pill" href="#v-pills-6"
                                                    role="tab" aria-controls="v-pills-6"
                                                    aria-selected="false">سلای</a>
                                                <a class="nav-link {{ $activePane == 'button' ? 'active' : '' }}"
                                                    id="v-pills-7-tab" data-bs-toggle="pill" href="#v-pills-7"
                                                    role="tab" aria-controls="v-pills-7"
                                                    aria-selected="false">دکمه</a>
                                                <a class="nav-link {{ $activePane == 'shoulder' ? 'active' : '' }}"
                                                    id="v-pills-8-tab" data-bs-toggle="pill" href="#v-pills-8"
                                                    role="tab" aria-controls="v-pills-8"
                                                    aria-selected="false">شانه_دیزاین</a>
                                                <a class="nav-link {{ $activePane == 'sleeve' ? 'active' : '' }}"
                                                    id="v-pills-9-tab" data-bs-toggle="pill" href="#v-pills-9"
                                                    role="tab" aria-controls="v-pills-9"
                                                    aria-selected="false">استین</a>
                                                <a class="nav-link {{ $activePane == 'sleeveMouth' ? 'active' : '' }}"
                                                    id="v-pills-10-tab" data-bs-toggle="pill" href="#v-pills-10"
                                                    role="tab" aria-controls="v-pills-10"
                                                    aria-selected="false">دهن</a>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                <div class="tab-pane fade {{ $activePane == 'strip' ? 'show active' : '' }} "
                                                    id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $stripStyleOp == 'create' ? 'stripCreate()' : 'stripEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $stripinputText }}" type="text"
                                                                wire:model='stripinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($stripStyles as $pocket)
                                                                    <tr wire:key='strip_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='stripReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='stripDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'neck' ? 'show active' : '' }}"
                                                    id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $neckStyleOp == 'create' ? 'neckCreate()' : 'neckEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $neckinputText }}" type="text"
                                                                wire:model='neckinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($neckStyles as $pocket)
                                                                    <tr wire:key='neck_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='neckReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='neckDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'sidePocket' ? 'show active' : '' }}"
                                                    id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">
                                                            <button
                                                                wire:click={{ $StyleOp == 'create' ? 'createSidePocket()' : 'editeSidePocket()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $inputText }}" type="text"
                                                                wire:model='inputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>
                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sidePocketStyles as $pocket)
                                                                    <tr wire:key='sidePocket_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeSidePocket({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteSidePocket({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'frontPocket' ? 'show active' : '' }}"
                                                    id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $frontStyleOp == 'create' ? 'createFrontPocket()' : 'editeFrontPocket()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $frontinputText }}" type="text"
                                                                wire:model='frontinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($frontPocketStyles as $pocket)
                                                                    <tr wire:key='frontPocket_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeFrontPocket({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteFrontPocket({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'skirt' ? 'show active' : '' }}"
                                                    id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $skirtStyleOp == 'create' ? 'skirtCreate()' : 'skirtEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $skirtinputText }}" type="text"
                                                                wire:model='skirtinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($skirtStyles as $pocket)
                                                                    <tr wire:key='skirt_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='skirtReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='skirtDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'salayee' ? 'show active' : '' }}"
                                                    id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $salayeeStyleOp == 'create' ? 'createSalayee()' : 'editeSalayee()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $salayeeinputText }}" type="text"
                                                                wire:model='salayeeinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($salayeeStyles as $pocket)
                                                                    <tr wire:key='salayee_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeSalayee({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteSalayee({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'button' ? 'show active' : '' }}"
                                                    id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $buttonStyleOp == 'create' ? 'buttonCreate()' : 'buttonEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $buttoninputText }}" type="text"
                                                                wire:model='buttoninputText'
                                                                class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($buttonStyles as $pocket)
                                                                    <tr wire:key='button_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='buttonReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='buttonDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'shoulder' ? 'show active' : '' }}"
                                                    id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $shoulderStyleOp == 'create' ? 'shoulderCreate()' : 'shoulderEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $shoulderinputText }}" type="text"
                                                                wire:model='shoulderinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($shoulderStyles as $pocket)
                                                                    <tr wire:key='shoulder_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='shoulderReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='shoulderDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'sleeve' ? 'show active' : '' }}"
                                                    id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $sleeveStyleOp == 'create' ? 'sleeveCreate()' : 'sleeveEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $sleeveinputText }}" type="text"
                                                                wire:model='sleeveinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sleeveStyles as $pocket)
                                                                    <tr wire:key='sleeve_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='sleeveReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='sleeveDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $activePane == 'sleeveMouth' ? 'show active' : '' }}"
                                                    id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $sleeveMouthStyleOp == 'create' ? 'createSleeveMouth()' : 'editeSleeveMouth()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $sleeveMouthinputText }}" type="text"
                                                                wire:model='sleeveMouthinputText'
                                                                class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sleeveMouthStyles as $pocket)
                                                                    <tr wire:key='sleeveMouth_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeSleeveMouth({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteSleeveMouth({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
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
                                <div class="tab-pane {{ $activeTabe == 'vasket' ? 'active' : '' }}" id="navtabs-2"
                                    role="tabpanel">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link {{ $vasketActivePane == 'vasketNeck' ? 'active' : '' }}"
                                                    id="v-pills-11-tab" data-bs-toggle="pill" href="#v-pills-110"
                                                    role="tab" aria-controls="v-pills-11"
                                                    aria-selected="false">یخن</a>
                                                <a class="nav-link {{ $vasketActivePane == 'vasketSkirt' ? 'active' : '' }}"
                                                    id="v-pills-12-tab" data-bs-toggle="pill" href="#v-pills-120"
                                                    role="tab" aria-controls="v-pills-12"
                                                    aria-selected="false">دامن</a>
                                                <a class="nav-link {{ $vasketActivePane == 'vasketShoulder' ? 'active' : '' }}"
                                                    id="v-pills-8-tab" data-bs-toggle="pill" href="#v-pills-250"
                                                    role="tab" aria-controls="v-pills-25"
                                                    aria-selected="false">شانه</a>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                <div class="tab-pane fade {{ $vasketActivePane == 'vasketNeck' ? 'show active' : '' }} "
                                                    id="v-pills-110" role="tabpanel" aria-labelledby="v-pills-110-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $vasketNeckStyleOp == 'create' ? 'vasketNeckCreate()' : 'vasketNeckEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $vasketNeckinputText }}" type="text"
                                                                wire:model='vasketNeckinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($vasketNeckStyles as $pocket)
                                                                    <tr wire:key='vasketNeck_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='vasketNeckReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='vasketNeckDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $vasketActivePane == 'vasketSkirt' ? 'show active' : '' }}"
                                                    id="v-pills-120" role="tabpanel" aria-labelledby="v-pills-120-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $vasketSkirtStyleOp == 'create' ? 'vasketSkirtCreate()' : 'vasketSkirtEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $vasketSkirtinputText }}" type="text"
                                                                wire:model='vasketSkirtinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($vasketSkirtStyles as $pocket)
                                                                    <tr wire:key='vasketSkirt_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='vasketSkirtReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='vasketSkirtDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div> 
                                                <div class="tab-pane fade {{ $vasketActivePane == 'vasketShoulder' ? 'show active' : '' }}"
                                                    id="v-pills-250" role="tabpanel" aria-labelledby="v-pills-250-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $vasketShoulderStyleOp == 'create' ? 'vasketShoulderCreate()' : 'vasketShoulderEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $vasketShoulderinputText }}" type="text"
                                                                wire:model='vasketShoulderinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($vasketShoulderStyles as $pocket)
                                                                    <tr wire:key='vasketShoulder_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='vasketShoulderReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='vasketShoulderDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
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
                                <div class="tab-pane {{ $activeTabe == 'coat' ? 'active' : '' }}" id="navtabs-3"
                                    role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link {{ $coatActivePane == 'coatNeck' ? 'active' : '' }}"
                                                    id="v-pills-11-tab" data-bs-toggle="pill" href="#v-pills-11"
                                                    role="tab" aria-controls="v-pills-11"
                                                    aria-selected="false">یخن</a>
                                                <a class="nav-link {{ $coatActivePane == 'coatSkirt' ? 'active' : '' }}"
                                                    id="v-pills-12-tab" data-bs-toggle="pill" href="#v-pills-12"
                                                    role="tab" aria-controls="v-pills-12"
                                                    aria-selected="false">دامن</a>
                                                <a class="nav-link {{ $coatActivePane == 'neckSub' ? 'active' : '' }}"
                                                    id="v-pills-13-tab" data-bs-toggle="pill" href="#v-pills-13"
                                                    role="tab" aria-controls="v-pills-13"
                                                    aria-selected="false">یخن سب</a>
                                                <a class="nav-link {{ $coatActivePane == 'back' ? 'active' : '' }}"
                                                    id="v-pills-8-tab" data-bs-toggle="pill" href="#v-pills-14"
                                                    role="tab" aria-controls="v-pills-14"
                                                    aria-selected="false">پشت</a>
                                                <a class="nav-link {{ $coatActivePane == 'coatShoulder' ? 'active' : '' }}"
                                                    id="v-pills-8-tab" data-bs-toggle="pill" href="#v-pills-25"
                                                    role="tab" aria-controls="v-pills-25"
                                                    aria-selected="false">شانه</a>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                <div class="tab-pane fade {{ $coatActivePane == 'coatNeck' ? 'show active' : '' }} "
                                                    id="v-pills-11" role="tabpanel" aria-labelledby="v-pills-11-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $coatNeckStyleOp == 'create' ? 'coatNeckCreate()' : 'coatNeckEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $coatNeckinputText }}" type="text"
                                                                wire:model='coatNeckinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coatNeckStyles as $pocket)
                                                                    <tr wire:key='coatNeck_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='coatNeckReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='coatNeckDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $coatActivePane == 'coatSkirt' ? 'show active' : '' }}"
                                                    id="v-pills-12" role="tabpanel" aria-labelledby="v-pills-12-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $coatSkirtStyleOp == 'create' ? 'coatSkirtCreate()' : 'coatSkirtEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $coatSkirtinputText }}" type="text"
                                                                wire:model='coatSkirtinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coatSkirtStyles as $pocket)
                                                                    <tr wire:key='coatSkirt_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='coatSkirtReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='coatSkirtDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $coatActivePane == 'neckSub' ? 'show active' : '' }}"
                                                    id="v-pills-13" role="tabpanel" aria-labelledby="v-pills-13-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $neckSubStyleOp == 'create' ? 'createNeckSub()' : 'editeNeckSub()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $neckSubinputText }}" type="text"
                                                                wire:model='neckSubinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($neckSubStyles as $pocket)
                                                                    <tr wire:key='neckSub_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeNeckSub({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteNeckSub({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $coatActivePane == 'back' ? 'show active' : '' }}"
                                                    id="v-pills-14" role="tabpanel" aria-labelledby="v-pills-14-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $coatBackStyleOp == 'create' ? 'createCoatBack()' : 'editeCoatBack()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $coatBackinputText }}" type="text"
                                                                wire:model='coatBackinputText'
                                                                class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coatBackStyles as $pocket)
                                                                    <tr wire:key='coatBack_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='readyToEditeCoatBack({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='deleteCoatBack({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $coatActivePane == 'coatShoulder' ? 'show active' : '' }}"
                                                    id="v-pills-25" role="tabpanel" aria-labelledby="v-pills-14-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $coatShoulderStyleOp == 'create' ? 'coatShoulderCreate()' : 'coatShoulderEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i>
                                                                </button>
                                                            <input value="{{ $coatShoulderinputText }}" type="text"
                                                                wire:model='coatShoulderinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($coatShoulderStyles as $pocket)
                                                                    <tr wire:key='coatShoulder_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='coatShoulderReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='coatShoulderDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
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
                                <div class="tab-pane {{ $activeTabe == 'tShirt' ? 'active' : '' }}" id="navtabs-4"
                                    role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link {{$tShirtActivePane == "tShirtNeck" ? "active" : ""}}" id="v-pills-50-tab" data-bs-toggle="pill"
                                                    href="#v-pills-50" role="tab" aria-controls="v-pills-50"
                                                    aria-selected="false">یخن</a>
                                                <a class="nav-link {{$tShirtActivePane == "tShirtSkirt" ? "active" : ""}}" id="v-pills-51-tab" data-bs-toggle="pill"
                                                    href="#v-pills-51" role="tab" aria-controls="v-pills-51"
                                                    aria-selected="false">دامن</a>
                                                <a class="nav-link {{$tShirtActivePane == "tShirtSleeve" ? "active" : ""}}" id="v-pills-52-tab" data-bs-toggle="pill"
                                                    href="#v-pills-52" role="tab" aria-controls="v-pills-52"
                                                    aria-selected="false">استین</a>
                                                <a class="nav-link {{$tShirtActivePane == "tShirtShoulder" ? "active" : ""}}" id="v-pills-53-tab" data-bs-toggle="pill"
                                                    href="#v-pills-53" role="tab" aria-controls="v-pills-53"
                                                    aria-selected="false">شانه_دیزاین</a>
                                                <a class="nav-link {{$tShirtActivePane == "tShirtStrip" ? "active" : ""}}" id="v-pills-19-tab" data-bs-toggle="pill"
                                                    href="#v-pills-54" role="tab" aria-controls="v-pills-54"
                                                    aria-selected="false">پټی</a>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                <div class="tab-pane fade {{$tShirtActivePane == 'tShirtNeck' ? 'show active' : ''}} " id="v-pills-50"
                                                    role="tabpanel" aria-labelledby="v-pills-50-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $tShirtNeckStyleOp == 'create' ? 'tShirtNeckCreate()' : 'tShirtNeckEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $tShirtNeckinputText }}" type="text"
                                                                wire:model='tShirtNeckinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tShirtNeckStyles as $pocket)
                                                                    <tr wire:key='tShirtNeck_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='tShirtNeckReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='tShirtNeckDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{$tShirtActivePane == 'tShirtSkirt' ? 'show active' : ''}} " id="v-pills-51" role="tabpanel"
                                                    aria-labelledby="v-pills-51-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $tShirtSkirtStyleOp == 'create' ? 'tShirtSkirtCreate()' : 'tShirtSkirtEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $tShirtSkirtinputText }}" type="text"
                                                                wire:model='tShirtSkirtinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tShirtSkirtStyles as $pocket)
                                                                    <tr wire:key='tShirtSkirt_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='tShirtSkirtReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='tShirtSkirtDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{$tShirtActivePane == 'tShirtSleeve' ? 'show active' : ''}}" id="v-pills-52" role="tabpanel"
                                                    aria-labelledby="v-pills-52-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $tShirtSleeveStyleOp == 'create' ? 'tShirtSleeveCreate()' : 'tShirtSleeveEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $tShirtSleeveinputText }}" type="text"
                                                                wire:model='tShirtSleeveinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tShirtSleeveStyles as $pocket)
                                                                    <tr wire:key='tShirtSleeve_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='tShirtSleeveReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='tShirtSleeveDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{$tShirtActivePane == 'tShirtShoulder' ? 'show active' : ''}}" id="v-pills-53" role="tabpanel"
                                                    aria-labelledby="v-pills-53-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $tShirtShoulderStyleOp == 'create' ? 'tShirtShoulderCreate()' : 'tShirtShoulderEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $tShirtShoulderinputText }}" type="text"
                                                                wire:model='tShirtShoulderinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tShirtShoulderStyles as $pocket)
                                                                    <tr wire:key='tShirtShoulder_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='tShirtShoulderReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='tShirtShoulderDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{$tShirtActivePane == 'tShirtStrip' ? 'show active' : ''}}" id="v-pills-54" role="tabpanel"
                                                    aria-labelledby="v-pills-54-tab">
                                                    <div class="table-responsive">
                                                        <div class="d-flex m-1 float-end">

                                                            <button
                                                                wire:click={{ $tShirtStripStyleOp == 'create' ? 'tShirtStripCreate()' : 'tShirtStripEdite()' }}
                                                                class="btn btn-primary m-1"><i
                                                                    class="uil-file-plus-alt "></i></button>
                                                            <input value="{{ $tShirtStripinputText }}" type="text"
                                                                wire:model='tShirtStripinputText' class="form-control m-1"
                                                                placeholder="نوی ستایل ولیکی...">
                                                        </div>


                                                        <table class="table table-sm m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>سټایل نوم</th>
                                                                    <th>اختیارونه</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tShirtStripStyles as $pocket)
                                                                    <tr wire:key='tShirtStrip_{{ $pocket->id }}'>
                                                                        <td>{{ $pocket->id }}</td>
                                                                        <td>{{ $pocket->name }}</td>
                                                                        <td>
                                                                            <i wire:click='tShirtStripReadyToEdite({{ $pocket->id }})'
                                                                                class="uil uil-edit font-size-20 mx-1 text-primary"
                                                                                style="cursor: pointer"></i>
                                                                            <i href=""
                                                                                wire:click='tShirtStripDelete({{ $pocket->id }})'
                                                                                class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                                                title="Delete"
                                                                                style="cursor: pointer"></i>
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
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
