<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rt;


class Pilihrt extends Component
{
    public $kec;
    public $kel;
    public $rtid;
    public $kid;
    function mount(){
        $rtid=$this->rtid;
        $this->kel = rt::where('id', $this->rtid)->value('kel_id');
        $this->kec = kelurahan::where('id', $this->kel)->value('kec_id');
    }
    public function render()
    {
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
        if (!(empty($this->kid))){
            $this->kel = rt::where('id', $this->rtid)->value('kel_id');
            $this->kec = kelurahan::where('id', $this->kel)->value('kec_id');
            dump($this->kel);
            dump($this->kec);
        }
        // $rtid = $this->rtid;
       
        return view('livewire.admin.pilihrt', compact('kelurahanItems','kecamatanItems','rtItems'));
    }
}

