<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\kecamatanRepository;
use App\Repositories\kelurahanRepository;
use App\Repositories\rtRepository;
use App\Repositories\userRepository;
use App\Models\kecamatan as kec;

class pengaturanController extends Controller
{

    private $kecamatanRepository;
    private $kelurahanRepository;
    private $rtRepository;
    private $userRepository;
    public function __construct(kecamatanRepository $kecamatanRepo, kelurahanRepository $kelurahanRepo, rtRepository $rtRepo, userRepository $userRepo)
    {
        $this->kecamatanRepository = $kecamatanRepo;
        $this->kelurahanRepository = $kelurahanRepo;
        $this->rtRepository = $rtRepo;
        $this->userRepository = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kecamatans = $this->kecamatanRepository->all();
        // // $kec = $kecamatans->pluck('nama_kec', 'id');
        // $kelurahans = $this->kelurahanRepository->all();
        // $rts = $this->rtRepository->all()->toarray();
        $users = $this->userRepository->all();
        $kecs = kec::with('kelurahan.rt')->get();

        return view('pengaturan.index',compact('kecs', 'users'));
        // ->with('dokumentasis', $dokumentasis, );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
