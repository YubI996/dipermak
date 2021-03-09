<?php

namespace App\Exports;

use App\Models\Kegiatan;
use App\Models\Partisipasi;
use App\Models\Dokumentasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class TableExport implements FromView
{
    use Exportable;
    public $data;
    public $pt;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data, $table)
    {
        $this->pt = $table;
        switch ($table) {
            case 'keg':
                $this->data = Kegiatan::whereIn('id',$data)->get();
                
                break;
                
            case 'part':
                $this->data = Partisipasi::whereIn('id',$data)->get();
                
                break;
                
            case 'prog':
                $this->data = Dokumentasi::whereIn('id',$data)->get();

                break;
            
            default:
                
                break;
        }
    }
    public function view(): View
    {
        switch ($this->pt) {
            case 'keg':
                return view('mold.Export.table',[
                    'kegiatans'     => $this->data
                ]);
                break;
            
            case 'part':
                return view('partisipasis.table',[
                    'partisipasis'     => $this->data
                ]);
                break;
            
            case 'prog':
                return view('dokumentasis.table',[
                    'dokumentasis'     => $this->data
                ]);
                break;
            
            default:
                # code...
                break;
        }
        
    }
}
