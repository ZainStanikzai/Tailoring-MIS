<?php

namespace App\Livewire;

use App\Models\Cloth;
use App\Models\Coat;
use App\Models\Customer as ModelsCustomer;
use App\Models\Panth;
use App\Models\Tshirt;
use App\Models\Vaskates;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;
   public $id,$newID,$searchTerm,$activeTabe = 'infoDetails';
   public $name;
   public $phone;
   
    public function create(){
        try {
            if(ModelsCustomer::find($this->id) == null){
                ModelsCustomer::create(["id"=>$this->id,"name"=>$this->name,"numbers"=>$this->phone]);
                session()->flash("success","created");
                $this->id="";
                $this->name="";
                $this->phone="";
            }else{
                session()->flash("error","Id already exist");
            }
        } catch (Exception $ex) {
            session()->flash("error",$ex);
        }
    } 
    public function update(){
        try {
            $newcustomer = ModelsCustomer::find($this->id);
            
            if($newcustomer != null){
                DB::beginTransaction();
                $newcustomer->name = $this->name;
                $newcustomer->numbers = $this->phone;
                foreach ($newcustomer->Cloth as $value) {
                   $value->customer_name = $this->name;
                   $value->customer_number = $this->phone;
                   $value->save();
                }
                foreach ($newcustomer->Vaskate as $value) {
                    $value->customer_name = $this->name;
                    $value->customer_number = $this->phone;
                    $value->save();
                 }
                foreach ($newcustomer->Coat as $value) {
                    $value->customer_name = $this->name;
                    $value->customer_number = $this->phone;
                    $value->save();
                 }
                 foreach ($newcustomer->Panth as $value) {
                    $value->customer_name = $this->name;
                    $value->customer_number = $this->phone;
                    $value->save();
                 }
                 foreach ($newcustomer->Tshirt as $value) {
                    $value->customer_name = $this->name;
                    $value->customer_number = $this->phone;
                    $value->save();
                 }
                $newcustomer->save();
                session()->flash("success","updated");
                $this->id="";
                $this->name="";
                $this->phone="";
                DB::commit();
            }else{
                

                session()->flash("error","دا ایدی موجود دی. ناسو کولی شی");
            }
        } catch (Exception $ex) {
            session()->flash("error",$ex);
        }
    }
    public function delete(ModelsCustomer $customer){
        try {
            DB::beginTransaction();
            foreach ($customer->Cloth as $value) {
                $value->delete();
            }
            $customer->delete();

            DB::commit();
        } catch (Exception  $ex) {
            DB::rollBack();
            session()->flash("error" , $ex);
        }
        $this->activeTabe = 'infoList';
    }
    public function changeTab($i){
        $this->activeTabe = $i;
    }
    public function mount(){
        $this->newID = ModelsCustomer::max("id");
    }
    public function render()
    {
        return view('livewire.customer',[
            "Customers"=> ModelsCustomer::latest()->paginate(50),
            "customer"=> ModelsCustomer::find($this->id),
            "Cloths" => Cloth::where("customer_id","=","$this->searchTerm")->orWhere("customer_number",'like',"$this->searchTerm")->latest()->get(),
            "Vaskets" => Vaskates::where("customer_id","=","$this->searchTerm")->orWhere("customer_number",'like',"$this->searchTerm")->latest()->get(),
            "Coats" => Coat::where("customer_id","=","$this->searchTerm")->orWhere("customer_number",'like',"$this->searchTerm")->latest()->get(),
            "Panths" => Panth::where("customer_id","=","$this->searchTerm")->orWhere("customer_number",'like',"$this->searchTerm")->latest()->get(),
            "Tshirts" => Tshirt::where("customer_id","=","$this->searchTerm")->orWhere("customer_number",'like',"$this->searchTerm")->latest()->get(),
        ]);
    }
}
