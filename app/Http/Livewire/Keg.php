<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rt;


class Keg extends Component
{
    public $kec;
    public $kel;
    public $rtid;
    // function mount($rtid){
        // $this->rtid=$rtid;
    // }
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
        $rtid = $this->rtid;
        return view('livewire.admin.pilihrt', compact('kelurahanItems','kecamatanItems','rtItems','rtid'));
    }
}

