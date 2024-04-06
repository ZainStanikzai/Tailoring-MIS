<?php

namespace App\Livewire;

use App\Models\Staff as ModelsStaff;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
class Staff extends Component
{
  
    
    
    public function render()
    {
        return view('livewire.staff',[
            'Staffs' => ModelsStaff::latest()->get(),
            ''
        ]);
    }
}
