<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kegiatan;
use App\Models\RT;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Livewire\WithPagination;
use App\Exports\StudentsExport;

class KegiatanTable extends Component
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
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['rtid'];
    public function rtid($rtid)
    {
        $this->rtid = $rtid;
    }

    public function render()
    {   $rts = RT::whereHas('kegiatans')->with('kelurahan','kelurahan.kecamatan')->get()->sortby('nama_rt');
        $rtids = RT::whereHas('kegiatans')->get('id')->toArray();
        // $rt_ar = array($rtids$rts);
        // dd($rt_ar);
        // $kegiatans = Kegiatan::with('rt')->get()->sortbydesc('rt_id')->sortbydesc('created_at');
        return view('livewire.kegiatan-table', [
            'kegiatans' => $this->kegiatans,
            'rts' => $rts
        ]);
    }
    
    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->students->pluck('id')->map(function($item){
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
        $this->checked = $this->kegiatansQuery->pluck('id')->map(function($item){return $item;})->toArray();
    }

    public function getkegiatansProperty()
    {
        return $this->kegiatansQuery->paginate($this->paginate);
    }

    public function getkegiatansQueryProperty()
    {
        return Kegiatan::with(['rt'])
            ->when($this->selectedRt, function ($query) {
                $query->where('rt_id', $this->selectedRt);
            })
            ->when($this->rtid, function ($query) {
                $query->where('rt_id', $this->rtid);
            })
            ->search(trim($this->search));
    }

    public function deleteRecords()
    {
        Student::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('info', 'Selected Records were deleted Successfully');
    }

    public function exportSelected()
    {
        return (new StudentsExport($this->checked))->download('students.xlsx');
    }


    public function deleteSingleRecord($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();
        $this->checked = array_diff($this->checked, [$student_id]);
        session()->flash('info', 'Record deleted Successfully');
    }

    public function isChecked($student_id)
    {
        return in_array($student_id, $this->checked);
    }

}
