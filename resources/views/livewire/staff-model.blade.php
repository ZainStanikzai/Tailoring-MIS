<div class="">
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
    <div class="clotdPageActionBtn">
        <button type="button" class="btn btn-primary waves-effect waves-light mt-2" data-bs-toggle="modal"
            data-bs-target="#addnewBill">
            نوی کارکونکی جوړ کړی <i class="uil-book-medical"></i>
        </button>
    </div>

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
    @script

    <script>
        $(document).ready(function() {
            window.addEventListener('staffCreated', event => {
                $(".staffDatatable").prepend('<tr class="" id="staffRow-id-' + event.detail.id + '"> \
                                                    <td>' + event.detail.id + '</td>\
                                                    <td class="staff-name-id-'+event.detail.id+'">' + event.detail.name + '</td>\
                                                    <td class="staff-phone-id-'+event.detail.id+'">' + event.detail.phone + '</td>\
                                                    <td>' + event.detail.created_at + '</td>\
                                                    <td>\
                                                       0\
                                                    </td>\
                                                    <td class="staffPayTablePayItem staffPayTablePayItem-id-'+event.detail.id+'">0\
                                                        <i class="uil uil-money-withdraw text-primary float-end font-size-20 "\
                                                            style="cursor: pointer" data-id="' + event.detail.id + '"\
                                                            data-bs-toggle="modal" data-bs-target="#staffPayModal"></i>\
                                                    </td>\
                                                    <td class="d-flex align-items-center justify-content-center">\
                                                        <a href="/staff/' + event.detail.id + '"\
                                                    class="uil uil-clipboard-notes font-size-20 mx-1 text-primary "\
                                                    style="cursor: pointer"></a>\
                                                <i class="uil uil-edit font-size-20 mx-1 text-primary staffEdit staffEdit-id-' + event.detail.id + '"\
                                                    style="cursor: pointer" \
                                                    data-name="' + event.detail.name + '"\
                                                    data-phone="' + event.detail.phone + '"\
                                                    data-id="' + event.detail.id + '"></i>\
                                                <i  data-id="' + event.detail.id + '" class="uil uil-user-times font-size-20 text-danger deleteBtn mx-1"\
                                                    title="Delete" style="cursor: pointer"></i>\
                                                    </td>\
                                                </tr>');
                $(".staffPayTablePayItem").click(function(e) {
                    e.preventDefault();
                    console.log();
                    $("#staffPayModalID").val($($(this).children()[0]).attr("data-id"));
                    $("#staffPayModalID").change(function (e) { 
                        e.preventDefault();
                        alert()
                    });
                });
               $("#addnewBill").modal('hide');
               addIdToFormSalary();
            //    delete staff
            editeStaff();
           let stafID = 0;
           $(".deleteBtn").click(function(e) {
               e.preventDefault();
               stafID = $(this).attr("data-id");
               Swal.fire({
                   title: "ایا تاسو مطمین یاستی؟",
                   text: "ایا غواری چی دا کارکوونکی پاک کری!",
                   icon: "warning",
                   showCancelButton: !0,
                   confirmButtonColor: "#34c38f",
                   cancelButtonColor: "#f46a6a",
                   confirmButtonText: "هو, پاک یی کړه!",
               }).then(function(t) {
                   if (t.isConfirmed) {
                       $wire.dispatch('deleteStaff', {
                           clickedStaff: stafID
                       });
                   }
               });

           });

           window.addEventListener("staffDeleted", event => {
               $("#staffRow-id-" + stafID).addClass("d-none");
               Swal.fire(
                   "پاک شو!",
                   "کارکوونکی له لیست څخه پاک شو.",
                   "success"
               );

           });
        //    end
       



               
            })
        });
    </script>
    @endscript
 
</div>
