<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class StaffShowAllCloth extends Component
{
    public $ActiveStaff;
    public function mount($id){
        $this->ActiveStaff = Staff::findOrFail($id);
        // dd( $this->ActiveStaff);
    }
    public function render()
    {
        return view('livewire.staff-show-all-cloth');
    }
}
