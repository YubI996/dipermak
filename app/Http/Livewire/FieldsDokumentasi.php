<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan as keg;
use App\Models\dokumentasi as dok;

class FieldsDokumentasi extends Component
{
    public $kegiatanItems="";
    public $rtid;
    public $edit_mode = false;
    public $did;
    public $dokumentasi;
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
    public function mount($edit_mode, $did)
    {
        if ($edit_mode) {
            $this->dokumentasi = dok::find($did);
            $this->kegiatanItems = keg::where('id',$this->dokumentasi->kegiatan->id)->pluck('nama_keg','id')->toArray();
        }
    }
    public function render()
    {
        
        return view('livewire.fields-dokumentasi');
    }
}
