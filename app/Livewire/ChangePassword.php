<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی')]
    public $oldPassword;

    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی')]
    #[Validate('min:8', message: 'رمز باید له ۸ حروفو کم نه وی')]
    public $password;

    #[Validate('same:password', message: 'نوی رمز او بیاځلی رمز سره سمون نلری.')]
    public $confirm_password;


    public function update(User $user){
        $this->validate();
        try {
            if(Hash::check($this->oldPassword, $user->password)){
                $user->password = $this->password;
                $user->save();
                session()->flash('success',"ستاسو رمز بدل سو.");
            }else{
                session()->flash('error','ستاسو پخوانی رمز ناسم دی.');
                return 0;
            }
            $this->reset();
        } catch (Exception $ex) {
                session()->flash('error',$ex);
        }
        
       
    }
    public function render()
    {
        return view('livewire.change-password');
    }
}
