<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Staff as ModelsStaff;
use Livewire\Attributes\On;


class DeleteStaff extends Component
{
    #[On('deleteStaff')]
    public function deleteStaff($clickedStaff){
        // dd($clickedStaff);
        $staff = ModelsStaff::find($clickedStaff);
        $staffActiveId = $staff->id;
        $staff->delete();
        $this->dispatch('staffDeleted',id:$staffActiveId);
    }
    public function render()
    {
        return view('livewire.delete-staff');
    }
}
