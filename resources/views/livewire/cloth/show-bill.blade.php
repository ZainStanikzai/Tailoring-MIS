<div class="modal fade {{ $modelClass }}" style="{{ $modelStyle }}" id="showBillD" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">د نوی بیل معلومات ولیکی</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0" id="invoiceModal">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="position-absolute" style="left: 10px;top:0">Bill :{{ $lastID }}</div>
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
                                        <p class="mb-1">پته:{{ Auth::user()->address }}</p>
                                        <p><i class="uil uil-phone me-1"></i>
                                            <span dir="ltr">{{ Auth::user()->phone }}</span>
                                            <i class="me-1"></i>
                                            مسول:{{ Auth::user()->name }}
                                        </p>
                                    </div>
                                </div>
                                <form id="formBillShow" wire:submit='update'>
                                    <div style="left:-20px;top:20px"
                                        class="mt-4 position-absolute  d-flex align-items-baseline justify-content-end">
                                        <h5 class="font-size-16 mb-1">انتها تاریخ </h5>
                                        <input type="date" class="border-0 bg-transparent shadow-none" name=""
                                            wire:model='sewDate' id="date" required>
                                    </div>
                                    <div class="d-flex align-items-baseline col-sm-5 col-4 position-absolute "
                                        style="left: 10px; top:70px">
                                        <label class="form-label me-2" style="" for="validationCustom02">
                                            خیاط</label>
                                        <select disabled name="" class="w-100 border border-1 bg-transparent"
                                            id="selectStaff" wire:model='staff_id' required>
                                            @foreach ($staffs as $staff)
                                                <option {{$staff_id == $staff->id ? "selected":''}} value="{{ $staff->id }}">
                                                    {{ $staff->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('staff_id')
                                            <span class="text-danger feedBackError">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="text-muted">

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="mb-1">
                                                            <div class="d-flex align-items-baseline ">
                                                                <label class="form-label" style="width: 40px"
                                                                    for="validationCustom01">نوم</label>
                                                                <input type="text" min="1" disabled
                                                                    wire:model='customerName'
                                                                    class="form-control border w-100"
                                                                    id="validationCustom01" placeholder="د مشتری نوم"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        <div class="mb-1">
                                                            <div class="d-flex align-items-baseline ">
                                                                <label class="form-label" style="width: 40px"
                                                                    for="validationCustom01">مبایل</label>
                                                                <input type="number" min="0700000000" disabled
                                                                    wire:model='customerPhone' max="0799999999"
                                                                    class="form-control border w-100"
                                                                    id="validationCustom01"
                                                                    placeholder="د مشتری مبایل شمیره" required>
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
                                                <input disabled type="number" step="0.5" min="1" wire:model='height'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">شانه</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='shoulder'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">استین</label>
                                                <input  disabled type="number" step="0.5" min="1"wire:model='sleeve'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">یخن</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='neck'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">بغل</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='side'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">زربغل</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='sideDown'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">دامن</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='skirt'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">تمبان</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='tomban'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">پاچه</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='leg' max="150"
                                                    class="form-control p-1" id="validationCustom01" placeholder="00"
                                                    required>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 50px"
                                                    for="validationCustom01">سورین</label>
                                                <input  disabled type="number" step="0.5" min="1" wire:model='soreen'
                                                    max="150" class="form-control p-1" id="validationCustom01"
                                                    placeholder="00" required>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6 ">
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width:100px"
                                                    for="">پټی</label>
                                                <select disabled name="" wire:model='stripStyle_id'
                                                    class="w-100  border border-light " id="">
                                                   
                                                    @foreach ($stripStyles as $strip)
                                                        <option {{$stripStyle_id == $strip->id ? 'selected' : ''}} value="{{ $strip->id }}">
                                                            {{ $strip->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('stripStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">یخن</label>
                                                <select disabled name="" wire:model='neckStyle_id'
                                                    class="w-100  border border-light " id="">
                                                   
                                                    @foreach ($neckStyles as $neckStyle)
                                                        <option {{$neckStyle_id == $neckStyle->id ? 'selected' : ''}} value="{{ $neckStyle->id }}">
                                                            {{ $neckStyle->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('neckStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">جیب_بغل</label>
                                                <select disabled name="" wire:model='sidePocketStyle_id'
                                                    class="w-100  border border-light " id="">
                                            
                                                    @foreach ($sidePocketStyles as $sPocket)
                                                        <option {{$sidePocketStyle_id == $sPocket->id ? 'selected' : ''}} value="{{ $sPocket->id }}">
                                                            {{ $sPocket->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sidePocketStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width:100px"
                                                    for="validationCustom02">جیب_روی</label>
                                                <select disabled name="" wire:model='frontPocketStyle_id'
                                                    class="w-100  border border-light " id="">
                                        
                                                    @foreach ($frontPocketStyles as $fPocket)
                                                        <option {{$frontPocketStyle_id == $fPocket->id ? 'selected' : ''}} value="{{ $fPocket->id }}">
                                                            {{ $fPocket->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('frontPocketStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">دامن</label>
                                                <select disabled name="" wire:model='skirtStyle_id'
                                                    class="w-100  border border-light" id="">
                                              
                                                    @foreach ($skirtStyles as $skirt)
                                                        <option {{$skirtStyle_id == $skirt->id ? 'selected' : ''}} value="{{ $skirt->id }}">
                                                            {{ $skirt->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('skirtStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">سلای</label>
                                                <select disabled name="" wire:model='salayeeStyle_id'
                                                    class="w-100  border border-light" id="">
                                                    
                                                    @foreach ($salayeeStyles as $salayee)
                                                        <option {{$salayeeStyle_id == $salayee->id ? 'selected' : ''}} value="{{ $salayee->id }}">
                                                            {{ $salayee->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('salayeeStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">دکمه</label>
                                                <select disabled name="" wire:model='buttonStyle_id'
                                                    class="w-100  border border-light" id="">
                                                    @foreach ($buttonStyles as $button)
                                                        <option  {{$buttonStyle_id == $button->id ? 'selected' : ''}}value="{{ $button->id }}">
                                                            {{ $button->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('buttonStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">شانه_دیزاین</label>
                                                <select disabled name="" wire:model='shoulderStyle_id'
                                                    class="w-100  border border-light" id="">
                                                    
                                                    @foreach ($shoulderStyles as $shoulder)
                                                        <option {{$shoulderStyle_id == $shoulder->id ? 'selected' : ''}} value="{{ $shoulder->id }}">
                                                            {{ $shoulder->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('shoulderStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">استین</label>
                                                <select disabled name="" wire:model='sleeveStyle_id'
                                                    class="w-100  border border-light" id="">
                                                
                                                    @foreach ($sleeveStyles as $sleeve)
                                                        <option  {{$sleeveStyle_id == $sleeve->id ? 'selected' : ''}}  value="{{ $sleeve->id }}">
                                                            {{ $sleeve->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sleeveStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <label class="form-label" style="width: 100px"
                                                    for="validationCustom02">دهن</label>
                                                <select disabled name="" wire:model='sleeveMouthStyle_id'
                                                    class="w-100  border border-light" id="">
                                                    @foreach ($sleeveMouthStyles as $sleeveMouth)
                                                        <option  {{$sleeveMouthStyle_id == $sleeveMouth->id ? 'selected' : ''}} value="{{ $sleeveMouth->id }}">
                                                            {{ $sleeveMouth->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sleeveMouthStyle_id')
                                                    <span class="text-danger feedBackError">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-check form-switch" dir="ltr">
                                                <input  {{$tombanPocket == "1"? 'checked' : ''}} type="checkbox" wire:model='tombanPocket'
                                                    class="form-check-input" id="customSwitch1">
                                                <label class="form-check-label" for="customSwitch1">جیب تنبان</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-3 p-0 ">
                                            <textarea disabled wire:model='description' name="" rows="13" class="form-control w-100 rounded-0" id="" placeholder="نوټ..."></textarea>
                                        </div>
                                    </div>


                                    <div class="row invoice-pricing pt-2"
                                        style="border-top:1px solid rgb(236, 233, 233); ">
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px"
                                                for="txtQty">تعداد</label>
                                            <input type="number" min="0" value="0"
                                                class="form-control p-1 border-0" id="stxtQty" disabled placeholder="00"
                                                required wire:model='qty'>
                                        </div>
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px" for="txtPrice">نرخ</label>
                                            <input type="number" min="0" value="0"
                                                class="form-control p-1 border-0" id="stxtPrice" disabled placeholder="00"
                                                required wire:model='price'>
                                        </div>
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px" for="txtRakht">رخت</label>
                                            <input type="number" min="0" value="0"
                                                class="form-control p-1 border-0" id="stxtRakht" disabled placeholder="00"
                                                wire:model='rakht'>
                                        </div>
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px" for="txtTotal">جمله</label>
                                            <input type="number" min="0" class="form-control p-1 border-0"
                                                disabled id="stxtTotal" disabled placeholder="00" value="0" required
                                                wire:model='total'>
                                        </div>
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px"
                                                for="txtAdvance">پیشکی</label>
                                            <input type="number" min="0" class="form-control p-1 border-0"
                                                id="stxtAdvance" disabled wire:model='paid' value="0" placeholder="00">
                                        </div>
                                        <div
                                            class="mr-1 d-flex align-items-baseline col-md-4 col-sm-4 col-4 float-right">
                                            <label class="form-label" style="width: 50px"
                                                for="txtBalance">باقی</label>
                                            <input type="number" min="0" class="form-control p-1 border-0"
                                                value="0" disabled id="stxtBalance" placeholder="00" required
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
                <button type="button"  class="btn btn-primary editeBtn"> <i class="uil-edit-alt"></i> </button>
                <input type="submit" disabled class="btn btn-primary" form="formBillShow" value="ذخیره یی کړی" />
                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i
                        class="fa fa-print"></i></a>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $(document).ready(function() {
            $("#stxtQty , #stxtPrice , #stxtRakht , #stxtAdvance").keyup(function(e) {
                        var textQTY = $("#stxtQty").val();
                        var textPrice = $("#stxtPrice").val();
                        var textRakht = $("#stxtRakht").val();
                        var textAdvance = $("#stxtAdvance").val();
                        var total = (parseInt(textQTY) * parseInt(textPrice)) + parseInt(textRakht);
                        var balance = parseInt(total) - parseInt(textAdvance);
                        $("#stxtTotal").val(total);
                        $("#stxtBalance").val(balance);
                    });
            $(".editeBtn").click(function (e) { 
                e.preventDefault();
                $('#formBillShow input,select,input[type="submit"],textarea').attr('disabled',false);
                $(this).hide();
            });
            $("#showBillD").on('show.bs.modal', function() {
                setTimeout(() => {
                    $wire.dispatch('loadBillInfo', {
                        InfoID: showInfoID
                    });
                }, 0);

            });


        });
    </script>
@endscript
