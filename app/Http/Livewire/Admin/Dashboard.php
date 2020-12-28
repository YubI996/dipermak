<?php

namespace App\Http\Livewire\Admin;

use App\Models\kegiatan;
use Livewire\Component;

class Dashboard extends Component
{
    
    public $pagu;
    public $per;
    public $nom;
    public $kid;
    function mount($kid){
        // if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
        //     $this->nom = ($this->per / 100) * $this->pagu;
        //     // $target = $this->nom;
        // }
        // else
        // $this->kid = $kid;
        
        
    }
    public function render()
    {
          $target=0;
       
        if(!((empty($this->kid)))){
            $this->pagu = kegiatan::Where('id',$this->kid)->pluck('pagu')->first();
            $this->nom = Kegiatan::Where('id',$this->kid)->pluck('target')->first();
            
        }
        if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
            $this->nom = ($this->per / 100) * $this->pagu;
            // $target = $this->nom;
        }
        
        
        return view('livewire.admin.dashboard',\compact('target'));
    }
}
