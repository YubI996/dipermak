<?php

namespace App\Http\Livewire\Admin;

use App\Models\kegiatan;
use Livewire\Component;

class Dashboard extends Component
{
    
    public $pagu;
    public $per;
    public $nom;
    public $kid;
    public function mount($kid)
    {
        $get = kegiatan::find($kid);
        if ($get) {
            $this->pagu = $get->pagu;
            $this->nom = $get->target;
            $this->per = intval($this->nom / $this->pagu) * 100;
        }
    }
    public function UpdatedPagu($value)
    {
        $per = empty($this->per)? 0 :$this->per;
        $this->nom = intval(($per / 100) * intval($value));
    }
    public function UpdatedPer($value)
    {
        if ($this->per > 0) {
            $this->nom = intval(($this->per / 100) * $this->pagu);
        }
        
    }
    public function UpdatedNom($value)
    {
        $this->per = intval(($this->nom / $this->pagu) * 100);
    }
    public function render()
    {
          $target=0;
       
        
        return view('livewire.admin.dashboard');
    }
}
