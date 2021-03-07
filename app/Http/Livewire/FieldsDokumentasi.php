<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan as keg;

class FieldsDokumentasi extends Component
{
    public $kegiatanItems="";
    public $rtid;
    protected $listeners = ['rtid'];
    public function rtid($rtid)
    {
        $this->rtid = $rtid;
        if ($rtid>0) {
            $kegs = keg::where('rt_id', $rtid);
            if ($kegs->count()>0) {
                $this->kegiatanItems = $kegs->pluck('nama_keg','id')->toArray();
            }
        }
    }
    public function render()
    {
        return view('livewire.fields-dokumentasi');
    }
}
