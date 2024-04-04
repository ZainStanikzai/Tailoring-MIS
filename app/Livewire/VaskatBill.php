<?php

namespace App\Livewire;

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
use Livewire\WithPagination;

class VaskatBill extends Component
{

    use WithPagination;

   

   


    public $vasketNeckStyles;
    public $vasketShoulderStyles;
    public $vasketSkirtStyles;
    public $staffs;
    public $vasketLastID;
    public $vasketStyles;  

    public $customerName;
    public $customerPhone;
    #[Validate('required',message:"خیاط انتخاب کری.")]
    public $staff_id;
    public $sewDate;
    public $height;
    public $shoulder;
    public $side;
    public $waist;
    public $neck;
    public $price = 0;
    public $rakht = 0;
    public $qty = 0;
    public $paid = 0;
    public $total = 0;
    public $balance = 0;
    public $description;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $neckStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $shoulderStyle_id;
    #[Validate('required',message:"ستایل انتخاب کری.")]
    public $skirtStyle_id;

    public $modelClass;
    public $modelStyle;

    public function initData(){
        $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
        $this->vasketShoulderStyles = shoulder::where("clothing_type","vasket")->latest()->get();
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->staffs = Staff::latest()->get();
        $this->vasketLastID = Vaskates::all()->last();
        if($this->vasketLastID != []){
            $this->vasketLastID = Vaskates::all()->last()["id"];

            $this->vasketLastID += 1; 
        }else{
            $this->vasketLastID = 1;    
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


    public function creatVasket(){

        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();
        try {
            DB::beginTransaction();
            $newCustomer = Customer::create(['name'=>$this->customerName, 'numbers'=>$this->customerPhone]);
            $newVasket = Vaskates::create([
                "customer_id"=>$newCustomer->id,
                "customer_name" =>$this->customerName,
                "customer_number" =>$this->customerPhone,
                "staff_id"=>$this->staff_id,
                "height" =>$this->height,
                "shoulder"=>$this->shoulder,
                "side" =>$this->side,
                "waist"=>$this->waist,
                "neck" =>$this->neck,
                "price"=>$this->price,
                "rakht"=>$this->rakht,
                "qty" => $this->qty,
                "paid" =>$this->paid,
                "balance" =>(($this->price * $this->qty)+$this->rakht)-$this->paid,
                "sewDate"=>$this->sewDate,
                "status"=>"new",
                "sewStatus"=>"0",
                "description" =>$this->description
            
            ]);
            $createCurrentNeckVasketStyles = NeckStyleContainer::create(['clothing_id'=>$newVasket->id,'neck_id'=>$this->neckStyle_id,'clothing_type'=>"vasket"]); 
            $createCurrentShoulderVasketStyles = ShoulderStyleContainer::create(["clothing_id"=>$newVasket->id, "shoulder_id"=>$this->shoulderStyle_id,'clothing_type'=>"vasket"]);
            $createCurrentSkirtVasketStyles = SkirtStyleContainer::create(["clothing_id"=>$newVasket->id,"skirt_id"=> $this->skirtStyle_id,'clothing_type'=>"vasket"]);
            session()->flash("success","new clothe addedd");
            $this->dispatch("newVasketeAdded");

            
            DB::commit();
            $this->initData();
            $this->resetPage();
            $this->modelClass = "";
            $this->modelStyle = "";
            
            
        } catch (Exception $ex) {
            DB::rollback();
            session()->flash("error",$ex);
        }
    }

    public function delete(Vaskates $vaskateID){
        try{
            $vaskateID->NeckContainer->where("clothing_type","vasket")->first()->delete();
            $vaskateID->NeckContainer->where("clothing_type","vasket")->first()->delete();
            $vaskateID->SkirtContainer->where("clothing_type","vasket")->first()->delete();
            $vaskateID->Customer->delete();
            $vaskateID->delete();
            $this->resetPage();
        }catch(Exception $ex){
            session()->flash("error",$ex);
        }
        
    }

     


    #[On("refreshPageVasket")]
    public function refreshPage(){
        $this->resetPage();
    }
    public function mount(){
        $this->initData();
    }
    public function render()
    {
        if($this->filter == "Qarze"){
            return view('livewire.vaskat-bill',[
                'Vaskates'=>Vaskates::where("balance","<>","0")->latest()->paginate(50),
                'totalRecord'=>Vaskates::where("balance","<>","0")->count(),
                'totalCash' => Vaskates::where("balance","<>","0")->sum('paid'),
                'totalBalance'=>Vaskates::where("balance","<>","0")->sum('balance')
            ]);
        }else{
            return view('livewire.vaskat-bill',[
                'Vaskates'=>Vaskates::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->latest()->paginate(50),
                'totalRecord'=>Vaskates::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->count(),
                'totalCash' => Vaskates::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('paid'),
                'totalBalance'=>Vaskates::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('balance')
            ]);
        }
    }
}
