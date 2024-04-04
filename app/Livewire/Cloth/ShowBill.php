<?php

namespace App\Livewire\Cloth;

use App\Models\Cloth;

use Livewire\Component;
use App\Models\Neck;

use App\Models\shoulder;

use App\Models\Skirt;

use App\Models\Sleeve;

use App\Models\Staff;
use App\Models\Strip;

use App\Models\style_buttonStyle;
use App\Models\style_frontpocketStyle;
use App\Models\style_salayeeStyle;
use App\Models\style_sidepocketStyle;
use App\Models\style_sleeveMouthStyle;
use Illuminate\Support\Facades\DB;

use Exception;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
class ShowBill extends Component
{
    public $clothStyles;
    public $stripStyles;
    public $neckStyles;
    public $sidePocketStyles;
    public $frontPocketStyles;
    public $skirtStyles;
    public $salayeeStyles;
    public $buttonStyles;
    public $shoulderStyles;
    public $sleeveStyles;
    public $sleeveMouthStyles;
    public $staffs;

    public $lastID;


    public $customerName;
    public $customerPhone;

    #[Validate('required', message: "خیاط انتخاب کری.")]
    public $sewDate;
    public $height;
    public $shoulder;
    public $sleeve;
    public $neck;
    public $side;
    public $sideDown;
    public $skirt;
    public $surren;
    public $tomban;
    public $leg;
    public $soreen;
    public $tombanPocket = 0;

    public $qty = 0;
    public $price = 0;
    public $rakht = 0;
    public $paid = 0;
    public $total = 0;
    public $balance = 0;
    public $description = "HELLO";

    #[Validate('required', message: "کارکوونکی انتخاب کری.")]
    public $staff_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $stripStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $neckStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $sidePocketStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $frontPocketStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $skirtStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $salayeeStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $buttonStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $shoulderStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $sleeveStyle_id;
    #[Validate('required', message: "ستایل انتخاب کری.")]
    public $sleeveMouthStyle_id;

    public $modelClass;
    public $modelStyle;

