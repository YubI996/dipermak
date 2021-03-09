<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan;
use App\Models\JenKeg;
use App\Http\Livewire\Field;
// use Illuminate\Http\Request;
use App\Http\Requests\CreatekegiatanRequest as Request;
use Flash;


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
    protected $rules = [
        'nama_keg' => 'required|string',
        'rt_id' => 'required|integer',
        'tgl_mulai' => 'required',
        'tgl_selesai' => 'required',
        'approval' => 'nullable',
        'jen_keg' => 'required|integer',
        'pagu' => 'required|integer',
        'target' => 'required|integer',
        'volume' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
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
            // dd($keg->approval);
            // $this->nama_keg[0] = $keg->nama_keg;
            // $this->rtid[0] = $keg->rt_id;
            // $this->tm[0] = $keg->tgl_mulai;
            // $this->ts[0] = $keg->tgl_selesai;
            // $this->sumber[0] = $keg->sumber_dana;
            // $this->ap[0] = $keg->approval;
            // $this->jk[0] = $keg->jen_keg;
            // $this->pagu[0] = $keg->pagu;
            // $this->target[0] = $keg->target;
            // $this->volume[0] = $keg->volume;
            // $this->sat[0] = $keg->satuan;
            return view('livewire.fields-kegiatan')->with('kegiatan', $kegiatan);
        }
        return view('livewire.fields-kegiatan')->with('jen_kegItems',$jen_kegItems);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }
    public function update()
    {
        // Kegiatan
    }
    public function store()
    {
        

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
                ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        Flash::success('Data berhasil diinput.');
        return redirect(route('kegiatans.index'));
    }

}