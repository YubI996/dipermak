<?php

namespace App\Exports;

use App\Models\kegiatan as keg;
use App\Models\partisipasi as par;
use App\Models\kecamatan as kec;
use App\Models\kelurahan as kel;
use App\Models\rt;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class TableExport implements FromView

{   
    use Exportable;
    protected $pars;
    protected $kels;
    protected $kecs;
    protected $rts;
    protected $data;

    public $kegs;
    
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoice::all()
        ]);
    }
    // public function __construct($data)
    // {
    //     $this->kegs = $data;
    // }

    // public function query()
    // {
    //     // return $this->data;
    //     return Student::query()->find($this->kegs);
    //     // return Student::query()->whereKey($this->students);
    // }
}
