<?php

namespace App\Livewire;

use App\Models\Cloth;
use App\Models\Coat;
use App\Models\Panth;
use App\Models\Tshirt;
use App\Models\Vaskates;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $Jan, $Feb, $Mar, $Apr, $May, $Jun, $Jul, $Aug, $Sep, $Oct, $Nov, $Dec;

    public function mount()
    {

        $this->Jan  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 1;")[0]->total;
        $this->Jan  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 1;")[0]->total;
        $this->Jan  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 1;")[0]->total;
        $this->Jan  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 1;")[0]->total;
        $this->Jan  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 1;")[0]->total;
        if ($this->Jan == null) {
            $this->Jan = 0;
        }

        $this->Feb  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 2;")[0]->total;
        $this->Feb  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 2;")[0]->total;
        $this->Feb  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 2;")[0]->total;
        $this->Feb  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 2;")[0]->total;
        $this->Feb  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 2;")[0]->total;
        if ($this->Feb == null) {
            $this->Feb = 0;
        }

        $this->Mar  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 3;")[0]->total;
        $this->Mar  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 3;")[0]->total;
        $this->Mar  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 3;")[0]->total;
        $this->Mar  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 3;")[0]->total;
        $this->Mar  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 3;")[0]->total;
        if ($this->Mar == null) {
            $this->Mar = 0;
        }

        $this->Apr  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 4;")[0]->total;
        $this->Apr  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 4;")[0]->total;
        $this->Apr  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 4;")[0]->total;
        $this->Apr  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 4;")[0]->total;
        $this->Apr  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 4;")[0]->total;
        if ($this->Apr == null) {
            $this->Apr = 0;
        }

        $this->May  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 5;")[0]->total;
        $this->May  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 5;")[0]->total;
        $this->May  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 5;")[0]->total;
        $this->May  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 5;")[0]->total;
        $this->May  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 5;")[0]->total;
        if ($this->May == null) {
            $this->May = 0;
        }

        $this->Jun  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 6;")[0]->total;
        $this->Jun  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 6;")[0]->total;
        $this->Jun  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 6;")[0]->total;
        $this->Jun  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 6;")[0]->total;
        $this->Jun  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 6;")[0]->total;
        if ($this->Jun == null) {
            $this->Jun = 0;
        }

        $this->Jul  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 7;")[0]->total;
        $this->Jul  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 7;")[0]->total;
        $this->Jul  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 7;")[0]->total;
        $this->Jul  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 7;")[0]->total;
        $this->Jul  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 7;")[0]->total;
        if ($this->Jul == null) {
            $this->Jul = 0;
        }

        $this->Aug  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 8;")[0]->total;
        $this->Aug  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 8;")[0]->total;
        $this->Aug  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 8;")[0]->total;
        $this->Aug  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 8;")[0]->total;
        $this->Aug  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 8;")[0]->total;
        if ($this->Aug == null) {
            $this->Aug = 0;
        }

        $this->Sep  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 9;")[0]->total;
        $this->Sep  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 9;")[0]->total;
        $this->Sep  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 9;")[0]->total;
        $this->Sep  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 9;")[0]->total;
        $this->Sep  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 9;")[0]->total;
        if ($this->Sep == null) {
            $this->Sep = 0;
        }

        $this->Oct  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 10;")[0]->total;
        $this->Oct  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 10;")[0]->total;
        $this->Oct  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 10;")[0]->total;
        $this->Oct  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 10;")[0]->total;
        $this->Oct  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 10;")[0]->total;
        if ($this->Oct == null) {
            $this->Oct = 0;
        }

        $this->Nov  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 11;")[0]->total;
        $this->Nov  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 11;")[0]->total;
        $this->Nov  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 11;")[0]->total;
        $this->Nov  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 11;")[0]->total;
        $this->Nov  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 11;")[0]->total;
        if ($this->Nov == null) {
            $this->Nov = 0;
        }

        $this->Dec  +=  DB::select("SELECT sum((Cloths.price*cloths.qty)+cloths.rakht) as total FROM cloths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 12;")[0]->total;
        $this->Dec  +=  DB::select("SELECT sum((Vaskates.price*Vaskates.qty)+Vaskates.rakht) as total FROM vaskates where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 12;")[0]->total;
        $this->Dec  +=  DB::select("SELECT sum((Coats.price*Coats.qty)+Coats.rakht) as total FROM coats where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 12;")[0]->total;
        $this->Dec  +=  DB::select("SELECT sum((panths.price*panths.qty)+panths.rakht) as total FROM panths where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 12;")[0]->total;
        $this->Dec  +=  DB::select("SELECT sum((tshirts.price*tshirts.qty)+tshirts.rakht) as total FROM tshirts where YEAR(created_at) = YEAR(CURRENT_TIMESTAMP()) and Month(created_at) = 12;")[0]->total;
        if ($this->Dec == null) {
            $this->Dec =0;
        }
    }
    public $activePanel = "cloth";

    public function render()
    {

        return view('livewire.index', [
            "totalCustomers" => DB::table('customers')->distinct()->count("numbers"),


            "Cloths" => Cloth::where("sewStatus", '0')->latest()->get(),
            "Coats" => Coat::where("sewStatus", '0')->latest()->get(),
            "Vaskets" => Vaskates::where("sewStatus", '0')->latest()->get(),
            "Panths" => Panth::where("sewStatus", '0')->latest()->get(),
            "Tshirts" => Tshirt::where("sewStatus", '0')->latest()->get(),
            "allCloths" => Cloth::where("sewStatus", '0')->count(),
            "allCoats" => Coat::where("sewStatus", '0')->count(),
            "allVaskets" => Vaskates::where("sewStatus", '0')->count(),
            "allPanths" => Panth::where("sewStatus", '0')->count(),
            "allTshirts" => Tshirt::where("sewStatus", '0')->count(),

        ]);
    }
}