    #[On("loadBillInfo")]
    public function showInf(Cloth $InfoID)
    {
        $this->lastID = $InfoID->id;
        $this->sewDate = $InfoID->sewDate;
        $this->customerName = $InfoID->customer_name;
        $this->customerPhone = $InfoID->customer_number;
        $this->height = $InfoID->height;
        $this->shoulder = $InfoID->shoulder;
        $this->sleeve = $InfoID->sleeve;
        $this->neck = $InfoID->neck;
        $this->side = $InfoID->side;
        $this->sideDown   = $InfoID->sideDown;
        $this->skirt = $InfoID->skirt;
        $this->surren = $InfoID->surren;
        $this->tomban = $InfoID->tumban;
        $this->leg  = $InfoID->leg;
        $this->soreen = $InfoID->surren;
        $this->tombanPocket = $InfoID->tumbanPocket;
        $this->qty  = $InfoID->qty;
        $this->price  = $InfoID->price;
        $this->rakht  = $InfoID->rakht;
        $this->paid  = $InfoID->paid;
        $this->total   = $InfoID->qty * $InfoID->price + $InfoID->rakht;
        $this->balance = $InfoID->balance;
        $this->description = $InfoID->description;
        $this->staff_id = $InfoID->staff_id;

        $this->sidePocketStyle_id =  $InfoID->sidePocketStyle_id;
        $this->frontPocketStyle_id = $InfoID->frontPocketStyle_id;
        $this->salayeeStyle_id = $InfoID->salayeeStyle_id;
        $this->buttonStyle_id = $InfoID->buttonStyle_id;
        $this->sleeveMouthStyle_id = $InfoID->sleeveMouthStyle_id;
        try {
            $this->stripStyle_id = Strip::find($InfoID->StripStyleContainer->where("clothing_type", "cloth")->first()->strip_id)->id;
        } catch (Exception) {
            $this->stripStyle_id = "";
        }
        try {
            $this->neckStyle_id = Neck::find($InfoID->NeckStyleContainer->where("clothing_type", "cloth")->first()->neck_id)->id;
        } catch (Exception) {
            $this->neckStyle_id = "";
        }
        try {
            $this->skirtStyle_id = Skirt::find($InfoID->SkirtStyleContainer->where("clothing_type", "cloth")->first()->skirt_id)->id;
        } catch (Exception) {
            $this->skirtStyle_id = "";
        }
        try {
            $this->shoulderStyle_id = Shoulder::find($InfoID->ShoulderStyleContainer->where("clothing_type", "cloth")->first()->shoulder_id)->id;
        } catch (Exception) {
            $this->shoulderStyle_id = "";
        }
        try {
            $this->sleeveStyle_id = Sleeve::find($InfoID->SleeveStyleContainer->where("clothing_type", "cloth")->first()->sleeve_id)->id;
        } catch (Exception) {
            $this->sleeveStyle_id = "";
        }


        $this->modelClass = "show";
        $this->modelStyle = "display:block";
    }
    public function update(){
        try{
            DB::beginTransaction();
            $object = Cloth::findOrFail($this->lastID);
            $object->staff_id = $this->staff_id;
            $object->customer_name = $this->customerName;
            $object->customer_number = $this->customerPhone;
            $object->Customer->name = $this->customerName;
            $object->Customer->numbers = $this->customerPhone;
            $object->height = $this->height;
            $object->shoulder = $this->shoulder;
            $object->sleeve = $this->sleeve;
            $object->neck = $this->neck;
            $object->side = $this->side;
            $object->sideDown = $this->sideDown;
            $object->skirt = $this->skirt;
            $object->tumban = $this->tomban;
            $object->leg = $this->leg;
            $object->surren = $this->soreen;
            $object->tumbanPocket = $this->tombanPocket;
            $object->sidePocketStyle_id = $this->sidePocketStyle_id;
            $object->frontPocketStyle_id = $this->frontPocketStyle_id;
            $object->salayeeStyle_id = $this->salayeeStyle_id;
            $object->buttonStyle_id = $this->buttonStyle_id;
            $object->sleeveMouthStyle_id = $this->sleeveMouthStyle_id;
            $object->price = $this->price;
            $object->rakht = $this->rakht;
            $object->qty = $this->qty;
            $object->paid = $this->paid;
            $object->balance = (($this->price * $this->qty)+$this->rakht)-$this->paid;
            $object->status ="new";
            $object->sewStatus ="0";
            $object->description =$this->description;
    
            $object->StripStyleContainer->where("clothing_type","cloth")->first()->strip_id = $this->stripStyle_id;
            $object->NeckStyleContainer->where("clothing_type","cloth")->first()->neck_id = $this->neckStyle_id;
            $object->SkirtStyleContainer->where("clothing_type","cloth")->first()->skirt_id = $this->skirtStyle_id;
            $object->ShoulderStyleContainer->where("clothing_type","cloth")->first()->shoulder_id = $this->shoulderStyle_id;
            $object->SleeveStyleContainer->where("clothing_type","cloth")->first()->sleeve_id = $this->sleeveStyle_id;
        
            $object->StripStyleContainer->first()->Save();
            $object->NeckStyleContainer->first()->save();
            $object->SkirtStyleContainer->first()->save();
            $object->ShoulderStyleContainer->first()->save();
            $object->SleeveStyleContainer->first()->save();
            $object->Customer->save();
            $object->save();
            $this->dispatch("clothUpdated");
            session()->flash("success","ok updated");



            DB::commit();

        }catch(Exception $ex){
            DB::rollback();
            dd($ex);
            session()->flash("error",$ex);
            
        }
       
        
        
    }
    public function mount()
    {
        $this->stripStyles = Strip::where("clothing_type", "cloth")->latest()->get();
        $this->neckStyles = Neck::where("clothing_type", "cloth")->latest()->get();
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
        $this->skirtStyles = Skirt::where("clothing_type", "cloth")->latest()->get();
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->shoulderStyles = shoulder::where("clothing_type", "cloth")->latest()->get();
        $this->sleeveStyles = Sleeve::where("clothing_type", "cloth")->latest()->get();
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
        $this->staffs = Staff::latest()->get();
    }
    public function render()
    {
        return view('livewire.cloth.show-bill');
    }
}
