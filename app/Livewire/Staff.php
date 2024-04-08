<?php

namespace App\Livewire;

use App\Models\Salary;
use App\Models\Staff as ModelsStaff;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Staff extends Component
{
  
    use WithPagination;
    #[Validate('required', message: 'د کارکوونکی نوم ولیکی.')]
    #[Validate('min:3', message: 'نوم باید له ۳ حروفو کم نه وی.')]
    public $name;

    #[Validate('required', message: 'د کارکوونکی نمبر ولیکی.')]
    #[Validate('min:10', message: 'نمبر باید له ۱۰ عددو کم نه وی.')]
    public $phone;
    public $modelClass;
    public $modelStyle;

    public function create(){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();
        try {
           $newStaff = ModelsStaff::create(['name' => $this->name, 'phone' => $this->phone, 'salary' => 0]);
            session()->flash('success', 'نوی کارکوونکی سیستم ته اضافه شو.');
            $this->modelClass = "";
            $this->modelStyle = "";
            $this->dispatch("newRecordAdded");
        } catch (Exception $ex) {
            session()->flash('error', $ex);
        }
    }
    public function delete(ModelsStaff $staff){
        try{
            Salary::where("staff_id",$staff->id)->delete();
            $staff->delete();
        }catch(Exception $ex){
            dd($ex);
            session()->flash("error",$ex);
        }
    }
    #[On('staffUpdated')]
    public function refreshPage(){
        $this->resetPage();
    }
    #[On('salaryAdded')]
    public function refreshPageS(){
        $this->resetPage();
    }
    public $query;
    public function search($term){
        $this->query = $term;
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.staff',[
            'Staffs' => ModelsStaff::where("id",'=',"$this->query")->orWhere("phone",'like',"$this->query%")->orWhere("name",'like',"%$this->query%")->latest()->paginate(50),
        ]);
    }
}
