<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PaguExport;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function export() 
    {
        return Excel::download(new PaguExport, 'data.xlsx');
    }
}
