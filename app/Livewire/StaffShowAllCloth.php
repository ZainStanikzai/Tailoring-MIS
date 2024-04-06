<?php

namespace App\Livewire;

use App\Models\Cloth;
use App\Models\Coat;
use App\Models\Panth;
use App\Models\Staff;
use App\Models\Tshirt;
use App\Models\Vaskates;
use Livewire\Component;

class StaffShowAllCloth extends Component
{
    public $ActiveStaff;
    public $activePanel = "cloth";
    public function mount($id){
        $this->ActiveStaff = Staff::findOrFail($id);
    }
    public function showClothInfo($path){
       return redirect("/$path/07890");
    }
   
    public function completed($id , $object){ 
        $record="";
        if($object == "cloth"){
            $record = Cloth::find($id);
            $this->activePanel="cloth";
        }
        if($object == "vasket"){
            $record = Vaskates::find($id);
            $this->activePanel="vasket";
        }
        if($object == "coat"){
            $record = Coat::find($id);
            $this->activePanel="coat";
        }
        if($object == "panth"){
            $record = Panth::find($id);
            $this->activePanel="panth";
        }
        if($object == "tshirt"){
            $record = Tshirt::find($id);
            $this->activePanel="tshirt";
        }

        $record->sewStatus = "1";
        $record->save();
    }
    public function render()
    {
        return view('livewire.staff-show-all-cloth',[
            "Cloths"=> Cloth::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->latest()->get(),
            "Coats"=> Coat::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->latest()->get(),
            "Vaskets"=> Vaskates::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->latest()->get(),
            "Panths"=> Panth::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->latest()->get(),
            "Tshirts"=> Tshirt::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->latest()->get(),
            "allCloths"=> Cloth::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->count(),
            "allCoats"=> Coat::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->count(),
            "allVaskets"=> Vaskates::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->count(),
            "allPanths"=> Panth::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->count(),
            "allTshirts"=> Tshirt::where("staff_id",$this->ActiveStaff->id)->where("sewStatus","0")->count(),


        ]);
    }
}
