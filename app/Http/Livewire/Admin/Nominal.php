<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\kegiatan as keg;
use App\Models\partisipasi as par;
use Carbon\Carbon;

class Nominal extends Component
{
    
    public $per;
    public $nom;
    public $kid;
    public $target;
    public $keg;
    public $pid;
    public function mount()
    {
        if (!(empty($this->pid))) {
            $this->kid = par::find($this->pid)->keg_id;
            $this->target = keg::find($this->kid)->target;
            $this->nom = par::find($this->pid)->nominal;
            $this->per = ($this->nom/$this->target)*100;
        }
    }

    public function updatedKid()
    {
        // $kid = par::where('id',$this->pid)->first()->value('keg_id');
        $this->keg = keg::where('id',$this->kid)->value('target');
        
        $this->target = number_format($this->keg,0,',','.');
    }
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
        $per = number_format((($this->nom / $this->target) * 100),1,',','.');
        empty($this->target) ? $this->per = 0 : $this->per = $per;
        // $this->nom = number_format($value,0, ',' , '.');
        // dump('keeeeey');
    }
    public function render()
    {
        
        
        // $tgl = Carbon::parse(now())->translatedFormat('l, d F Y H:i:s A');
                
        return view('livewire.admin.nominal');
    }
}

