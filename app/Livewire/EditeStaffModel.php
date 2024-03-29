<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Staff;
use Livewire\Attributes\Validate;
use Exception;
use Livewire\Attributes\On;
class EditeStaffModel extends Component
{


    public $name;
    public $phone;

    public $modelClass;
    public $modelStyle;
    
    

    public function editeStaff($staffid){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        try {
            $ActiveStaff = Staff::findOrFail($staffid);
            if($this->name != "" || $this->name != null ){
                 $ActiveStaff->name = $this->name;
                 $ActiveStaff->save();
            }
            if($this->phone != "" || $this->phone != null ){
                $ActiveStaff->phone = $this->phone;
                $ActiveStaff->save();
           }
            session()->flash('success', 'د کارکوونکی معلومات بدل شو.');
            $this->dispatch('staffEdited',id:$ActiveStaff->id,name:$ActiveStaff->name,phone:$ActiveStaff->phone);
            $this->reset();
        } catch (Exception $ex) {
            session()->flash('error', $ex);
        }
        
    }
    public function render()
    {
        return view('livewire.edite-staff-model');
    }
}
