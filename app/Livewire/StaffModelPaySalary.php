<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Staff as ModelsStaff;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class StaffModelPaySalary extends Component
{

    #[Validate('required')]
    public $amount;



    public $staffId;

    public $modelClass;
    public $modelStyle;
    #[On("loadStaffInfoID")]
    public function loadStaffInfoID($InfoID){
        $this->staffId = $InfoID;
    }

    public function updateSalary()
    {
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();

        try {
            $staff = ModelsStaff::find($this->staffId);
            DB::beginTransaction();
            $staffSalary = Salary::create(["staff_id" => $staff->id, "amount" => $this->amount]);

            $staffOldSalary = $staff->salary;
            $newSalary = $staffOldSalary + $this->amount;

            $staff->salary = $newSalary;
            $staff->save();

            session()->flash('success', "salary updated");
            $this->dispatch('salaryAdded');
            $this->reset();
            DB::commit();
        } catch (Exception $ex) {
            session()->flash('success', $ex);
        }
    }

    public function render()
    {
        return view('livewire.staff-model-pay-salary');
    }
}
