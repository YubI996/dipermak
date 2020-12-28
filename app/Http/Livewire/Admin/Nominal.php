<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\kegiatan as keg;
use Carbon\Carbon;

class Nominal extends Component
{
    
    public $per;
    public $nom;
    public $kid;
    public $target;
    // protected $listeners = ['setNom' => 'setNom()', 'setPer' => 'setPer()'];
    // function mount($kid){
    //     if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
    //         $this->nom = ($this->per / 100) * $this->pagu;
    //         // $target = $this->nom;
    //     }
    //     else
    //     $this->kid = $kid;
         
        
    // }
    public function updatedPer($value)
    {
        empty($this->per) ? $this->nom = 0 : $this->nom = ($this->per/100) * $this->target;
        // empty($this->per) ? $this->nom = 0 : $this->nom = (number_format(($this->per/100) * $this->target,0,'.',','));
        // $this->per = number_format($value,0, ',' , '.');
    }
    public function updatedNom($value)
    {
        // dd($this->target);
        // empty($this->nom) ? $this->per = 0 : $this->per = (number_format(($this->nom / $this->target) * 100,0,'.',','));
        empty($this->nom) ? $this->per = 0 : $this->per = ($this->nom / $this->target) * 100;
        // $this->nom = number_format($value,0, ',' , '.');
    }
    public function render()
    {
        $this->target=0; 
        
        if(!((empty($this->kid)))){
            // $this->pagu = keg::Where('id',$this->kid)->value('pagu');//get 
            $this->target = keg::Where('id',$this->kid)->value('target');
            // $this->target = number_format(keg::Where('id',$this->kid)->value('target'),0,'.',',');
            // dd($this->target);
            
        }
        $tgl = Carbon::parse(now())->translatedFormat('l, d F Y H:i:s A');
                
        return view('livewire.admin.nominal', compact('tgl'));
    }
}

