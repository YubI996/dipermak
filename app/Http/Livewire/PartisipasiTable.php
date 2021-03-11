<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Partisipasi;
use App\Models\RT;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Livewire\WithPagination;
use App\Exports\TableExport;

class PartisipasiTable extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $selectedRt = null;
    public $sections = null;
    public $selectedSection = null;
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $rtid;
    public $rts;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['rtid'];
    public function rtid($rtid)
    {
        $this->rtid = $rtid;
    }
    public function mount()
    {
        $this->rts = RT::whereHas('partisipasis')->with('kelurahan','kelurahan.kecamatan')->get()->sortby('nama_rt');
    }
    
    public function render()
    {
        return view('livewire.partisipasi-table', [
            'partisipasis' => $this->partisipasis,
            'rts' => $this->rts
        ]);
    }
    
    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->partisipasis->pluck('id')->map(function($item){
                return $item;})->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->partisipasisQuery->pluck('id')->map(function($item){return $item;})->toArray();
    }

    public function getpartisipasisProperty()
    {
        return $this->partisipasisQuery->paginate($this->paginate);
    }

    public function getpartisipasisQueryProperty()
    {
        return Partisipasi::with(['rt'])
            ->when($this->selectedRt, function ($query) {
                $query->where('rt_id', $this->selectedRt);
            })
            ->when($this->rtid, function ($query) {
                $query->where('rt_id', $this->rtid);
            })
            ->search(trim($this->search))
            ->orderBy('created_at', 'DESC')
            ->orderBy('rt_id', 'ASC');
    }

    public function deleteRecords()
    {
        Partisipasi::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('info', 'Data yang dipilih telah dihapus');
    }

    public function exportSelected()
    {
        $table = 'part';
        return (new TableExport($this->checked,$table))->download('partisipasis.xlsx');
    }


    public function deleteSingleRecord($partisipasi_id)
    {
        $partisipasi = Partisipasi::findOrFail($partisipasi_id);
        $partisipasi->delete();
        $this->checked = array_diff($this->checked, [$partisipasi_id]);
        session()->flash('info', 'Data telah dihapus');
    }

    public function isChecked($partisipasi_id)
    {
        return in_array($partisipasi_id, $this->checked);
    }

}
