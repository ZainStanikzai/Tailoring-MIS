@section('customStyle')
    <script>
        var InfoID;
        function showEditForm(id) {
           InfoID = id;
            $("#updatedStaff").modal("show");
        }
        function showSalaryPayForm(id) {
            InfoID = id;
            $("#staffPayModal").modal("show");
        }
    </script>
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
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="clotdPageActionBtn d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2" data-bs-toggle="modal"
                                data-bs-target="#addnewBill">
                                نوی کارکونکی جوړ کړی <i class="uil-book-medical"></i>
                            </button>
                            <div class="mx-3 mt-2">
                                <div class="d-flex align-items-center ">
                                    <input dir="ltr" wire:keyup.prevent='search($event.target.value)'
                                        type="text" placeholder="...و پلټی" name="" class="form-control ms-2"
                                        id="">
                                </div>
                                
                            </div>
                        </div>
                    <livewire:staff-model />
                        <div class="modal fade {{ $modelClass }}" style="{{ $modelStyle }}" id="addnewBill" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">د نوی کارکونکی معلومات ولیکی
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if (session('error'))
                                            <div class="text-danger text-center" dir="ltr">{{ session('error') }}
                                            </div>
                                        @endif
                    
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
                                                            <div class="mb-1">
                                                                <img src="assets/images/logo-dark.png" alt="logo" height="20"
                                                                    class="logo-dark" />
                                                                <img src="assets/images/logo-light.png" alt="logo" height="20"
                                                                    class="logo-light" />
                                                            </div>
                                                            <div class="text-muted">
                                                                <p class="mb-1">پته:{{ Auth::user()->address }}
                                                                    افغانستان.</p>
                                                                <p><i class="uil uil-phone me-1"></i>
                                                                    <span dir="ltr">{{ Auth::user()->phone }}</span>
                                                                    <i class="me-1"></i>
                                                                    مسول:{{ Auth::user()->name }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-12">
                                                                <div class="text-muted">
                                                                    <form wire:submit='create' id="addnewbStaff">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                                <div class="mb-1">
                                                                                    <div class="d-flex align-items-baseline ">
                                                                                        <label class="form-label" style="width: 40px"
                                                                                            for="name">نوم</label>
                                                                                        <input type="text" min="1" max="150"
                                                                                            class="form-control border w-100" id="name"
                                                                                            placeholder="د کارکونکی نوم" wire:model='name'>
                                                                                    </div>
                                                                                    @error('name')
                                                                                        <div class="">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                                <div class="mb-1">
                                                                                    <div class="d-flex align-items-baseline ">
                                                                                        <label class="form-label" style="width: 40px"
                                                                                            for="phone">مبایل</label>
                                                                                        <input type="number"
                                                                                            class="form-control border w-100" id="phone"
                                                                                            placeholder="د کارکونکی مبایل شمیره"
                                                                                            wire:model='phone'>
                                                                                    </div>
                                                                                    @error('phone')
                                                                                        <div class="">
                                                                                            {{ $message }}
                                                                                        </div>
                                                                                    @enderror
                    
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
                    
                                        <button type="submit" class="btn btn-primary" form="addnewbStaff">
                                            ذخیره یی کړی<span wire:loading class="spinner spinner-border spinner-border-sm"></span>
                                        </button>
                                        {{-- <a href="javascript:window.print()"
                                            class="btn btn-success waves-effect waves-light me-1"><i
                                                class="fa fa-print"></i></a> --}}
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <livewire:edite-staff-model />
                        {{-- ...end create new staff modal... --}}

                        <livewire:staff-model-pay-salary />




                        <div class="card-body " id="cutomerList">
                            <table id="datatable" class="table staffDatatable table-hover dt-responsive nowrap "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead wire:ignore>
                                    <tr>
                                        <th>#</th>
                                        <th>نوم</th>
                                        <th>نمبر</th>
                                        <th>د کار نیټه</th>
                                        <th>پاتی جوړو</th>
                                        <th>ګنډل شوی جوړو</th>
                                     
                                        <th>اخستل سوی پیسی</th>
                                      
                                        <th>اختیارونه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Staffs as $Staff)
                                        <tr class="" id="staffRow-id-{{ $Staff->id }}"
                                            wire:key="staff-{{ $Staff->id }}">
                                            <td>{{ $Staff->id }}</td>
                                            <td class="staff-name-id-{{ $Staff->id }}">{{ $Staff->name }}</td>
                                            <td class="staff-phone-id-{{ $Staff->id }}">{{ $Staff->phone }}</td>
                                            <td>{{ $Staff->created_at->format("d-m-Y") }}</td>
                                            <td>
                                                <?php
                                                $cloths  = \App\Models\Cloth::where("staff_id" , $Staff->id )->where("sewStatus","0")->count();
                                                $vaskets  = \App\Models\Vaskates::where("staff_id" , $Staff->id )->where("sewStatus","0")->count();
                                                $coats  = \App\Models\Coat::where("staff_id" , $Staff->id )->where("sewStatus","0")->count();
                                                $panths  = \App\Models\Panth::where("staff_id" , $Staff->id )->where("sewStatus","0")->count();
                                                $tshirts  = \App\Models\Tshirt::where("staff_id" , $Staff->id )->where("sewStatus","0")->count();
                                                echo  $cloths + $vaskets +  $coats +  $panths + $tshirts;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $cloths  = \App\Models\Cloth::where("staff_id" , $Staff->id )->where("sewStatus","1")->count();
                                                $vaskets  = \App\Models\Vaskates::where("staff_id" , $Staff->id )->where("sewStatus","1")->count();
                                                $coats  = \App\Models\Coat::where("staff_id" , $Staff->id )->where("sewStatus","1")->count();
                                                $panths  = \App\Models\Panth::where("staff_id" , $Staff->id )->where("sewStatus","1")->count();
                                                $tshirts  = \App\Models\Tshirt::where("staff_id" , $Staff->id )->where("sewStatus","1")->count();
                                                echo  $cloths + $vaskets +  $coats +  $panths + $tshirts;
                                                ?>
                                            </td>
                                            <td onclick="showSalaryPayForm({{$Staff->id}})">
                                                {{ $Staff->Salary->sum("amount") }}
                                                <i class="uil uil-money-withdraw text-primary float-end font-size-20 "
                                                    style="cursor: pointer" 
                                                    data-bs-toggle="modal" data-bs-target="#staffPayModal"></i>
                                            </td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('staff.details', ['id' => $Staff->id]) }}" wire:navigate.hover
                                                    class="uil uil-clipboard-notes font-size-20 mx-1 text-primary "
                                                    style="cursor: pointer"></a>
                                                <i onclick="showEditForm({{$Staff->id}})" class="uil uil-edit font-size-20 mx-1 text-primary staffEdit staffEdit-id-{{ $Staff->id }}"
                                                    style="cursor: pointer" 
                                                    data-id="{{ $Staff->id }}"></i>
                                                <i  wire:click='delete({{ $Staff->id }})' 
                                                    wire:confirm='ایا تاسو مطمین یاستی؟' 
                                                    class="uil uil-user-times font-size-20 text-danger mx-1 "
                                                    title="Delete" style="cursor: pointer"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="">
                                {{$Staffs->links()}}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="" wire:ignore>
        <script>
            $(document).ready(function() {
                window.addEventListener("newRecordAdded", event => {
                    $('form')[0].reset();
                    $(".modal").modal("hide");
                    $(".modal-backdrop").addClass("d-none");
                })
            });
        </script>
    </div>
   
</div>

