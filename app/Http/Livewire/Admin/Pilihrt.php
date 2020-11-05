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
        return view('livewire.admin.pilihrt', compact('kelurahanItems','kecamatanItems','rtItems'));
    }
}

