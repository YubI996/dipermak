<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan as keg;
use App\Models\partisipasi as part;

class Guest extends Component
{
    public $rt;
    function mount($rt){
        $this->rt = $rt;
    }
    public function render()
    {
        $allKeg = keg::where('rt_id', $this->rt)->get();
        $allPart = part::where('rt_id', $this->rt)->get();

        return view('livewire.guest',compact('allKeg','allPart'));
    }
}
