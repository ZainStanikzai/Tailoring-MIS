<?php

namespace App\Livewire\Panths;


use App\Models\Customer;
use Livewire\Component;

use App\Models\Panth;

use App\Models\Staff;

use Illuminate\Support\Facades\DB;

use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ShowBill extends Component
{
    public $panthStyles;
    public $staffs;
    public $lastID;
    public $modelClass;
    public $modelStyle;



    public $customerName;
    public $customerPhone;

    #[Validate('required', message: "خیاط انتخاب کری.")]
    public $sewDate;
    public $height;
    public $souren;
    public $leg;
    public $waist;

    public $qty = 0;
    public $price = 0;
    public $rakht = 0;
    public $paid = 0;
    public $total = 0;
    public $balance = 0;
    public $description;

    #[Validate('required', message: "کارکوونکی انتخاب کری.")]
    public $staff_id;
    public function initData()
    {
        $this->staffs = Staff::latest()->get();
    }
    #[On("loadBillInfo")]
    public function showInf(Panth $InfoID)
    {
        $this->lastID = $InfoID->id;
        $this->customerName = $InfoID->customer_name;
        $this->customerPhone = $InfoID->customer_number;
        $this->staff_id = $InfoID->staff_id;
        $this->height = $InfoID->height;
        $this->waist = $InfoID->waist;
        $this->leg = $InfoID->leg;
        $this->souren = $InfoID->sourin;
        $this->price = $InfoID->price;
        $this->rakht = $InfoID->rakht;
        $this->qty = $InfoID->qty;
        $this->paid = $InfoID->paid;
        $this->balance = $InfoID->balance;
        $this->sewDate = $InfoID->sewDate;
        $this->description = $InfoID->description;
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
    }

    public function update()
    {
        try {
            DB::beginTransaction();
            $object = Panth::findOrFail($this->lastID);
            $this->lastID = $object->id;
            $object->sewDate = $this->sewDate;
            $object->customer_name = $this->customerName;
            $object->customer_number = $this->customerPhone;
            $object->Customer->name = $this->customerName;
            $object->Customer->numbers = $this->customerPhone;
            $object->staff_id = $this->staff_id;
            $object->height = $this->height;
            $object->waist= $this->waist;
            $object->leg= $this->leg;
            $object->sourin= $this->souren;
            $object->price= $this->price;
            $object->rakht= $this->rakht;
            $object->qty =  $this->qty;
            $object->paid = $this->paid;
            $object->balance = (($this->price * $this->qty)+$this->rakht)-$this->paid;
            $object->sewDate= $this->sewDate;
            $object->description =  $this->description;
            $object->save();
            $object->Customer->save();
            $this->dispatch("PanthUpdated");
            session()->flash("success","ok updated");
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            session()->flash("error", $ex);
        }
    }
    public function mount()
    {
        $this->initData();
    }
    public function render()
    {
        return view('livewire.panths.show-bill');
    }
}
