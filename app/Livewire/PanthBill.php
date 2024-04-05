<?php

namespace App\Livewire;


use App\Models\Customer;
use Livewire\Component;

use App\Models\Panth;

use App\Models\Staff;

use Illuminate\Support\Facades\DB;

use Exception;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
class PanthBill extends Component
{
    use WithPagination;
    public $panthStyles; 
    public $staffs;
    public $lastID;
    public $modelClass;
    public $modelStyle;

    
    
    public $customerName;
    public $customerPhone;

    #[Validate('required',message:"خیاط انتخاب کری.")]
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

    #[Validate('required',message:"کارکوونکی انتخاب کری.")]
    public $staff_id;



    public function create(){
        $this->modelClass = "show";
        $this->modelStyle = "display: block;";
        $this->validate();
        try {
            DB::beginTransaction();
            $newCustomer = Customer::create(['name'=>$this->customerName, 'numbers'=>$this->customerPhone]);
            $newRecord = Panth::create([
                "customer_id"=>$newCustomer->id,
                "customer_name" =>$this->customerName,
                "customer_number" =>$this->customerPhone,
                "staff_id"=>$this->staff_id,
                "height" =>$this->height,
                "waist"=>$this->waist,
                "leg"=>$this->leg,
                "sourin"=>$this->souren,
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
            session()->flash("success","new clothe addedd");
            $this->dispatch("newRecordCreated");
            $this->initData();
            $this->modelClass = "";
            $this->modelStyle = "";
            DB::commit();
        } catch (Exception $ex) {
            session()->flash("error",$ex);
            dd($ex);
            DB::rollBack();
        }
    }
    
    public function initData(){
        $this->staffs = Staff::latest()->get();

        $this->lastID = Panth::all()->last();
        if($this->lastID != []){
            $this->lastID = Panth::all()->last()["id"];

            $this->lastID += 1; 
        }else{
            $this->lastID = 1;    
        }
    }
    public function delete(Panth $id){
        try{
            DB::beginTransaction();
            $id->Customer->delete();
            $id->delete();
            DB::commit();
            $this->resetPage();
            session()->flash("success","دیلیت شو.");

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
    #[On("PanthUpdated")]
    public function refreshPage(){
        $this->resetPage();
    }
    public function mount(){
        $this->initData();
    }
    public function render()
    {
 
        if($this->filter == "Qarze"){
            return view('livewire.panth-bill',[
                'Panths'=>Panth::where("balance","<>","0")->latest()->paginate(50),
                'totalRecord'=>Panth::where("balance","<>","0")->count(),
                'totalCash' => Panth::where("balance","<>","0")->sum('paid'),
                'totalBalance'=>Panth::where("balance","<>","0")->sum('balance')
            ]);
        }else{
            return view('livewire.panth-bill',[
                'Panths'=>Panth::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->latest()->paginate(50),
                'totalRecord'=>Panth::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->count(),
                'totalCash' => Panth::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('paid'),
                'totalBalance'=>Panth::where("customer_number","like","%$this->query%")->orWhere("customer_name","like", "%$this->query%")->sum('balance')
            ]);
        }
    }
}
