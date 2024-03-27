<div class="my-5 pt-sm-5" style="overflow: hidden !important">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Welcome Back !</h5>
                            
                                @if (session('incorrectCredintial'))
                                   <span class="text-danger" dir="ltr"> {{ session('incorrectCredintial') }} </span>
                                @endif
                                @if (session('error'))
                                   <span class="text-danger" dir="ltr"> {{ session('error') }} </span>
                                @endif
                           
                        </div>
                        <div class="p-2 mt-4">
                            <form wire:submit="loginCheck">

                                <div class="mb-3" dir="ltr">
                                    <label class="form-label" for="username">Username</label>
                                    <input wire:model="username" name="username" type="text" class="form-control"
                                        dir="rtl" id="username" placeholder="Enter username">
                                    @error('username')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3" dir="ltr">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input wire:model="password" type="password" class="form-control" dir="rtl"
                                        id="userpassword" placeholder="Enter password">
                                    @error('password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-3 text-end">
                                   
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="spinner spinner-border spinner-border-sm" wire:loading  ></span>Login 
                                        </div>
                                       
                                    </button>
                                    

                                    
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
