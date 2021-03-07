<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kegiatan;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;

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
    
    public $inputs = [];
    public $i = 0;

    protected $listeners = ['rtid'];
    public function rtid($rtid)
    {
        $this->rtid = $rtid;
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
        return view('livewire.fields-kegiatan');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'nama_keg.0' => 'required',
                'nama_keg.*' => 'required',
                'rtid.0' => 'required',
                'rtid.*' => 'required',
                'tm.0' => 'required',
                'tm.*' => 'required',
                'ts.0' => 'required',
                'ts.*' => 'required',
                'sumber.0' => 'required',
                'sumber.*' => 'required',
                'jk.0' => 'required',
                'jk.*' => 'required',
                'pagu.0' => 'required',
                'pagu.*' => 'required',
                'target.0' => 'required',
                'target.*' => 'required',
                'volume.0' => 'required',
                'volume.*' => 'required',
                'sat.0' => 'required',
                'sat.*' => 'required'
            ],
            [
                'nama_keg.0.required' => 'nama kegiatan harus diisi.',
                'nama_keg.*.required' => 'nama kegiatan harus diisi.',
                'rtid.0.required' => 'RT harus diisi.',
                'rtid.*.required' => 'RT harus diisi.',
                'tm.0.required' => 'Tanggal Mulai harus diisi.',
                'tm.*.required' => 'Tanggal Mulai harus diisi.',
                'ts.0.required' => 'Tanggal selesai harus diisi.',
                'ts.*.required' => 'Tanggal selesai harus diisi.',
                'sumber.0.required' => 'sumber dana harus diisi.',
                'sumber.*.required' => 'sumber dana harus diisi.',
                'jk.0.required' => 'Jenis Kegiatan harus diisi.',
                'jk.*.required' => 'Jenis Kegiatan harus diisi.',
                'pagu.0.required' => 'Pagu harus diisi.',
                'pagu.*.required' => 'Pagu harus diisi.',
                'target.0.required' => 'Target Partisipasi harus diisi.',
                'target.*.required' => 'Target Partisipasi harus diisi.',
                'volume.0.required' => 'Volume harus diisi.',
                'volume.*.required' => 'Volume harus diisi.',
                'sat.0.required' => 'Satuan harus diisi.',
                'sat.*.required' => 'Satuan harus diisi.'                
            ]
        );

        foreach ($this->name as $key => $value) {
            User::create(['name' => $this->name[$key], 'email' => $this->email[$key]]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Users Created Successfully.');
    }

}