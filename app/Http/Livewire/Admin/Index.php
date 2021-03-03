<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\TableExport;
use App\Models\kegiatan;
use App\Models\partisipasi as par;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rt;

class Index extends Component
{
    use WithPagination;
    
    public $kec;
    public $kel;
    public $rtid;
    public $kid;
    public $kelurahanItems;
    public $kecamatanItems;
    public $rtItems;
    public $dataKec;
    public $dataKel;
    public $dataRT;
    
    public $paginate = 10;
    public $search = "";
    public $selectedClass = null;
    public $sections = null;
    public $selectedSection = null;
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;



    function mount(){
        // $rtid=$this->rtid;
        // $this->kel = rt::where('id', $this->rtid)->value('kel_id');
        // $this->kec = kelurahan::where('id', $this->kel)->value('kec_id');
        $this->kelurahanItems = Kelurahan::pluck('nama_kel','id')->toArray();
        $this->kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
        $this->rtItems = Rt::pluck('nama_rt','id')->toArray();

    }
    public function Updatedkec()
    {
            $this->kelurahanItems = Kelurahan::where('kec_id',$this->kec)->pluck('nama_kel','id')->toArray();
            $this->dataKec['pagu'] = kegiatan::whereHas('rt', function ($q){ $q->wherehas('kelurahan',function($q){$q->where('kec_id',$this->kec);}); })->sum('pagu');
            $this->dataKec['totPart'] = par::whereHas('kegiatan', function ($q){ $q->wherehas('rt',function($q){$q->whereHas('kelurahan',function($q){$q->where('kec_id',$this->kec);});}); })->sum('nominal');
            $this->dataKec['partBar'] = par::where('jenis','Barang')->whereHas('kegiatan', function ($q){ $q->wherehas('rt',function($q){$q->whereHas('kelurahan',function($q){$q->where('kec_id',$this->kec);});}); })->sum('nominal');
            $this->dataKec['partJas'] = par::where('jenis','Jasa')->whereHas('kegiatan', function ($q){ $q->wherehas('rt',function($q){$q->whereHas('kelurahan',function($q){$q->where('kec_id',$this->kec);});}); })->sum('nominal');
            $this->dataKec['partUa'] = par::where('jenis','Uang')->whereHas('kegiatan', function ($q){ $q->wherehas('rt',function($q){$q->whereHas('kelurahan',function($q){$q->where('kec_id',$this->kec);});}); })->sum('nominal');
            $this->kel = 0;
            $this->rt = 0;

    }
    public function Updatedkel()
    {
            $this->rtItems = Rt::where('kel_id',$this->kel)->pluck('nama_rt','id')->toArray();
            $this->dataKel = ['pagu' => kegiatan::whereHas('rt', function ($q){ $q->where('kel_id',$this->kel); })->sum('pagu')];

        }
        public function UpdatedRtid()
        {
        $this->dataRT = ['pagu' => kegiatan::where('rt_id',$this->rtid)->sum('pagu')];
        // $this->emit('reload');
        $this->emitSelf('RT');
        // $this->dispatchBrowserEvent('rthome', ['rt' => $this->rtid]);
    }
    public function render()
    {
        // $pagukec = empty($this->dataKec['pagu'])?$this->dataKec['pagu']:0;
        // $pagukel = empty($this->dataKel['pagu'])?$this->dataKel['pagu']:0;
        // $pagurt = empty($this->dataRT['pagu'])?$this->dataRT['pagu']:0;
        // $totpart = empty($this->dataKec['totPart'])?$this->dataKec['totPart']:0;
        // $partbar = empty($this->dataKec['partBar'])?$this->dataKec['partBar']:0;
        // $partjas = empty($this->dataKec['partJas'])?$this->dataKec['partJas']:0;
        // $partua = empty($this->dataKec['partUa'])?$this->dataKec['partUa']:0;
        return view('livewire.admin.index');
    }

    public function exportTable()
    {
        return (new TableExport(1))->download('data.xlsx');
    }
}
