<?php

namespace App\Livewire;

use App\Models\Neck;
use App\Models\shoulder;
use App\Models\Skirt;
use App\Models\Sleeve;
use App\Models\Strip;
use App\Models\style_buttonStyle;
use App\Models\style_coatBackStyle;
use App\Models\style_frontpocketStyle;
use App\Models\style_neckSubStyle;
use App\Models\style_salayeeStyle;
use Livewire\Component;
use App\Models\style_sidepocketStyle;
use App\Models\style_sleeveMouthStyle;

class Style extends Component
{
    // setting
    public $activeTabe = "cloth";
    public $activePane = "strip";
// ------------------------------------------
    // styles 
    public $stripStyles;
    public $neckStyles;
    public $buttonStyles;
    public $sidePocketStyles;
    public $frontPocketStyles;
    public $skirtStyles;
    public $sleeveMouthStyles;
    public $salayeeStyles;
    public $shoulderStyles;
    public $sleeveStyles;
//--------------------------------------------------
    // strip opration
    public $stripStyleOp = "create";
    public $stripStyleIdToEdit;
    public $stripinputText = "";
    // neck opration
    public $neckStyleOp = "create";
    public $neckStyleIdToEdit;
    public $neckinputText = "";
    // button oprition
    public $buttonStyleOp = "create";
    public $buttonStyleIdToEdit;
    public $buttoninputText = "";
    // oprations side pocket
    public $StyleOp = "create";
    public $StyleIdToEdit;
    public $inputText = "";
    // oprations front pocket
    public $frontStyleOp = "create";
    public $frontStyleIdToEdit;
    public $frontinputText = "";
    // oprations Skirt
    public $skirtStyleOp = "create";
    public $skirtStyleIdToEdit;
    public $skirtinputText = "";
    //  opration sleeve Mouth
    public $sleeveMouthStyleOp = "create";
    public $sleeveMouthStyleIdToEdit;
    public $sleeveMouthinputText = "";
    // opration salayee
    public $salayeeStyleOp = "create";
    public $salayeeStyleIdToEdit;
    public $salayeeinputText = "";
    // opration shoulder
    public $shoulderStyleOp = "create";
    public $shoulderStyleIdToEdit;
    public $shoulderinputText = "";
    // opration sleeve
    public $sleeveStyleOp = "create";
    public $sleeveStyleIdToEdit;
    public $sleeveinputText = "";
//    ----------------------------------------------------------------
 


   
// cloths styles

    //strip style
   
