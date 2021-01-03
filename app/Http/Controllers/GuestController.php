<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kegiatan;
use App\Models\Partisipasi;
use App\Models\User;

class GuestController extends Controller
{
    public function index()
    {
        try {
            $allTarget = ((Partisipasi::whereYear('created_at',date('Y'))->sum('nominal'))/(Kegiatan::whereYear('created_at',date('Y'))->sum('target')))*100; 
            } 
        catch (\Exception $e) {
            // throw $th;
            $allTarget = 0;
        }
        if(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',1)->sum('target')>0){
            $smartTarget = ((Partisipasi::whereYear('created_at',date('Y'))->whereHas('kegiatan',function($q){$q->where('jen_keg','=','1');})->sum('nominal'))/(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',1)->sum('target')))*100; 
        }
        else{$smartTarget = 0;}
        if(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',2)->sum('target')>0){
            $greenTarget = ((Partisipasi::whereYear('created_at',date('Y'))->whereHas('kegiatan',function($q){$q->where('jen_keg','=','2');})->sum('nominal'))/(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',2)->sum('target')))*100; 
        }
        else{$greenTarget = 0;}
        if(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',3)->sum('target')>0){
            $creativeTarget = ((Partisipasi::whereYear('created_at',date('Y'))->whereHas('kegiatan',function($q){$q->where('jen_keg','=','3');})->sum('nominal'))/(Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',3)->sum('target')))*100; 
        }
        else{$creativeTarget = 0;}
        $allPagu = Kegiatan::whereYear('created_at',date('Y'))->sum('pagu');
        $smartPagu = Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',1)->sum('pagu');
        $greenPagu = Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',2)->sum('pagu');
        $creativePagu = Kegiatan::whereYear('created_at',date('Y'))->where('jen_keg',3)->sum('pagu');
        return view('welcome',\compact('allTarget','smartTarget','greenTarget','creativeTarget','allPagu','smartPagu','creativePagu','greenPagu'));
    }
}
