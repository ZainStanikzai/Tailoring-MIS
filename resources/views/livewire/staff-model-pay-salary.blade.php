 {{-- start pay salary modal --}}
 <div class="">
     @if (session('success'))
         <div class="position-fixed top-0 start-0 p-3 " style="z-index:9999">
             <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
                 <div class="toast-header bg-success text-light">
                     <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                     <strong class="me-auto">Muzammel Mustafa Tailoring </strong>
                     <small class="text-muted">just now</small>
                     <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                 </div>
                 <div class="toast-body">
                     {{ session('success') }}
                 </div>
             </div>
         </div>
     @endif
     <div wire:ignore class="modal fade {{ $modelClass }}" style="{{ $modelStyle }}" id="staffPayModal"
         data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">د کارکونکی د پیسو اندازه
                         ولیکی
                     </h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     </button>
                 </div>
                 <div class="modal-body">
                     @if (session('error'))
                         <div class="text-danger text-center" dir="ltr">
                             {{ session('error') }}
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
                                                 {{ $staffId }}</p>
                                             <p><i class="uil uil-phone me-1"></i>
                                                 <span dir="ltr">{{ Auth::user()->phone }}</span>
                                                 <i class="me-1"></i>
                                                 مسول:{{ Auth::user()->name }}
                                             </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         @error('amount')
                                             <span class="text-danger">
                                                 {{ $message }}
                                             </span>
                                         @enderror
                                         <div class="col-md-12 col-sm-12 col-12">
                                             <div class="text-muted">
                                                 <form wire:submit='updateSalary(-1)' id="updateSalary">
                                                     <div class="row">
                                                         <div class="col-md-12 col-sm-12 col-12">
                                                             <div class="mb-1">
                                                                 <div class="d-flex align-items-baseline ">
                                                                     <label class="form-label" style="width: 100px"
                                                                         for="salary">د پیسو
                                                                         اندازه</label>
                                                                     <input type="number"
                                                                         class="form-control border w-100"
                                                                         id="salary"
                                                                         placeholder="د کارکونکی د پیسو اندازه"
                                                                         wire:model='amount'>

                                                                 </div>


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

                     <button type="submit" class="btn btn-primary" id="submitBtn" form="updateSalary">
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
     <script>
         $(document).ready(function() {
             // 
             window.addEventListener('salaryAdedd', event => {
                 var oldSalary = $(".staffPayTablePayItem-id-" + event.detail.id).text();
                 var newSalary = $(".staffPayTablePayItem-id-" + event.detail.id).html(parseInt(oldSalary) + parseInt(event.detail.salary)+'\
                                                     <i class="uil uil-money-withdraw text-primary float-end font-size-20 "\
                                                         style="cursor: pointer" data-id="'+event.detail.id+'"\
                                                         data-bs-toggle="modal" data-bs-target="#staffPayModal"></i>');
                 $("#staffPayModal").modal('hide');
             })
         });
     </script>
 </div>

 {{-- end --}}
