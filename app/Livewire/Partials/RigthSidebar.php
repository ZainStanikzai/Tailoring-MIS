<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Setting;
use Exception;

class RigthSidebar extends Component
{
    public $layoutMode;
    public $topbarColor;
    public $sidebarSize;
    public $sidebarColor;
    public function mount(){
        $setting = Setting::all()->first();
        $this->layoutMode = $setting->layoutMode;
        $this->topbarColor = $setting->tapbarColor;
        $this->sidebarSize = $setting->sidbarSize;
        $this->sidebarColor = $setting->sidebarColor;
    }
   
   public function layoutModeDark(Setting $setting){
       try {
        $setting->layoutMode = 'dark';
        $setting->tapbarColor = 'dark';
        $setting->sidebarColor = 'dark';
        $setting->save();
        $this->layoutMode = 'dark';
        $this->topbarColor = 'dark';
        $this->sidebarColor = 'dark';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function layoutModeLight(Setting $setting){
    try {
        $setting->layoutMode = 'light';
        $setting->tapbarColor = 'light';
        $setting->sidebarColor = 'light';
        $setting->save();
        $this->layoutMode = 'light';
        $this->topbarColor = 'light';
        $this->sidebarColor = 'light';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }

   }
   public function topBarColorLight(Setting $setting){
    try {
        $setting->tapbarColor = 'light';
        $setting->save();
        $this->topbarColor = 'light';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function topBarColorDark(Setting $setting){
    try {
        $setting->tapbarColor = 'dark';
        $setting->save();
        $this->topbarColor = 'dark';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarSizeDefault(Setting $setting){
    try {
        $setting->sidbarSize = 'lg';
        $setting->save();
        $this->sidebarSize = 'lg';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarSizeSmall(Setting $setting){
    try {
        $setting->sidbarSize = 'sm';
        $setting->save();
        $this->sidebarSize = 'sm';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarSizeCompact(Setting $setting){
    try {
        $setting->sidbarSize = 'small';
        $setting->save();
        $this->sidebarSize = 'small';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarColorLight(Setting $setting){
    try {
        $setting->sidebarColor = 'light';
        $setting->save();
        $this->sidebarColor = 'light';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarColorDark(Setting $setting){
    try {
        $setting->sidebarColor = 'dark';
        $setting->save();
        $this->sidebarColor = 'dark';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
   public function sidebarColorColored(Setting $setting){
    try {
        $setting->sidebarColor = 'colored';
        $setting->save();
        $this->sidebarColor = 'colored';
       } catch (Exception $ex) {
        session()->flash("error", $ex);
       }
   }
    public function render()
    {
        return view('livewire.partials.rigth-sidebar');
    }
}
