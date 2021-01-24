<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rt;
use App\Models\kegiatan;

class FieldsKegiatan extends Component
{
    public $kec;
    public $kel;
    public $rtid;
    public $kid;
    public $pagu;
    public $per;
    public $nom;
    public $ap;
    public $tm;
    public $ts;
    public function render()
    {
        if (!(empty($this->kid)))
        {
            $keg = kegiatan::where('id',$this->kid)->first();
            $rt_id = $keg->value('rt_id');
            $kel_id = rt::where('id',$rt_id)->first()->kel_id;
            $kec_id = rt::where('id',$rt_id)->first()->kelurahan->kec_id;
            $kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
            $kelurahanItems = kelurahan::where('kec_id',$kec_id)->pluck('nama_kel','id')->toArray();
            $rtItems = rt::where('kel_id',$kel_id)->pluck('nama_rt','id')->toArray();
            $this->kec = $kec_id;
            $this->kel = $kel_id;
            $this->rtid = $rt_id;
            $this->pagu = $keg->value('pagu');
            $this->target = $keg->value('target');
            $this->per = intval(($this->target / $this->pagu) * 100);
            $this->ap = $keg->approval;
            $this->tm = $keg->tgl_mulai;
            $this->ts = $keg->tgl_selesai;
            return view('livewire.fields-kegiatan', compact('kecamatanItems','kelurahanItems','rtItems'));
        }   
        elseif(empty($this->kid))
        {
            $kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
            $kelurahanItems = Kecamatan::pluck('nama_kel','id')->toArray();
            $rtItems = Kecamatan::pluck('nama_rt','id')->toArray();
            return view('livewire.fields-kegiatan', compact('kecamatanItems','kelurahanItems','rtItems'));
        }
        // pilih rt
        // if (!(empty($this->kec))) {
        //     $kelurahanItems = Kelurahan::where('kec_id',$this->kec)->pluck('nama_kel','id')->toArray();
        // }
        // else{
        //     $kelurahanItems = Kelurahan::pluck('nama_kel','id')->toArray();

        // }
        // if (!(empty($this->kel))) {
        //     $rtItems = Rt::where('kel_id',$this->kel)->pluck('nama_rt','id')->toArray();
        //     # code...
        // }
        // else{
        //     $rtItems = Rt::pluck('nama_rt','id')->toArray();
        // }
        //     $this->kel = rt::where('id', $this->rtid)->value('kel_id');
        //     $this->kec = kelurahan::where('id', $this->kel)->value('kec_id');
        //     dump($this->kel);
        //     dump($this->kec);
        //     //end pilih rt
        //     // dashboard
        //      $target=0;
       
        // if(!((empty($this->kid)))){
        //     $this->pagu = kegiatan::Where('id',$this->kid)->pluck('pagu')->first();
        //     $this->nom = Kegiatan::Where('id',$this->kid)->pluck('target')->first();
        //     $this->per = intval(($this->nom / $this->pagu) * 100);
            
        // }
        // if(((!(empty($this->pagu)))&&(!(empty($this->per))))){
        //     $this->nom = intval(($this->per / 100) * $this->pagu);
        //     // $target = $this->nom;
        // }
        // //end dashoboard
        // return view('livewire.fields-kegiatan');
    
        
    }
}