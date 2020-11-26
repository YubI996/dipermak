<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kegiatan;
use App\Models\rt;


class Keg extends Component
{
    public $kec;
    public $kel;
    public $rtid;
    public $kegs=[];
    // function mount($rtid){
    //     if (!(empty($this->rtid))) {
    //         $rt = Rt::where('id',$this->rtid)->first()->toArray();
    //     }
    //     else{
    //         $rt = $this->rtid;
    //     }
    // }
    public function getKeg()
    {
        
        $kegs = kegiatan::where('rt_id',$this->rtid)->pluck('nama_keg')->toArray();
        empty($kegs) ? $this->kegs=['Belum ada kegiatan untuk RT ini.'] : $this->kegs = $kegs;
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
        return view('livewire.keg', compact('kelurahanItems','kecamatanItems','rtItems'));
    }
}

