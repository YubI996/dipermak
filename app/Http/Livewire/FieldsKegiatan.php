<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan;
use App\Models\JenKeg;
use App\Models\rt;
use App\Http\Livewire\Field;
// use Illuminate\Http\Request;
use App\Http\Requests\CreatekegiatanRequest as Request;
use Flash;
use Exception;


use App\Repositories\kegiatanRepository;

class FieldsKegiatan extends Component
{
    public $nama_keg;
    public $rtid;
    public $tm;
    public $ts;
    public $sumber;
    public $ap = true;
    public $jk;
    public $pagu;
    public $target;
    public $volume;
    public $sat;
    
    public $edit_mode = false;
    public $kid;

    public $per =[];
    public $inputs = [];
    public $i = 1;

    protected $listeners = ['rtid'];
    
    public function rtid($rtid)
    {
        $this->rtid = $rtid;
    }
    
    public function UpdatedPagu()
    {
        foreach ($this->pagu as $key => $value) {
            $per = empty($this->per[$key])? 0 :$this->per[$key];
            $this->target[$key] = intval((($per) / 100) * intval($value));
        }
    }
    public function UpdatedPer()
    {
        foreach ($this->per as $key => $value) {
            $pagu = empty($this->pagu[$key])? 0 :$this->pagu[$key];
            $this->target[$key] = intval((intval($value) / 100) * ($pagu));
        }        
    }
    public function UpdatedTarget()
    {
        foreach ($this->target as $key => $value) {
            $pagu = empty($this->pagu[$key])? 0 :$this->pagu[$key];
            $this->per[$key] = intval((intval($value) / intval($pagu)) * 100);
        }
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
        // dump($this->nama_keg);
        // dd($this->inputs);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $jen_kegItems = JenKeg::pluck('jenis_keg','id')->toArray();
        if ($this->edit_mode) {
            $kegiatan = Kegiatan::find($this->kid);
            return view('livewire.fields-kegiatan')->with('kegiatan', $kegiatan);
        }
        return view('livewire.fields-kegiatan')->with('jen_kegItems',$jen_kegItems);
    }

    private function resetInputFields(){
        $this->nama_keg = '';
        $this->rtid = '';
        $this->tm = '';
        $this->ts = '';
        $this->sumber = '';
        $this->ap = '';
        $this->jk = '';
        $this->per = '';
        $this->pagu = '';
        $this->target = '';
        $this->volume = '';
        $this->sat = '';
    }
        
    public function update()
    {
        // Kegiatan
    }
    public function store()
    {
        // dd($this->nama_keg);
        try {
            foreach ($this->nama_keg as $key => $value) {
                Kegiatan::create([
                        'nama_keg' => $this->nama_keg[$key],
                        'rt_id' => $this->rtid,
                        'tgl_mulai' => $this->tm[$key],
                        'tgl_selesai' => $this->ts[$key],
                        'sumber_dana' => $this->sumber[$key],
                        'approval' => $this->ap[$key]?1:0,
                        'jen_keg' => $this->jk[$key],
                        'pagu' => $this->pagu[$key],
                        'target' => $this->target[$key],
                        'volume' => $this->volume[$key],
                        'satuan' => $this->sat[$key]
                        ]);}
                        $rtx = RT::find($this->rtid);
                        $rt = $rtx->nama_rt;
                        $kl = $rtx->kelurahan->nama_kel;
                        $kc = $rtx->kelurahan->kecamatan->nama_kec;
                        session()->flash('message', $this->i.' Data berhasil disimpan untuk RT '.$rt.', Kelurahan '.$kl.', Kecamatan '.$kc);
                        $this->inputs = [];
                        $this->resetInputFields();  
            
        } catch (Exception $e) {
            // session()->flash('danger','Error, silahkan periksa kembali pengisian form di bawah.');
            session()->flash('danger',$e->getMessage());
        }
    }

}