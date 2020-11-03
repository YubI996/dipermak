<?php

namespace App\Http\Livewire\Admin;

use App\Models\kecamatan;
use App\Models\kegiatan;
use App\Models\kelurahan;
use App\Models\rt;
use Livewire\Component;

class Dashboard extends Component
{
    public $kec;
    public $kel;
    public $pagu;
    public $per;
    public $nom;
    public $kid;
    function mount($kid){
        if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
            $this->nom = ($this->per / 100) * $this->pagu;
            // $target = $this->nom;
        }
        else
        $this->kid = $kid;
        
        
    }
    public function render()
    {
          $target=0;
        $kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
        if (!(empty($this->kec))) {
            $kelurahanItems = Kelurahan::where('kec_id',$this->kec)->pluck('nama_kel','id')->toArray();
        }
        else{
            $kelurahanItems = Kelurahan::pluck('nama_kel','id')->toArray();

        }
        if (!(empty($this->kel))) {
            $rtItems = Rt::where('kel_id',$this->kel)->pluck('nama_rt','id')->toArray();
            # code...
        }
        else{
            $rtItems = Rt::pluck('nama_rt','id')->toArray();

        }
        if(!((empty($this->kid)))){
            $this->pagu = kegiatan::Where('id',$this->kid)->pluck('pagu')->first();
            $this->nom = Kegiatan::Where('id',$this->kid)->pluck('target')->first();
            
        }
        if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
            $this->nom = ($this->per / 100) * $this->pagu;
            // $target = $this->nom;
        }
        
        
        return view('livewire.admin.dashboard',\compact('kelurahanItems','kecamatanItems','rtItems','target'));
    }
}