    public function stripCreate()
    {

        if ($this->stripinputText != "") {
            Strip::create(["name" => $this->stripinputText,'clothing_type'=>"cloth"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "strip";
        $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
        $this->stripinputText = "";
    }
    public function stripReadyToEdite($styleId)
    {
        $this->stripStyleIdToEdit = $styleId;
        $this->stripinputText = Strip::find($styleId)['name'];
        $this->stripStyleOp = "update";
        $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "strip";
    }
    public function stripEdite()
    {
        $currentStyle = Strip::find($this->stripStyleIdToEdit);

        if ($this->stripinputText != "") {
            $currentStyle->name = $this->stripinputText;
            $currentStyle->save();
            $this->stripStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
        $this->stripinputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "strip";

    }
    public function stripDelete(Strip $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "strip";
        $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
        $this->stripinputText = "";
        $this->stripStyleOp = "create";
    }
// end strip style
// start neck style
    public function neckCreate()
    {

        if ($this->neckinputText != "") {
            Neck::create(["name" => $this->neckinputText,'clothing_type'=>"cloth"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "neck";
        $this->neckStyles = Neck::where("clothing_type","cloth")->latest()->get();
        $this->neckinputText = "";
    }
    public function neckReadyToEdite($styleId)
    {
        $this->neckStyleIdToEdit = $styleId;
        $this->neckinputText = Neck::find($styleId)['name'];
        $this->neckStyleOp = "update";
        $this->neckStyles =Neck::where("clothing_type","cloth")->latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "neck";
    }
    public function neckEdite()
    {
        $currentStyle = Neck::find($this->neckStyleIdToEdit);

        if ($this->neckinputText != "") {
            $currentStyle->name = $this->neckinputText;
            $currentStyle->save();
            $this->neckStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->neckStyles = Neck::where("clothing_type","cloth")->latest()->get();
        $this->neckinputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "neck";

    }
    public function neckDelete(Neck $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "neck";
        $this->neckStyles = Neck::where("clothing_type","cloth")->latest()->get();
        $this->neckinputText = "";
        $this->neckStyleOp = "create";
    }
// end neck


// button style
    public function buttonCreate()
    {

        if ($this->buttoninputText != "") {
            style_buttonStyle::create(["name" => $this->buttoninputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "button";
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->buttoninputText = "";
    }
    public function buttonReadyToEdite($styleId)
    {
        $this->buttonStyleIdToEdit = $styleId;
        $this->buttoninputText = style_buttonStyle::find($styleId)['name'];
        $this->buttonStyleOp = "update";
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "button";
    }
    public function buttonEdite()
    {
        $currentStyle = style_buttonStyle::find($this->buttonStyleIdToEdit);

        if ($this->buttoninputText != "") {
            $currentStyle->name = $this->buttoninputText;
            $currentStyle->save();
            $this->buttonStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->buttoninputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "button";

    }
    public function buttonDelete(style_buttonStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "button";
        $this->buttonStyles = style_buttonStyle::latest()->get();
        $this->buttoninputText = "";
        $this->buttonStyleOp = "create";
    }
 // end button

    // side pocket
    public function createSidePocket()
    {

        if ($this->inputText != "") {
            \App\Models\style_sidepocketStyle::create(["name" => $this->inputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "sidePocket";
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
        $this->inputText = "";
    }
    public function readyToEditeSidePocket($styleId)
    {
        $this->StyleIdToEdit = $styleId;
        $this->inputText = style_sidepocketStyle::find($styleId)['name'];
        $this->StyleOp = "update";
        $this->activeTabe = "cloth";
        $this->activePane = "sidePocket";
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
    }
    public function editeSidePocket()
    {
        $currentStyle = style_sidepocketStyle::find($this->StyleIdToEdit);

        if ($this->inputText != "") {
            $currentStyle->name = $this->inputText;
            $currentStyle->save();
            $this->StyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
           
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "sidePocket";
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
        $this->inputText = "";

    }
    public function deleteSidePocket(style_sidepocketStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "sidePocket";
        $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
        $this->inputText = "";
        $this->StyleOp = "create";

    }
    // end side pocket
    // front pocket

    public function createFrontPocket()
    {

        if ($this->frontinputText != "") {
            style_frontpocketStyle::create(["name" => $this->frontinputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "frontPocket";
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
        $this->frontinputText = "";
    }
    public function readyToEditeFrontPocket($styleId)
    {
        $this->frontStyleIdToEdit = $styleId;
        $this->frontinputText = style_frontpocketStyle::find($styleId)['name'];
        $this->frontStyleOp = "update";
        $this->activeTabe = "cloth";
        $this->activePane = "frontPocket";
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
    }
    public function editeFrontPocket()
    {
        $currentStyle = style_frontpocketStyle::find($this->frontStyleIdToEdit);

        if ($this->frontinputText != "") {
            $currentStyle->name = $this->frontinputText;
            $currentStyle->save();
            $this->frontStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "frontPocket";
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
        $this->frontinputText = "";
    }
    public function deleteFrontPocket(style_frontpocketStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "frontPocket";
        $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
        $this->frontinputText = "";
        $this->frontStyleOp = "create";
    }
    // end front pocket

    // start skirt
    public function skirtCreate()
    {

        if ($this->skirtinputText != "") {
            Skirt::create(["name" => $this->skirtinputText,'clothing_type'=>"cloth"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "skirt";
        $this->skirtStyles = Skirt::where("clothing_type","cloth")->latest()->get();
        $this->skirtinputText = "";
    }
    public function skirtReadyToEdite($styleId)
    {
        $this->skirtStyleIdToEdit = $styleId;
        $this->skirtinputText = Skirt::find($styleId)['name'];
        $this->skirtStyleOp = "update";
        $this->skirtStyles = Skirt::where("clothing_type","cloth")->latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "skirt";
    }
    public function skirtEdite()
    {
        $currentStyle = Skirt::find($this->skirtStyleIdToEdit);

        if ($this->skirtinputText != "") {
            $currentStyle->name = $this->skirtinputText;
            $currentStyle->save();
            $this->skirtStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->skirtStyles = Skirt::where("clothing_type","cloth")->latest()->get();
        $this->skirtinputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "skirt";

    }
    public function skirtDelete(Skirt $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "skirt";
        $this->skirtStyles = Skirt::where("clothing_type","cloth")->latest()->get();
        $this->skirtinputText = "";
        $this->skirtStyleOp = "create";
    }
// end skirt
    // sleeve Mouth
    public function createSleeveMouth()
    {

        if ($this->sleeveMouthinputText != "") {
            style_sleeveMouthStyle::create(["name" => $this->sleeveMouthinputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "sleeveMouth";
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
        $this->sleeveMouthinputText = "";
    }
    public function readyToEditeSleeveMouth($styleId)
    {
        $this->sleeveMouthStyleIdToEdit = $styleId;
        $this->sleeveMouthinputText = style_sleeveMouthStyle::find($styleId)['name'];
        $this->sleeveMouthStyleOp = "update";
        $this->activeTabe = "cloth";
        $this->activePane = "sleeveMouth";
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
    }
    public function editeSleeveMouth()
    {
        $currentStyle = style_sleeveMouthStyle::find($this->sleeveMouthStyleIdToEdit);

        if ($this->sleeveMouthinputText != "") {
            $currentStyle->name = $this->sleeveMouthinputText;
            $currentStyle->save();
            $this->sleeveMouthStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "sleeveMouth";
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
        $this->sleeveMouthinputText = "";
    }
    public function deleteSleeveMouth(style_sleeveMouthStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "sleeveMouth";
        $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
        $this->sleeveMouthinputText = "";
        $this->sleeveMouthStyleOp = "create";
    }
    // end sleeve Mouth
    // salayee

    public function createSalayee()
    {

        if ($this->salayeeinputText != "") {
            style_salayeeStyle::create(["name" => $this->salayeeinputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "salayee";
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
        $this->salayeeinputText = "";
    }
    public function readyToEditeSalayee($styleId)
    {
        $this->salayeeStyleIdToEdit = $styleId;
        $this->salayeeinputText = style_salayeeStyle::find($styleId)['name'];
        $this->salayeeStyleOp = "update";
        $this->activeTabe = "cloth";
        $this->activePane = "salayee";
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
    }
    public function editeSalayee()
    {
        $currentStyle = style_salayeeStyle::find($this->salayeeStyleIdToEdit);

        if ($this->salayeeinputText != "") {
            $currentStyle->name = $this->salayeeinputText;
            $currentStyle->save();
            $this->salayeeStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "salayee";
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
        $this->salayeeinputText = "";
    }
    public function deleteSalayee(style_salayeeStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "salayee";
        $this->salayeeStyles = style_salayeeStyle::latest()->get();
        $this->salayeeinputText = "";
        $this->salayeeStyleOp = "create";
    }
    // end salayee
    // shoulder
    public function shoulderCreate()
    {

        if ($this->shoulderinputText != "") {
            Shoulder::create(["name" => $this->shoulderinputText,'clothing_type'=>"cloth"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "shoulder";
        $this->shoulderStyles = Shoulder::where("clothing_type","cloth")->latest()->get();
        $this->shoulderinputText = "";
    }
    public function shoulderReadyToEdite($styleId)
    {
        $this->shoulderStyleIdToEdit = $styleId;
        $this->shoulderinputText = Shoulder::find($styleId)['name'];
        $this->shoulderStyleOp = "update";
        $this->shoulderStyles = Shoulder::where("clothing_type","cloth")->latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "shoulder";
    }
    public function shoulderEdite()
    {
        $currentStyle =Shoulder::find($this->shoulderStyleIdToEdit);

        if ($this->shoulderinputText != "") {
            $currentStyle->name = $this->shoulderinputText;
            $currentStyle->save();
            $this->shoulderStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->shoulderStyles = Shoulder::where("clothing_type","cloth")->latest()->get();
        $this->shoulderinputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "shoulder";

    }
    public function shoulderDelete(Shoulder $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "shoulder";
        $this->shoulderStyles = Shoulder::where("clothing_type","cloth")->latest()->get();
        $this->shoulderinputText = "";
        $this->shoulderStyleOp = "create";
    }
    // end shoulder
    // sleeve
    public function sleeveCreate()
    {

        if ($this->sleeveinputText != "") {
            sleeve::create(["name" => $this->sleeveinputText,'clothing_type'=>"cloth"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "cloth";
        $this->activePane = "sleeve";
        $this->sleeveStyles = sleeve::where("clothing_type","cloth")->latest()->get();
        $this->sleeveinputText = "";
    }
    public function sleeveReadyToEdite($styleId)
    {
        $this->sleeveStyleIdToEdit = $styleId;
        $this->sleeveinputText = sleeve::find($styleId)['name'];
        $this->sleeveStyleOp = "update";
        $this->sleeveStyles = sleeve::where("clothing_type","cloth")->latest()->get();
        $this->activeTabe = "cloth";
        $this->activePane = "sleeve";
    }
    public function sleeveEdite()
    {
        $currentStyle =sleeve::find($this->sleeveStyleIdToEdit);

        if ($this->sleeveinputText != "") {
            $currentStyle->name = $this->sleeveinputText;
            $currentStyle->save();
            $this->sleeveStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->sleeveStyles = Sleeve::where("clothing_type","cloth")->latest()->get();
        $this->sleeveinputText = "";
        $this->activeTabe = "cloth";
        $this->activePane = "sleeve";

    }
    public function sleeveDelete(Sleeve $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "cloth";
        $this->activePane = "sleeve";
        $this->sleeveStyles = Sleeve::where("clothing_type","cloth")->latest()->get();
        $this->sleeveinputText = "";
        $this->sleeveStyleOp = "create";
    }
    // end sleeve
// end cloths styles
// ----------------------------------------------------------------------------------------------------
// coat styles


 // setting
    public $coatActivePane = "coatNeck";
 // styles
    public $neckSubStyles;
    public $coatBackStyles;
    public $coatNeckStyles;
    public $coatSkirtStyles;
    public $coatShoulderStyles;
 // oprations neckSub
    public $neckSubStyleOp = "create";
    public $neckSubStyleIdToEdit;
    public $neckSubinputText = "";
//  opration coatBack
    public $coatBackStyleOp = "create";
    public $coatBackStyleIdToEdit;
    public $coatBackinputText = "";
//  opration coatNeck
    public $coatNeckStyleOp = "create";
    public $coatNeckStyleIdToEdit;
    public $coatNeckinputText = "";
//  opration coatSkirt
    public $coatSkirtStyleOp = "create";
    public $coatSkirtStyleIdToEdit;
    public $coatSkirtinputText = "";
// opration coatShoulder
    public $coatShoulderStyleOp = "create";
    public $coatShoulderStyleIdToEdit;
    public $coatShoulderinputText = "";






    // neck sub
    public function createNeckSub()
    {

        if ($this->neckSubinputText != "") {
           style_neckSubStyle::create(["name" => $this->neckSubinputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "coat";
        $this->coatActivePane = "neckSub";
        $this->neckSubStyles = style_neckSubStyle::latest()->get();
        $this->neckSubinputText = "";
    }
    public function readyToEditeNeckSub($styleId)
    {
        $this->neckSubStyleIdToEdit = $styleId;
        $this->neckSubinputText = style_neckSubStyle::find($styleId)['name'];
        $this->neckSubStyleOp = "update";
        $this->activeTabe = "coat";
        $this->activePane = "neckSub";
        $this->neckSubStyles = style_neckSubStyle::latest()->get();
        $this->activeTabe = "coat";
        $this->coatActivePane = "neckSub";
    }
    public function editeNeckSub()
    {
        $currentStyle = style_neckSubStyle::find($this->neckSubStyleIdToEdit);

        if ($this->neckSubinputText != "") {
            $currentStyle->name = $this->neckSubinputText;
            $currentStyle->save();
            $this->neckSubStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
           
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->neckSubStyles = style_neckSubStyle::latest()->get();
        $this->neckSubinputText = "";
        $this->activeTabe = "coat";
        $this->coatActivePane = "neckSub";

    }
    public function deleteNeckSub(style_neckSubStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "coat";
        $this->coatActivePane = "neckSub";
        $this->neckSubStyles = style_neckSubStyle::latest()->get();
        $this->neckSubinputText = "";
        $this->neckSubStyleOp = "create";
    }
    // end neck sub
   

     // coat back style
    public function createCoatBack()
    {

        if ($this->coatBackinputText != "") {
           style_coatBackStyle::create(["name" => $this->coatBackinputText]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "coat";
        $this->coatActivePane = "back";
        $this->coatBackStyles = style_coatBackStyle::latest()->get();
        $this->coatBackinputText = "";
    }
    public function readyToEditeCoatBack($styleId)
    {
        $this->coatBackStyleIdToEdit = $styleId;
        $this->coatBackinputText = style_coatBackStyle::find($styleId)['name'];
        $this->coatBackStyleOp = "update";
        $this->activeTabe = "coat";
        $this->activePane = "back";
        $this->coatBackStyles = style_coatBackStyle::latest()->get();
        $this->activeTabe = "coat";
        $this->coatActivePane = "back";
    }
    public function editeCoatBack()
    {
        $currentStyle = style_coatBackStyle::find($this->coatBackStyleIdToEdit);

        if ($this->coatBackinputText != "") {
            $currentStyle->name = $this->coatBackinputText;
            $currentStyle->save();
            $this->coatBackStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
           
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->coatBackStyles = style_coatBackStyle::latest()->get();
        $this->coatBackinputText = "";
        $this->activeTabe = "coat";
        $this->coatActivePane = "back";

    }
    public function deleteCoatBack(style_coatBackStyle $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "coat";
        $this->coatActivePane = "back";
        $this->coatBackStyles = style_coatBackStyle::latest()->get();
        $this->coatBackinputText = "";
        $this->coatBackStyleOp = "create";
    }
//  end coat back

    // start neck style
    public function coatNeckCreate()
    {

        if ($this->coatNeckinputText != "") {
            Neck::create(["name" => $this->coatNeckinputText,'clothing_type'=>"coat"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatNeck";
        $this->coatNeckStyles = Neck::where("clothing_type","coat")->latest()->get();
        $this->coatNeckinputText = "";
    }
    public function coatNeckReadyToEdite($styleId)
    {
        $this->coatNeckStyleIdToEdit = $styleId;
        $this->coatNeckinputText = Neck::find($styleId)['name'];
        $this->coatNeckStyleOp = "update";
        $this->coatNeckStyles = Neck::where("clothing_type","coat")->latest()->get();
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatNeck";
    }
    public function coatNeckEdite()
    {
        $currentStyle = Neck::find($this->coatNeckStyleIdToEdit);

        if ($this->coatNeckinputText != "") {
            $currentStyle->name = $this->coatNeckinputText;
            $currentStyle->save();
            $this->coatNeckStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->coatNeckStyles = Neck::where("clothing_type","coat")->latest()->get();
        $this->coatNeckinputText = "";
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatNeck";

    }
    public function coatNeckDelete(Neck $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatNeck";
        $this->coatNeckStyles = Neck::where("clothing_type","coat")->latest()->get();
        $this->coatNeckinputText = "";
        $this->coatNeckStyleOp = "create";
    }
// end coat neck

    // start skirt
    public function coatSkirtCreate()
    {

        if ($this->coatSkirtinputText != "") {
            Skirt::create(["name" => $this->coatSkirtinputText,'clothing_type'=>"coat"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatSkirt";
        $this->coatSkirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
        $this->coatSkirtinputText = "";
    }
    public function coatSkirtReadyToEdite($styleId)
    {
        $this->coatSkirtStyleIdToEdit = $styleId;
        $this->coatSkirtinputText = Skirt::find($styleId)['name'];
        $this->coatSkirtStyleOp = "update";
        $this->coatSkirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatSkirt";
    }
    public function coatSkirtEdite()
    {
        $currentStyle = Skirt::find($this->coatSkirtStyleIdToEdit);

        if ($this->coatSkirtinputText != "") {
            $currentStyle->name = $this->coatSkirtinputText;
            $currentStyle->save();
            $this->coatSkirtStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->coatSkirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
        $this->coatSkirtinputText = "";
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatSkirt";

    }
    public function coatSkirtDelete(Skirt $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatSkirt";
        $this->coatSkirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
        $this->coatSkirtinputText = "";
        $this->coatSkirtStyleOp = "create";
    }
    // end skirt
    // coat shoulder style
    public function coatShoulderCreate()
    {

        if ($this->coatShoulderinputText != "") {
            Shoulder::create(["name" => $this->coatShoulderinputText,'clothing_type'=>"coat"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatShoulder";
        $this->coatShoulderStyles = Shoulder::where("clothing_type","coat")->latest()->get();
        $this->coatShoulderinputText = "";
    }
    public function coatShoulderReadyToEdite($styleId)
    {
        $this->coatShoulderStyleIdToEdit = $styleId;
        $this->coatShoulderinputText = Shoulder::find($styleId)['name'];
        $this->coatShoulderStyleOp = "update";
        $this->coatShoulderStyles = Shoulder::where("clothing_type","coat")->latest()->get();
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatShoulder";
    }
    public function coatShoulderEdite()
    {
        $currentStyle =Shoulder::find($this->coatShoulderStyleIdToEdit);

        if ($this->coatShoulderinputText != "") {
            $currentStyle->name = $this->coatShoulderinputText;
            $currentStyle->save();
            $this->coatShoulderStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->coatShoulderStyles = Shoulder::where("clothing_type","coat")->latest()->get();
        $this->coatShoulderinputText = "";
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatShoulder";

    }
    public function coatShoulderDelete(Shoulder $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "coat";
        $this->coatActivePane = "coatShoulder";
        $this->coatShoulderStyles = Shoulder::where("clothing_type","coat")->latest()->get();
        $this->coatShoulderinputText = "";
        $this->coatShoulderStyleOp = "create";
    }
   // end shoulder
// end coat 
// -----------------------------------------------------------------------------------------
// vasket styles
// setting
    public $vasketActivePane = "vasketNeck";
// styles
    public $vasketNeckStyles;
    public $vasketSkirtStyles;
    public $vasketShoulderStyles;
    // oprations vasketNeck
    public $vasketNeckStyleOp = "create";
    public $vasketNeckStyleIdToEdit;
    public $vasketNeckinputText = "";
// opration vasketSkirt
    public $vasketSkirtStyleOp = "create";
    public $vasketSkirtStyleIdToEdit;
    public $vasketSkirtinputText = "";
//  opration vasketShoulder
    public $vasketShoulderStyleOp = "create";
    public $vasketShoulderStyleIdToEdit;
    public $vasketShoulderinputText = "";




// vasketNeck Style
public function vasketNeckCreate()
    {

        if ($this->vasketNeckinputText != "") {
            Neck::create(["name" => $this->vasketNeckinputText,'clothing_type'=>"vasket"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketNeck";
        $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
        $this->vasketNeckinputText = "";
    }
    public function vasketNeckReadyToEdite($styleId)
    {
        $this->vasketNeckStyleIdToEdit = $styleId;
        $this->vasketNeckinputText = Neck::find($styleId)['name'];
        $this->vasketNeckStyleOp = "update";
        $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketNeck";
    }
    public function vasketNeckEdite()
    {
        $currentStyle = Neck::find($this->vasketNeckStyleIdToEdit);

        if ($this->vasketNeckinputText != "") {
            $currentStyle->name = $this->vasketNeckinputText;
            $currentStyle->save();
            $this->vasketNeckStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
        $this->vasketNeckinputText = "";
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketNeck";

    }
    public function vasketNeckDelete(Neck $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketNeck";
        $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
        $this->vasketNeckinputText = "";
        $this->vasketNeckStyleOp = "create";
    }
// end vasketNeck
// vasketSkirt
public function vasketSkirtCreate()
    {

        if ($this->vasketSkirtinputText != "") {
            Skirt::create(["name" => $this->vasketSkirtinputText,'clothing_type'=>"vasket"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketSkirt";
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->vasketSkirtinputText = "";
    }
    public function vasketSkirtReadyToEdite($styleId)
    {
        $this->vasketSkirtStyleIdToEdit = $styleId;
        $this->vasketSkirtinputText = Skirt::find($styleId)['name'];
        $this->vasketSkirtStyleOp = "update";
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketSkirt";
    }
    public function vasketSkirtEdite()
    {
        $currentStyle = Skirt::find($this->vasketSkirtStyleIdToEdit);

        if ($this->vasketSkirtinputText != "") {
            $currentStyle->name = $this->vasketSkirtinputText;
            $currentStyle->save();
            $this->vasketSkirtStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->vasketSkirtinputText = "";
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketSkirt";

    }
    public function vasketSkirtDelete(Skirt $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketSkirt";
        $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
        $this->vasketSkirtinputText = "";
        $this->vasketSkirtStyleOp = "create";
    }
// end vasketSkirt
// vasketShoudler
public function vasketShoulderCreate()
    {

        if ($this->vasketShoulderinputText != "") {
            Shoulder::create(["name" => $this->vasketShoulderinputText,'clothing_type'=>"vasket"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketShoulder";
        $this->vasketShoulderStyles = Shoulder::where("clothing_type","vasket")->latest()->get();
        $this->vasketShoulderinputText = "";
    }
    public function vasketShoulderReadyToEdite($styleId)
    {
        $this->vasketShoulderStyleIdToEdit = $styleId;
        $this->vasketShoulderinputText = Shoulder::find($styleId)['name'];
        $this->vasketShoulderStyleOp = "update";
        $this->vasketShoulderStyles = Shoulder::where("clothing_type","vasket")->latest()->get();
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketShoulder";
    }
    public function vasketShoulderEdite()
    {
        $currentStyle = Shoulder::find($this->vasketShoulderStyleIdToEdit);

        if ($this->vasketShoulderinputText != "") {
            $currentStyle->name = $this->vasketShoulderinputText;
            $currentStyle->save();
            $this->vasketShoulderStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->vasketShoulderStyles = Shoulder::where("clothing_type","vasket")->latest()->get();
        $this->vasketShoulderinputText = "";
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketShoulder";

    }
    public function vasketShoulderDelete(Shoulder $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "vasket";
        $this->vasketActivePane = "vasketShoulder";
        $this->vasketShoulderStyles = Shoulder::where("clothing_type","vasket")->latest()->get();
        $this->vasketShoulderinputText = "";
        $this->vasketShoulderStyleOp = "create";
    }
// end vasketShoulder
// end vasket styling
// -------------------------------------------------------------------------------
// start tshirt styling

// setting
    public $tShirtActivePane = "tShirtNeck";

// styles
    public $tShirtNeckStyles;
    public $tShirtSkirtStyles;
    public $tShirtSleeveStyles;
    public $tShirtShoulderStyles;
    public $tShirtStripStyles;

    // oprations tShirtNeck
    public $tShirtNeckStyleOp = "create";
    public $tShirtNeckStyleIdToEdit;
    public $tShirtNeckinputText = "";
    // oprations tShirtSkirt
    public $tShirtSkirtStyleOp = "create";
    public $tShirtSkirtStyleIdToEdit;
    public $tShirtSkirtinputText = "";
    // oprations tShirtSleeve
    public $tShirtSleeveStyleOp = "create";
    public $tShirtSleeveStyleIdToEdit;
    public $tShirtSleeveinputText = "";
     // oprations tShirtShoulder
     public $tShirtShoulderStyleOp = "create";
     public $tShirtShoulderStyleIdToEdit;
     public $tShirtShoulderinputText = "";
     // oprations tShirtStrip
     public $tShirtStripStyleOp = "create";
     public $tShirtStripStyleIdToEdit;
     public $tShirtStripinputText = "";


// tShirtNeck style
public function tShirtNeckCreate()
    {

        if ($this->tShirtNeckinputText != "") {
            Neck::create(["name" => $this->tShirtNeckinputText,'clothing_type'=>"tShirt"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtNeck";
        $this->tShirtNeckStyles = Neck::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtNeckinputText = "";
    }
    public function tShirtNeckReadyToEdite($styleId)
    {
        $this->tShirtNeckStyleIdToEdit = $styleId;
        $this->tShirtNeckinputText = Neck::find($styleId)['name'];
        $this->tShirtNeckStyleOp = "update";
        $this->tShirtNeckStyles = Neck::where("clothing_type","tShirt")->latest()->get();
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtNeck";
    }
    public function tShirtNeckEdite()
    {
        $currentStyle = Neck::find($this->tShirtNeckStyleIdToEdit);

        if ($this->tShirtNeckinputText != "") {
            $currentStyle->name = $this->tShirtNeckinputText;
            $currentStyle->save();
            $this->tShirtNeckStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->tShirtNeckStyles = Neck::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtNeckinputText = "";
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtNeck";

    }
    public function tShirtNeckDelete(Neck $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtNeck";
        $this->tShirtNeckStyles = Neck::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtNeckinputText = "";
        $this->tShirtNeckStyleOp = "create";
    }
// end
// tShirtSkirt style
public function tShirtSkirtCreate()
    {

        if ($this->tShirtSkirtinputText != "") {
            Skirt::create(["name" => $this->tShirtSkirtinputText,'clothing_type'=>"tShirt"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSkirt";
        $this->tShirtSkirtStyles = Skirt::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSkirtinputText = "";
    }
    public function tShirtSkirtReadyToEdite($styleId)
    {
        $this->tShirtSkirtStyleIdToEdit = $styleId;
        $this->tShirtSkirtinputText = Skirt::find($styleId)['name'];
        $this->tShirtSkirtStyleOp = "update";
        $this->tShirtSkirtStyles = Skirt::where("clothing_type","tShirt")->latest()->get();
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSkirt";
    }
    public function tShirtSkirtEdite()
    {
        $currentStyle = Skirt::find($this->tShirtSkirtStyleIdToEdit);

        if ($this->tShirtSkirtinputText != "") {
            $currentStyle->name = $this->tShirtSkirtinputText;
            $currentStyle->save();
            $this->tShirtSkirtStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->tShirtSkirtStyles = Skirt::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSkirtinputText = "";
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSkirt";

    }
    public function tShirtSkirtDelete(Skirt $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSkirt";
        $this->tShirtSkirtStyles = Skirt::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSkirtinputText = "";
        $this->tShirtSkirtStyleOp = "create";
    }
// end
// tShirtSleeve style
public function tShirtSleeveCreate()
    {

        if ($this->tShirtSleeveinputText != "") {
            Sleeve::create(["name" => $this->tShirtSleeveinputText,'clothing_type'=>"tShirt"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSleeve";
        $this->tShirtSleeveStyles = Sleeve::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSleeveinputText = "";
    }
    public function tShirtSleeveReadyToEdite($styleId)
    {
        $this->tShirtSleeveStyleIdToEdit = $styleId;
        $this->tShirtSleeveinputText = Sleeve::find($styleId)['name'];
        $this->tShirtSleeveStyleOp = "update";
        $this->tShirtSleeveStyles = Sleeve::where("clothing_type","tShirt")->latest()->get();
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSleeve";
    }
    public function tShirtSleeveEdite()
    {
        $currentStyle = Sleeve::find($this->tShirtSleeveStyleIdToEdit);

        if ($this->tShirtSleeveinputText != "") {
            $currentStyle->name = $this->tShirtSleeveinputText;
            $currentStyle->save();
            $this->tShirtSleeveStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->tShirtSleeveStyles = Sleeve::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSleeveinputText = "";
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSleeve";

    }
    public function tShirtSleeveDelete(Sleeve $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtSleeve";
        $this->tShirtSleeveStyles = Sleeve::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtSleeveinputText = "";
        $this->tShirtSleeveStyleOp = "create";
    }
// end
// tShirtShoulder style
public function tShirtShoulderCreate()
    {

        if ($this->tShirtShoulderinputText != "") {
            Shoulder::create(["name" => $this->tShirtShoulderinputText,'clothing_type'=>"tShirt"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtShoulder";
        $this->tShirtShoulderStyles = Shoulder::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtShoulderinputText = "";
    }
    public function tShirtShoulderReadyToEdite($styleId)
    {
        $this->tShirtShoulderStyleIdToEdit = $styleId;
        $this->tShirtShoulderinputText = Shoulder::find($styleId)['name'];
        $this->tShirtShoulderStyleOp = "update";
        $this->tShirtShoulderStyles = Shoulder::where("clothing_type","tShirt")->latest()->get();
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtShoulder";
    }
    public function tShirtShoulderEdite()
    {
        $currentStyle = Shoulder::find($this->tShirtShoulderStyleIdToEdit);

        if ($this->tShirtShoulderinputText != "") {
            $currentStyle->name = $this->tShirtShoulderinputText;
            $currentStyle->save();
            $this->tShirtShoulderStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->tShirtShoulderStyles = Shoulder::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtShoulderinputText = "";
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtShoulder";

    }
    public function tShirtShoulderDelete(Shoulder $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtShoulder";
        $this->tShirtShoulderStyles = Shoulder::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtShoulderinputText = "";
        $this->tShirtShoulderStyleOp = "create";
    }
// end

// tShirtStrip style
public function tShirtStripCreate()
    {

        if ($this->tShirtStripinputText != "") {
            Strip::create(["name" => $this->tShirtStripinputText,'clothing_type'=>"tShirt"]);
            session()->flash('success', "نوی ستایل اضافه شو");
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtStrip";
        $this->tShirtStripStyles = Strip::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtStripinputText = "";
    }
    public function tShirtStripReadyToEdite($styleId)
    {
        $this->tShirtStripStyleIdToEdit = $styleId;
        $this->tShirtStripinputText = Strip::find($styleId)['name'];
        $this->tShirtStripStyleOp = "update";
        $this->tShirtStripStyles = Strip::where("clothing_type","tShirt")->latest()->get();
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtStrip";
    }
    public function tShirtStripEdite()
    {
        $currentStyle = Strip::find($this->tShirtStripStyleIdToEdit);

        if ($this->tShirtStripinputText != "") {
            $currentStyle->name = $this->tShirtStripinputText;
            $currentStyle->save();
            $this->tShirtStripStyleOp = "create";
            session()->flash('success', "ستایل بدل شو");
            
        } else {
            session()->flash('error', "ستایل ولیکی");
        }
        $this->tShirtStripStyles = Strip::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtStripinputText = "";
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtStrip";

    }
    public function tShirtStripDelete(Strip $style)
    {
        $style->delete();
        session()->flash('success', " ستایل پاک شو");
        $this->activeTabe = "tShirt";
        $this->tShirtActivePane = "tShirtStrip";
        $this->tShirtStripStyles = Strip::where("clothing_type","tShirt")->latest()->get();
        $this->tShirtStripinputText = "";
        $this->tShirtStripStyleOp = "create";
    }
// end





// end tshirt styling




public function mount()
{
    $this->sidePocketStyles = style_sidepocketStyle::latest()->get();
    $this->frontPocketStyles = style_frontpocketStyle::latest()->get();
    $this->sleeveMouthStyles = style_sleeveMouthStyle::latest()->get();
    $this->salayeeStyles = style_salayeeStyle::latest()->get();
    $this->neckSubStyles = style_neckSubStyle::latest()->get();
    $this->coatBackStyles = style_coatBackStyle::latest()->get();
    $this->buttonStyles = style_buttonStyle::latest()->get();
    $this->stripStyles = Strip::where("clothing_type","cloth")->latest()->get();
    $this->neckStyles = Neck::where("clothing_type","cloth")->latest()->get();
    $this->skirtStyles = Skirt::latest()->get();
    $this->shoulderStyles = shoulder::where("clothing_type","cloth")->latest()->get();
    $this->sleeveStyles = Sleeve::where("clothing_type","cloth")->latest()->get();
    $this->coatNeckStyles = Neck::where("clothing_type","coat")->latest()->get();
    $this->coatSkirtStyles = Skirt::where("clothing_type","coat")->latest()->get();
    $this->coatShoulderStyles = Shoulder::where("clothing_type","coat")->latest()->get();
    $this->vasketNeckStyles = Neck::where("clothing_type","vasket")->latest()->get();
    $this->vasketSkirtStyles = Skirt::where("clothing_type","vasket")->latest()->get();
    $this->vasketShoulderStyles = Shoulder::where("clothing_type","vasket")->latest()->get();
    $this->tShirtNeckStyles = Neck::where("clothing_type","tShirt")->latest()->get();
    $this->tShirtSkirtStyles = Skirt::where("clothing_type","tShirt")->latest()->get();
    $this->tShirtSleeveStyles = Sleeve::where("clothing_type","tShirt")->latest()->get();
    $this->tShirtShoulderStyles = Shoulder::where("clothing_type","tShirt")->latest()->get();
    $this->tShirtStripStyles = Strip::where("clothing_type","tShirt")->latest()->get();

    
    

}
    public function render()
    {
        return view('livewire.style');
    }
}
