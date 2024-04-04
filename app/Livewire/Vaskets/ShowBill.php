<?php

namespace App\Livewire\Vaskets;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Neck;
use App\Models\NeckStyleContainer;
use App\Models\shoulder;
use App\Models\ShoulderStyleContainer;
use App\Models\Skirt;
use App\Models\SkirtStyleContainer;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Models\Vaskates;
use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ShowBill extends Component
{
    
    public $vasketSelectedID;
    public $vasketNeckStyle;
    public $vasketShoulderStyles;
    public $vasketSkirtStyles;
    public $Staffs;
    public $staff_id;
    public $staff_name;
    public $vasketLastID;

    public $customerName;
    public $customerPhone;
    #[Validate('required',message:"خیاط انتخاب کری.")]
    public $sewDate;
    public $height;
    public $shoulder;
    public $side;
    public $waist;
    public $neck;
    public $price;
    public $rakht;
    public $qty;
    public $paid;
    public $total;
    public $balance;
    public $description;
    
    public $selectNeck;
    public $selectNeck_id;
    public $selectShoulder;
    public $selectShoulder_id;
 
    public $selectSkirt;
    public $selectSkirt_id;

    public $modelClass ="";
    public $modelStyle ="";

   


    public function mount(){
        $this->vasketNeckStyle = Neck::where("clothing_type","vasket")->latest()->get();
        $this->vasketShoulderStyles = shoulder::where("clothing_type","vasket")->latest()->get();
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->Staffs = Staff::latest()->get();
        $this->vasketLastID = 0;
    }
    #[On("loadVasketBillInfo")]
    public function showVasketInf(Vaskates $vasketID){
        $this->modelClass = "show" ;
        $this->modelStyle = "display:block;";
        $this->vasketLastID = $vasketID->id;
        $this->sewDate = $vasketID->sewDate;
        $this->staff_id = $vasketID->staff_id;
        $this->customerName = $vasketID->customer_name;
        $this->customerPhone = $vasketID->customer_number;
        $this->height = $vasketID->height;
        $this->shoulder = $vasketID->shoulder;
        $this->neck = $vasketID->neck;
        $this->side = $vasketID->side;
        $this->waist = $vasketID->waist;
        try{
            $this->selectNeck_id = Neck::find(NeckStyleContainer::where("clothing_id", $vasketID->id)->first()["neck_id"])['id'];
        }catch(Exception){
            $this->selectNeck_id = "";
        }
        try{
            $this->selectShoulder_id = Shoulder::find(ShoulderStyleContainer::where("clothing_id", $vasketID->id)->first()["shoulder_id"])['id'];
        }catch(Exception){
            $this->selectShoulder_id = "";
        }
        try{
            $this->selectSkirt_id = Skirt::find(SkirtStyleContainer::where("clothing_id", $vasketID->id)->first()["skirt_id"])['id'];
        }catch(Exception){
            $this->selectSkirt_id = "";
        }
        $this->description = $vasketID->description;
        $this->qty = $vasketID->qty;
        $this->price = $vasketID->price;
        $this->rakht = $vasketID->rakht;
        $this->paid = $vasketID->paid;
        $this->total = ($vasketID->qty * $vasketID->price) +  $vasketID->rakht;
        $this->balance = $this->total -  $vasketID->paid;
    }
    

    public $newStaff_id;
  
    public $neckStyle_id;
  
    public $shoulderStyle_id;
   
    public $skirtStyle_id;
    public function update(){
        $vasket = Vaskates::findOrFail($this->vasketLastID);
        $vasket->customer_name = $this->customerName;
        $vasket->customer_number = $this->customerPhone;
        $vasket->Customer->name = $this->customerName;
        $vasket->Customer->numbers = $this->customerPhone;
        if($this->newStaff_id != null){
            $vasket->staff_id = $this->newStaff_id;
        }
        $vasket->height =$this->height;
        $vasket->shoulder = $this->shoulder;
        $vasket->side = $this->side;
        $vasket->waist = $this->waist;
        $vasket->neck = $this->neck;
        $vasket->price =$this->price;
        $vasket->rakht = $this->rakht;
        $vasket->qty = $this->qty;
        $vasket->paid =$this->paid;
        $vasket->balance = (($this->price * $this->qty)+$this->rakht)-$this->paid;
        $vasket->description = $this->description;
        if($this->neckStyle_id != null){
            $vasket->NeckContainer->where("clothing_type","vasket")->first()->neck_id = $this->neckStyle_id;
        }
        if($this->shoulderStyle_id != null){
            $vasket->ShoulderContainer->where("clothing_type","vasket")->first()->shoulder_id = $this->shoulderStyle_id;
        }
        if($this->skirtStyle_id != null){
            $vasket->SkirtContainer->where("clothing_type","vasket")->first()->skirt_id = $this->skirtStyle_id;
        }
        $vasket->NeckContainer->first()->Save();
        $vasket->ShoulderContainer->first()->save();
        $vasket->SkirtContainer->first()->save();
        $vasket->Customer->save();
        $vasket->save();
        $this->dispatch("refreshPageVasket");
        session()->flash("success","ok updated");
    }
    public function render()
    {
        return view('livewire.vaskets.show-bill');
    }
}
