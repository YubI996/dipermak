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
    public $kelurahanItems;
    public $kecamatanItems;
    public $rtItems;
    function mount(){
        $rtid=$this->rtid;
        $this->kel = rt::where('id', $this->rtid)->value('kel_id');
        $this->kec = kelurahan::where('id', $this->kel)->value('kec_id');
        $this->kelurahanItems = Kelurahan::pluck('nama_kel','id')->toArray();
        $this->kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
        $this->rtItems = Rt::pluck('nama_rt','id')->toArray();

    }
    public function Updatedkec()
    {

            $this->kelurahanItems = Kelurahan::where('kec_id',$this->kec)->pluck('nama_kel','id')->toArray();
            $this->kel = 0;
            $this->rt = 0;
            $this->emitUp('rtid', 0);

    }
    public function Updatedkel()
    {
            $this->rtItems = Rt::where('kel_id',$this->kel)->pluck('nama_rt','id')->toArray();
            $this->rt = 0;
            $this->emitUp('rtid', 0);

    }
    public function UpdatedRtid()
    {
        // $this->emit('RT',$this->rtid);
        // $this->dispatchBrowserEvent('rthome', ['rt' => $this->rtid]);
        $this->emitUp('rtid', $this->rtid);
        
    }
    public function render()
    {
        return view('livewire.admin.pilihrt');
    }
}

