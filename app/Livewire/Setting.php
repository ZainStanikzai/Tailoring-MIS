<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

class Setting extends Component
{
    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی')]
    #[Validate('min:3', message: 'نوم باید له ۳ حروفو ډیر وی.')]
    public $name;
    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی')]
    #[Validate('min:5', message: 'یوزرنم باید له ۵ حروفو ډیر وی.')]
    public $username;
    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی.')]
    #[Validate('min:10', message: 'مبایل شماره باید له ۹ حروفو ډیر وی.')]
    #[Validate('numeric', message: 'مهربانی وکړی مبایل شمیره ولیکی')]
    public $phone;
    #[Validate('required', message: 'مهربانی وکړی معلومات ولیکی.')]
    #[Validate('min:5', message: 'ادرس باید له ۵ حروفو ډیر وی.')]
    public $address;
    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->address = Auth::user()->address;
    }

    public function update(User $user)
    {
        $this->validate();
        try {
            $user->name = $this->name;
            $user->email = $this->username;
            $user->phone = $this->phone;
            $user->address = $this->address;
            $user->save();
            session()->flash('success',"ستاسو معلومات بدل سول.");
        } catch (\Illuminate\Database\QueryException $ex) {
             session()->flash('error', $user);
        }

       
    }
    public function render()
    {
        return view('livewire.setting');
    }
}
