<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Staff as ModelsStaff;
use Exception;
class StaffModelPaySalary extends Component
{

    #[Validate('required')]
    public $amount;



    public $staffId;

    public $modelClass;
    public $modelStyle;

    public function updateSalary(ModelsStaff $staff){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();
        $staffOldSalary = $staff->salary;
        $newSalary = $staffOldSalary+$this->amount;
        $staff->salary = $newSalary;
        $staff->save();
        session()->flash('success', "salary updated");
        $this->dispatch('salaryAdedd',id:$staff->id,salary:$this->amount);
        $this->reset();
        
    }

    public function render()
    {
        return view('livewire.staff-model-pay-salary');
    }
}
