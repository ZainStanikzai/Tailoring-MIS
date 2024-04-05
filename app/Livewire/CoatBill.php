<?php

namespace App\Livewire;


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
class CoatBill extends Component
{
    use WithPagination;

    public $coatStyles; 

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
    public function create(){

        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
       
        $this->validate();

        try {
            DB::beginTransaction();
            $newCustomer = Customer::create(['name'=>$this->customerName, 'numbers'=>$this->customerPhone]);
            $newRecord = Coat::create([
                "customer_id"=>$newCustomer->id,
                "customer_name" =>$this->customerName,
                "customer_number" =>$this->customerPhone,
                "staff_id"=>$this->staff_id,
                "height" =>$this->height,
                "shoulder"=>$this->shoulder,
                "sleeve" =>$this->sleeve,
                "side" =>$this->side,
                "waist" =>$this->waist,
                "sourin" =>$this->surren,
                "cross" =>$this->cross,
                "crossBig" =>$this->crossSub,
                "neckSubStyle_id" =>$this->neckSubStyle_id,
                "backStyle_id" =>$this->backStyle_id,
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


            NeckStyleContainer::create(['clothing_id'=>$newRecord->id,'neck_id'=>$this->neckStyle_id,'clothing_type'=>"coat"]); 
            SkirtStyleContainer::create(["clothing_id"=>$newRecord->id,"skirt_id"=> $this->skirtStyle_id,'clothing_type'=>"coat"]);
            ShoulderStyleContainer::create(["clothing_id"=>$newRecord->id, "shoulder_id"=>$this->shoulderStyle_id,'clothing_type'=>"coat"]);
          
            session()->flash("success","new coat addedd");
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
    }
    public function delete(Coat $id){
        try{
            DB::beginTransaction();
            $id->NeckStyleContainer->where("clothing_type","coat")->first()->delete();
            $id->SkirtStyleContainer->where("clothing_type","coat")->first()->delete();
            $id->ShoulderStyleContainer->where("clothing_type","coat")->first()->delete();
            $id->Customer->delete();
            $id->delete();
            DB::commit();
            $this->resetPage();

        }catch(Exception $ex){
            DB::rollBack();
            session()->flash("error",$ex);
        }
        
    }
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
            return view('livewire.coat-bill',[
                'Coats'=>Coat::where("balance","<>","0")->latest()->paginate(50),
                'totalRecord'=>Coat::where("balance","<>","0")->count(),
                'totalCash' => Coat::where("balance","<>","0")->sum('paid'),
                'totalBalance'=>Coat::where("balance","<>","0")->sum('balance')
            ]);
        }else{
            return view('livewire.coat-bill',[
                'Coats'=>Coat::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->latest()->paginate(50),
                'totalRecord'=>Coat::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->count(),
                'totalCash' => Coat::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('paid'),
                'totalBalance'=>Coat::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('balance')
            ]);
        }
    }
}
