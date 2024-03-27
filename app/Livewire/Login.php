<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate; 
use Livewire\Component;
use PDO;


class Login extends Component
{

    #[Validate('required')] 
    public $username;

    #[Validate('required')]
    public $password;

    public $remmberMe;

    public function loginCheck(){
        $this->validate();
        try {
            if(Auth::attempt(['email'=>$this->username,'password'=>$this->password])){
                $user = User::all()->where('email',$this->username)->first();
                Auth::login($user,true);
                return $this->redirect('/');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            session()->flash('error',$ex);
        }
           
        session()->flash('incorrectCredintial', 'incorrect username or password');
        
    }
    public function render()
    {
        return view('livewire.login');
    }
}
