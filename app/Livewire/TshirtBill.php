<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Neck;
use App\Models\NeckStyleContainer;
use Livewire\Attributes\Url;
use App\Models\shoulder;
use App\Models\ShoulderStyleContainer;
use App\Models\Skirt;
use App\Models\SkirtStyleContainer;
use App\Models\Sleeve;
use App\Models\SleeveStyleContainer;
use App\Models\Staff;
use App\Models\Strip;
use App\Models\StripStyleContainer;

use App\Models\Tshirt;
use Illuminate\Support\Facades\DB;

use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class TshirtBill extends Component
{
    use WithPagination;


    public $skirtStyles;
    public $neckStyles;
    public $sleeveStyles;
    public $stripStyles;
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
    public $waist;
    public $sideDown;
    public $skirt;
    public $neck;

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
    public $skirtStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $shoulderStyle_id;
    // #[Validate('required',message:"ستایل انتخاب کری.")]
    public $sleeveStyle_id;
   
    public $modelClass;
    public $modelStyle;


    public $customerID;
    public function searchForCustomer($val){
       
        $customer = Customer::where("id",$val)->orWhere("numbers",$val)->first();
        if(!empty($customer)){
            $this->reset();
            $this->initData();
            $this->customerID = $val;
            $InfoID = Tshirt::where("customer_id",$val)->orWhere("customer_number",$val)->first();
            $this->customerName = $customer->name;
            $this->customerPhone = $customer->numbers;           
            if(!empty($InfoID)){
                $this->lastID = $InfoID->id;
                $this->staff_id = $InfoID->staff_id;
                $this->height = $InfoID->height;
                $this->shoulder = $InfoID->shoulder;
                $this->sleeve = $InfoID->sleeve;
                $this->waist = $InfoID->waist;
                $this->sideDown   = $InfoID->sideDown;
                $this->skirt = $InfoID->skirt;
                $this->neck = $InfoID->neck;
               
                try {
                    $this->stripStyle_id = Strip::find($InfoID->StripStyleContainer->where("clothing_type", "tshirt")->first()->strip_id)->id;
                } catch (Exception) {
                    $this->stripStyle_id = "";
                }
                try {
                    $this->neckStyle_id = Neck::find($InfoID->NeckStyleContainer->where("clothing_type", "tshirt")->first()->neck_id)->id;
                } catch (Exception) {
                    $this->neckStyle_id = "";
                }
                try {
                    $this->skirtStyle_id = Skirt::find($InfoID->SkirtStyleContainer->where("clothing_type", "tshirt")->first()->skirt_id)->id;
                } catch (Exception) {
                    $this->skirtStyle_id = "";
                }
                try {
                    $this->shoulderStyle_id = Shoulder::find($InfoID->ShoulderStyleContainer->where("clothing_type", "tshirt")->first()->shoulder_id)->id;
                } catch (Exception) {
                    $this->shoulderStyle_id = "";
                }
                try {
                    $this->sleeveStyle_id = Sleeve::find($InfoID->SleeveStyleContainer->where("clothing_type", "tshirt")->first()->sleeve_id)->id;
                } catch (Exception) {
                    $this->sleeveStyle_id = "";
                }    
            }else{
                $this->lastID = 1;
            }
        }else{
            $this->reset();
            $this->initData();  
            session()->flash("error","په دی نمبر مشتری وجود نلری."); 
        }
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->resetPage();
       
        
    }


    public function initData(){
        $this->skirtStyles = Skirt::where("clothing_type","tshirt")->latest()->get();
        $this->neckStyles = Neck::where("clothing_type","tshirt")->latest()->get();
        $this->sleeveStyles = Sleeve::where("clothing_type","tshirt")->latest()->get();
        $this->stripStyles = Strip::where("clothing_type","tshirt")->latest()->get();
        $this->shoulderStyles = shoulder::where("clothing_type","tshirt")->latest()->get();
        $this->staffs = Staff::latest()->get();


        $this->lastID = Tshirt::all()->last();
        if($this->lastID != []){
            $this->lastID = Tshirt::all()->last()["id"];

            $this->lastID += 1; 
        }else{
            $this->lastID = 1;    
        }
    }
    public function create(){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
       
        $this->validate();
        try {
            DB::beginTransaction();
        
            $newRecord = Tshirt::create([
                "customer_id"=>$this->customerID,
                "customer_name" =>$this->customerName,
                "customer_number" =>$this->customerPhone,
                "staff_id"=>$this->staff_id,
                "height" =>$this->height,
                "shoulder" =>$this->shoulder,
                "sleeve" =>$this->sleeve,
                "sideDown" =>$this->sideDown,
                "skirt" =>$this->skirt,
                "height" =>$this->height,
                "neck" =>$this->neck,
                "price" =>$this->price,
                "rakht" =>$this->rakht,
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
            StripStyleContainer::create(['clothing_id'=>$newRecord->id,'strip_id'=>$this->stripStyle_id,'clothing_type'=>"tshirt"]); 
            NeckStyleContainer::create(['clothing_id'=>$newRecord->id,'neck_id'=>$this->neckStyle_id,'clothing_type'=>"tshirt"]); 
            SkirtStyleContainer::create(["clothing_id"=>$newRecord->id,"skirt_id"=> $this->skirtStyle_id,'clothing_type'=>"tshirt"]);
            ShoulderStyleContainer::create(["clothing_id"=>$newRecord->id, "shoulder_id"=>$this->shoulderStyle_id,'clothing_type'=>"tshirt"]);
            SleeveStyleContainer::create(["clothing_id"=>$newRecord->id, "sleeve_id"=>$this->sleeveStyle_id,'clothing_type'=>"tshirt"]);
            session()->flash("success","new clothe addedd");
            $this->dispatch("newRecordCreated");
            $this->reset();
            $this->initData();
            $this->resetPage();
            $this->modelClass = "";
            $this->modelStyle = "";
            DB::commit();
        } catch (Exception $ex) {
           DB::rollBack();
           session()->flash("error",$ex);
        }
    }
    public function delete(Tshirt $id){
        try{
            DB::beginTransaction();
            $id->StripStyleContainer->where("clothing_type","tshirt")->first()->delete();
            $id->NeckStyleContainer->where("clothing_type","tshirt")->first()->delete();
            $id->SkirtStyleContainer->where("clothing_type","tshirt")->first()->delete();
            $id->ShoulderStyleContainer->where("clothing_type","tshirt")->first()->delete();
            $id->SleeveStyleContainer->where("clothing_type","tshirt")->first()->delete();
           
            $id->delete();
            DB::commit();
            $this->resetPage();
        }catch(Exception $ex){
            DB::rollBack();
            session()->flash("error",$ex);
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
    #[On("tshirtUpdated")]
    public function refreshPage(){
        $this->resetPage();
    }
    public function mount(){
        $this->initData();
    }
    public function render()
    {
        if($this->filter == "Qarze"){
            return view('livewire.tshirt-bill',[
                'Tshirts'=>Tshirt::where("balance","<>","0")->latest()->paginate(50),
                'totalRecord'=>Tshirt::where("balance","<>","0")->count(),
                'totalCash' => Tshirt::where("balance","<>","0")->sum('paid'),
                'totalBalance'=>Tshirt::where("balance","<>","0")->sum('balance')
            ]);
        }else{
            return view('livewire.tshirt-bill',[
                'Tshirts'=>Tshirt::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->latest()->paginate(50),
                'totalRecord'=>Tshirt::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->count(),
                'totalCash' => Tshirt::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->sum('paid'),
                'totalBalance'=>Tshirt::where("customer_number","like","$this->query%")->orWhere("customer_name","like", "%$this->query%")->orWhere("customer_id","like", "$this->query")->sum('balance')
            ]);
        }
    }
}
