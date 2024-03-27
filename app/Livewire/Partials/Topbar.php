<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Topbar extends Component
{

    
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function render()
    {
        return view('livewire.partials.topbar');
    }
}
