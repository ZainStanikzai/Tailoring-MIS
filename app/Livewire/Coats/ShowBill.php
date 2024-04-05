<?php

namespace App\Livewire\Coats;

use App\Models\Coat;
use App\Models\Customer;
use Livewire\Component;
use App\Models\Neck;
use App\Models\NeckStyleContainer;
use App\Models\shoulder;
use App\Models\ShoulderStyleContainer;
use App\Models\Skirt;
use App\Models\SkirtStyleContainer;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\style_coatBackStyle;
use App\Models\style_neckSubStyle;
use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
class ShowBill extends Component
{


    public $neckStyles;
    public $neckSubStyles;
    public $backStyles;
    public $skirtStyles;
    public $shoulderStyles;
    public $staffs;
    public $lastID;
    
    
    public $customerName;
    public $customerPhone;
    #[Validate('required',message:"خیاط انتخاب کری.")]
    public $sewDate;
    
    public $height;
    public $shoulder;
    public $sleeve;
    public $side;
    public $waist;
    public $surren;
    public $cross;
    public $crossSub;

    public $qty = 0;
    public $price = 0;
    public $rakht = 0;
    public $paid = 0;
    public $total = 0;
    public $balance = 0;
    public $description;

    #[Validate('required',message:"کارکوونکی انتخاب کری.")]
    public $staff_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $neckSubStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $neckStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $backStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $skirtStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $shoulderStyle_id;


    public $modelClass;
    public $modelStyle;
    public function initData(){
      
        $this->neckSubStyles = style_neckSubStyle::latest()->get();
        $this->neckStyles = Neck::where("clothing_type","coat")->latest()->get();
        $this->backStyles = style_coatBackStyle::latest()->get();
        $this->skirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
        $this->shoulderStyles = shoulder::where("clothing_type","coat")->latest()->get();
        $this->staffs = Staff::latest()->get();
        $this->lastID = Coat::all()->last();
        if($this->lastID != []){
            $this->lastID = Coat::all()->last()["id"];

            $this->lastID += 1; 
        }else{
            $this->lastID = 1;    
        }
    }
    #[On("loadBillInfo")]
    public function showInf(Coat $InfoID)
    {
                $this->lastID = $InfoID->id;
                $this->sewDate = $InfoID->sewDate;
                $this->customerName = $InfoID->customer_name;
                $this->customerPhone = $InfoID->customer_number;
                $this->staff_id = $InfoID->staff_id;
                $this->height = $InfoID->height;
                $this->shoulder = $InfoID->shoulder;
                $this->sleeve = $InfoID->sleeve;
                $this->side = $InfoID->side;
                $this->waist = $InfoID->waist;
                $this->surren = $InfoID->sourin;
                $this->cross = $InfoID->cross;
                $this->crossSub = $InfoID->crossBig;
                $this->neckSubStyle_id = $InfoID->neckSubStyle_id;
                $this->backStyle_id = $InfoID->backStyle_id;
                $this->price = $InfoID->price;
                $this->rakht = $InfoID->rakht;
                $this->qty = $InfoID->qty;
                $this->paid = $InfoID->paid;
                $this->balance = $InfoID->balance;
                $this->sewDate = $InfoID->sewDate;
                $this->description = $InfoID->description;

                
                try {
                    $this->neckStyle_id = Neck::find($InfoID->NeckStyleContainer->where("clothing_type", "coat")->first()->neck_id)->id;
                } catch (Exception) {
                    $this->neckStyle_id = "";
                }
                try {
                    $this->skirtStyle_id = Skirt::find($InfoID->SkirtStyleContainer->where("clothing_type", "coat")->first()->skirt_id)->id;
                } catch (Exception) {
                    $this->skirtStyle_id = "";
                }
                try {
                    $this->shoulderStyle_id = Shoulder::find($InfoID->ShoulderStyleContainer->where("clothing_type", "coat")->first()->shoulder_id)->id;
                } catch (Exception) {
                    $this->shoulderStyle_id = "";
                }

                $this->modelClass = "show";
                $this->modelStyle = "display: block;";
    }
    public function update(){
        try{
            DB::beginTransaction();
            $object = Coat::findOrFail($this->lastID);
                $this->lastID = $object->id;
                $object->sewDate = $this->sewDate;
                $object->customer_name=$this->customerName;
                $object->customer_number = $this->customerPhone;
                $object->Customer->name = $this->customerName;
                $object->Customer->numbers = $this->customerPhone;
                $object->staff_id = $this->staff_id;
                $object->height = $this->height;
                $object->shoulder = $this->shoulder;
                $object->sleeve = $this->sleeve;
                $object->side = $this->side;
                $object->waist = $this->waist;
                $object->sourin = $this->surren;
                $object->cross = $this->cross;
                $object->crossBig = $this->crossSub;
                $object->neckSubStyle_id = $this->neckSubStyle_id;
                $object->backStyle_id = $this->backStyle_id;
                $object->price = $this->price;
                $object->rakht = $this->rakht;
                $object->qty = $this->qty;
                $object->paid = $this->paid;
                $object->balance =(( $this->price * $this->qty) +   $this->rakht) -  $this->paid ;
                $object->sewDate = $this->sewDate;
                $object->description = $this->description;

                $object->NeckStyleContainer->where("clothing_type","coat")->first()->neck_id = $this->neckStyle_id;
                $object->SkirtStyleContainer->where("clothing_type","coat")->first()->skirt_id = $this->skirtStyle_id;
                $object->ShoulderStyleContainer->where("clothing_type","coat")->first()->shoulder_id = $this->shoulderStyle_id;
            
                $object->NeckStyleContainer->first()->save();
                $object->SkirtStyleContainer->first()->save();
                $object->ShoulderStyleContainer->first()->save();
                $object->Customer->save();
                $object->save();
                $this->dispatch("clothUpdated");
                session()->flash("success","ok updated");

            DB::commit();
        }catch(Exception $ex){
            DB::rollBack();
            dd($ex);
            session()->flash("error",$ex);
        }

    }
    public function mount(){
        $this->initData();
    }
    public function render()
    {
        return view('livewire.coats.show-bill');
    }
}
