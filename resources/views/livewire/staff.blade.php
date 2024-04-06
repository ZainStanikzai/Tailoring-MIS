@section('customStyle')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }} " rel="stylesheet" type="text/css" />
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
                        <livewire:staff-model />
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
                                        <th>تعداد د جوړو</th>
                                     
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
                                            <td>{{ $Staff->created_at }}</td>
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
                                            <td
                                                class="staffPayTablePayItem staffPayTablePayItem-id-{{ $Staff->id }}">
                                                {{ $Staff->salary }}
                                                <i class="uil uil-money-withdraw text-primary float-end font-size-20 "
                                                    style="cursor: pointer" data-id="{{ $Staff->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#staffPayModal"></i>
                                            </td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('staff.details', ['id' => $Staff->id]) }}"
                                                    class="uil uil-clipboard-notes font-size-20 mx-1 text-primary "
                                                    style="cursor: pointer"></a>
                                                <i class="uil uil-edit font-size-20 mx-1 text-primary staffEdit staffEdit-id-{{ $Staff->id }}"
                                                    style="cursor: pointer" data-name="{{ $Staff->name }}"
                                                    data-phone="{{ $Staff->phone }}"
                                                    data-id="{{ $Staff->id }}"></i>
                                                <a href="" data-id="{{ $Staff->id }}"
                                                    class="uil uil-user-times font-size-20 text-danger mx-1 deleteBtn"
                                                    title="Delete" style="cursor: pointer"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <livewire:deleteStaff />
    <!-- End Page-content -->
    <script>
        // $(".deleteBtn").click(function (e) { 
        //     e.preventDefault();
        //     alert()
        // });
        function addIdToFormSalary() {
            var StaffId = -1;
            $(".staffPayTablePayItem").click(function(e) {
                e.preventDefault();
                StaffId = $($(this).children()[0]).attr("data-id");

            });
            $("#staffPayModalID").keypress(function(e) {
                e.preventDefault();
            });
            $("#staffPayModal").on('show.bs.modal', function() {
                setTimeout(() => {
                    $("#staffPayModalID").focus();
                    $("#updateSalary").attr("wire:submit", "updateSalary(" + StaffId + ")");
                }, 500);
            });
        }
        addIdToFormSalary();


        function editeStaff() {
            $(".staffEdit").click(function(e) {
                e.preventDefault();
                $("#editeStaffModal").modal("show");
                console.log($(this).attr("data-name"));
                $("#editeStaffForm").attr("wire:submit", "editeStaff(" + $(this).attr("data-id") + ")");
                $("#editeModalName").val($(this).attr("data-name"));
                $("#editeModalPhone").val($(this).attr("data-phone"));
            });

        }

        editeStaff()

    </script>
</div>
@section('customJS')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src=" {{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }} "></script>
    <script src=" {{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }} "></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }} "></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
