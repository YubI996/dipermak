<?php

namespace App\Exports;

use App\Models\kegiatan as keg;
use App\Models\partisipasi as par;
use App\Models\kecamatan as kec;
use App\Models\kelurahan as kel;
use App\Models\rt;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;




class TableExport implements 
// FromView
// FromQuery
FromCollection, WithHeadings

{   
    use Exportable;
    protected $pars;
    protected $kels;
    protected $kecs;
    protected $rts;
    protected $data;

    public $keg;
    
    // public function view(): View
    // {
    //     return view('kegiatans.table', [
    //         'kegiatans' => keg::all()
    //     ]);
    // }
    public function __construct($data)
    {
        $this->keg = $data;
    }

    public function collection()
    {
        return new collection($this->keg);
        // return Student::query()->find($this->kegs);
        // return Student::query()->whereKey($this->students);
    }
    public function headings(): array
    {
        return ["Pagu Kecamatan", "Pagu Kelurahan", "Pagu RT","Total Partisipasi","Partisipasi Barang","Partisipasi Jasa","Partisipasi Uang"];
    }
}
