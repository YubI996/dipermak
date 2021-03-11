<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\kegiatan as keg;
use App\Models\partisipasi as par;
use Carbon\Carbon;
use Flash;

class Nominal extends Component
{
    
    public $per;
    public $nom;
    public $kid;
    public $target;
    public $keg;
    public $pid;
    public $kegItems;
    public $rtid;
    protected $listeners = ['rtid' => 'rt'];
    public function mount()
    {
        if (!(empty($this->pid))) {
            $this->kid = par::find($this->pid)->keg_id;
            $this->target = keg::find($this->kid)->target;
            $this->nom = par::find($this->pid)->nominal;
            $this->per = ($this->nom/$this->target)*100;
            $this->kegItems = keg::where('id',$this->kid)->pluck('nama_keg','id')->toArray();
        }
        else{
            $this->kegItems = ['Silahkan pilih RT'];

        }
    }
    public function rt($value)
    {
        $this->rtid = $value;
        $this->kegItems = keg::where('rt_id',$value)->pluck('nama_keg','id')->toArray();
        // dump(empty($this->kegItems));
        if (empty($this->kegItems)) {
            session()->flash('info', 'RT yang Anda pilih belum memiliki kegiatan');
            Flash::error('RT yang Anda pilih tidak memiliki kegiatan');
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
        if(empty($this->target)){
            $this->per = 0;
        }
        else{
            $this->per =number_format(((intval($this->nom) / $this->target) * 100),1,',','.');

        }
    }
    public function render()
    {
        
        
        // $tgl = Carbon::parse(now())->translatedFormat('l, d F Y H:i:s A');
                
        return view('livewire.admin.nominal');
    }
}

