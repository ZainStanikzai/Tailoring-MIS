<?php

namespace App\Livewire;

use App\Models\Cloth;
use App\Models\Customer;
use Livewire\Component;
use App\Models\Neck;
use App\Models\NeckStyleContainer;
use App\Models\shoulder;
use App\Models\ShoulderStyleContainer;
use App\Models\Skirt;
use App\Models\SkirtStyleContainer;
use App\Models\Sleeve;
use App\Models\SleeveStyleContainer;
use App\Models\Staff;
use App\Models\Strip;
use App\Models\StripStyleContainer;
use App\Models\style_buttonStyle;
use App\Models\style_frontpocketStyle;
use App\Models\style_salayeeStyle;
use App\Models\style_sidepocketStyle;
use App\Models\style_sleeveMouthStyle;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class ClothBill extends Component
{
    use WithPagination;

   

   

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

    public $customerID;
    public function searchForCustomer($val){
       
        $customer = Customer::where("id",$val)->orWhere("numbers",$val)->first();
        if(!empty($customer)){
            $this->reset();
            $this->initData();
            $this->customerID = $val;
            $InfoID = Cloth::where("customer_id",$val)->orWhere("customer_number",$val)->first();
            $this->customerName = $customer->name;
            $this->customerPhone = $customer->numbers;           
            if(!empty($InfoID)){
                $this->height = $InfoID->height;
                $this->shoulder = $InfoID->shoulder;
                $this->sleeve = $InfoID->sleeve;
                $this->neck = $InfoID->neck;
                $this->side = $InfoID->side;
                $this->sideDown   = $InfoID->sideDown;
                $this->skirt = $InfoID->skirt;
                $this->tomban = $InfoID->tumban;
                $this->leg  = $InfoID->leg;
    
                $this->staff_id = $InfoID->staff_id;
    
                $this->sidePocketStyle_id =  $InfoID->sidePocketStyle_id;
                $this->frontPocketStyle_id = $InfoID->frontPocketStyle_id;
                $this->salayeeStyle_id = $InfoID->salayeeStyle_id;
                $this->buttonStyle_id = $InfoID->buttonStyle_id;
                $this->sleeveMouthStyle_id = $InfoID->sleeveMouthStyle_id;
                $this->lastID = $InfoID->id;
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
            }else{
                $this->lastID = 1;
            }
        }else{
            $this->reset();
            $this->initData();  
        }
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->resetPage();
       
        
    }
    
    
    public $customerName;
    public $customerPhone;

    #[Validate('required',message:"خیاط انتخاب کری.")]
    public $sewDate;
    public $height;
    public $shoulder;
    public $sleeve;
    public $neck;
    public $side;
    public $sideDown;
    public $skirt;
    public $tomban;
    public $leg;
    public $soreen;
    public $tombanPocket=false;

    public $qty = 0;
    public $price = 0;
    public $rakht = 0;
    public $paid = 0;
    public $total = 0;
    public $balance = 0;
    public $description;

    // #[Validate('required',message:"کارکوونکی انتخاب کری.")]
    public $staff_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $stripStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $neckStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $sidePocketStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $frontPocketStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $skirtStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $salayeeStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $buttonStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $shoulderStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $sleeveStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $sleeveMouthStyle_id;

    public $modelClass;
    public $modelStyle;

    public function initData(){
        $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
        $this->neckStyles = Neck::where("clothing_type","cloth")->latest()->get();
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
        $this->skirtStyles = Skirt::where("clothing_type","cloth")->latest()->get();
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->shoulderStyles = shoulder::where("clothing_type","cloth")->latest()->get();
        $this->sleeveStyles = Sleeve::where("clothing_type","cloth")->latest()->get();
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
        $this->staffs = Staff::latest()->get();


        $this->lastID = Cloth::all()->last();
        if($this->lastID != []){
            $this->lastID = Cloth::all()->last()["id"];

            $this->lastID += 1; 
        }else{
            $this->lastID = 1;    
        }
    }
    #[Url(as: 'q')]
    public $query;
    public function search($term){
        $this->query = $term;
        $this->resetPage();
    }
    public $filter = "all";
    public function showFilter($State){
        $this->filter = $State;
        $this->resetPage();

    }

    public function create(){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();

        try {
            DB::beginTransaction();
            $newRecord = Cloth::create([
                "customer_id"=>$this->customerID,
                "customer_name" =>$this->customerName,
                "customer_number" =>$this->customerPhone,
                "staff_id"=>$this->staff_id,
                "height" =>$this->height,
                "shoulder"=>$this->shoulder,
                "sleeve" =>$this->side,
                "neck" =>$this->neck,
                "side" =>$this->side,
                "sideDown" =>$this->side,
                "skirt" =>$this->skirt,
                "tumban" =>$this->tomban,
                "leg" =>$this->leg,
                "tumbanPocket"=>$this->tombanPocket,
                "sidePocketStyle_id"=>$this->sidePocketStyle_id,
                "frontPocketStyle_id"=>$this->frontPocketStyle_id,
                "salayeeStyle_id"=>$this->salayeeStyle_id,
                "buttonStyle_id"=>$this->buttonStyle_id,
                "sleeveMouthStyle_id"=>$this->sleeveMouthStyle_id,
                "price"=>$this->price,
                "rakht"=>$this->rakht,
                "qty" => $this->qty,
                "paid" =>$this->paid,
                "balance" =>(($this->price * $this->qty)+$this->rakht)-$this->paid,
                "sewDate"=>$this->sewDate,
                "status"=>"new",
                "sewStatus"=>"0",
                "description" => $this->description
            
            ]);

            StripStyleContainer::create(['clothing_id'=>$newRecord->id,'strip_id'=>$this->stripStyle_id,'clothing_type'=>"cloth"]); 
            NeckStyleContainer::create(['clothing_id'=>$newRecord->id,'neck_id'=>$this->neckStyle_id,'clothing_type'=>"cloth"]); 
            SkirtStyleContainer::create(["clothing_id"=>$newRecord->id,"skirt_id"=> $this->skirtStyle_id,'clothing_type'=>"cloth"]);
            ShoulderStyleContainer::create(["clothing_id"=>$newRecord->id, "shoulder_id"=>$this->shoulderStyle_id,'clothing_type'=>"cloth"]);
            SleeveStyleContainer::create(["clothing_id"=>$newRecord->id, "sleeve_id"=>$this->shoulderStyle_id,'clothing_type'=>"cloth"]);
            session()->flash("success","new clothe addedd");
            $this->dispatch("newRecordCreated");
            $this->reset();
            $this->initData();
            $this->resetPage();
            $this->modelClass = "";
            $this->modelStyle = "";
            DB::commit();
            
        } catch (Exception $ex) {
            DB::rollback();
            dd($ex);
            session()->flash("error",$ex);
        }
        $this->reset();
        $this->initData();
    }
    public function delete(Cloth $id){
        try{
            $id->StripStyleContainer->where("clothing_type","cloth")->first()->delete();
            $id->NeckStyleContainer->where("clothing_type","cloth")->first()->delete();
            $id->SkirtStyleContainer->where("clothing_type","cloth")->first()->delete();
            $id->ShoulderStyleContainer->where("clothing_type","cloth")->first()->delete();
            $id->SleeveStyleContainer->where("clothing_type","cloth")->first()->delete();
            $id->delete();
            $id->delete();
            $this->resetPage();
        }catch(Exception $ex){
            session()->flash("error",$ex);
        }
        
    }

    #[On("clothUpdated")]
    public function refreshPage(){
        $this->resetPage();
    }
    public function mount(){
        $this->initData();
    }
    public function render()
    {
        if($this->filter == "Qarze"){
            return view('livewire.cloth-bill',[
                'Cloths'=>Cloth::where("balance","<>","0")->latest()->paginate(50),
                'totalRecord'=>Cloth::where("balance","<>","0")->count(),
                'totalCash' => Cloth::where("balance","<>","0")->sum('paid'),
                'totalBalance'=>Cloth::where("balance","<>","0")->sum('balance')
            ]);
        }else{
            return view('livewire.cloth-bill',[
                'Cloths'=>Cloth::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->latest()->paginate(50),
                'totalRecord'=>Cloth::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->count(),
                'totalCash' => Cloth::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->sum('paid'),
                'totalBalance'=>Cloth::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->sum('balance')
            ]);
        }
    }
}
