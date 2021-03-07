<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PaguExport;
use App\Exports\TableExport;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function export() 
    {
        return (new PaguExport)->download('data.xlsx');
    }
    public function export2() 
    {
        // (new TableExport)->download('data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return (new TableExport)->download('data.xlsx');
    }
}
