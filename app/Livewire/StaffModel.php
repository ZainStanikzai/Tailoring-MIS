<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Staff as ModelsStaff;
use Livewire\Attributes\Validate;
use Exception;

class StaffModel extends Component
{
    #[Validate('required', message: 'د کارکوونکی نوم ولیکی.')]
    #[Validate('min:3', message: 'نوم باید له ۳ حروفو کم نه وی.')]
    public $name;

    #[Validate('required', message: 'د کارکوونکی نمبر ولیکی.')]
    #[Validate('min:10', message: 'نمبر باید له ۱۰ عددو کم نه وی.')]
    public $phone;

    // #[Validate('required', message: 'د معاش اندازه ولیکی.')]
    // #[Validate('min:2', message: 'معاش باید له ۲ عددو کم نه وی.')]
    // public $salaryAmount;

    public $modelClass;
    public $modelStyle;
    
    public $Staffs;
    public function mount(){
        $this->Staffs =  ModelsStaff::latest()->get();
    }
    public function create()
    {
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();
        try {
           $newStaff = ModelsStaff::create(['name' => $this->name, 'phone' => $this->phone, 'salary' => 0]);
            session()->flash('success', 'نوی کارکوونکی سیستم ته اضافه شو.');
        } catch (Exception $ex) {
            session()->flash('error', $ex);
        }
        $this->reset();
        $this->dispatch('staffCreated', id:$newStaff->id,name:$newStaff->name,phone:$newStaff->phone,created_at:$newStaff->created_at);
    }
    
    public function edite($id){
        dd($id);
    }
    public function render()
    {
        return view('livewire.staff-model');
    }
}
