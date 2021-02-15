<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedokumentasiRequest;
use App\Http\Requests\UpdatedokumentasiRequest;
use App\Repositories\dokumentasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;
use App\Models\Kegiatan;
use App\Models\Rt;
use App\Models\Dokumentasi;

class dokumentasiController extends AppBaseController
{
    /** @var  dokumentasiRepository */
    private $dokumentasiRepository;

    public function __construct(dokumentasiRepository $dokumentasiRepo)
    {
        $this->dokumentasiRepository = $dokumentasiRepo;
    }

    /**
     * Display a listing of the dokumentasi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumentasis = $this->dokumentasiRepository->all()->sortbyDesc('created_at');

        return view('dokumentasis.index')
            ->with('dokumentasis', $dokumentasis);
    }

    /**
     * Show the form for creating a new dokumentasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('dokumentasis.create');
    }

    /**
     * Store a newly created dokumentasi in storage.
     *
     * @param CreatedokumentasiRequest $request
     *
     * @return Response
     */
    public function store(CreatedokumentasiRequest $request)
    {
        $input = $request->all();
        // dd($request->hasFile('foto'));
        // dump($request->foto); 
        // dd($input); 
        foreach ($request->foto as $index => $foto) {
            $keg = Kegiatan::where('id',$input['keg_id'])->value('nama_keg');
            $rt = Rt::where('id',$input['rt_id'])->value('nama_rt');
            $nama = '\\img\\dok\\'.$index.'_'.implode(' ', array_slice(explode(' ', $keg), 0, 3)).'_RT_'.$rt.'.'.$foto->getClientOriginalExtension();
            $path = '\\img\\dok';
            $dokumentasi = Dokumentasi::create([
                'keg_id' => $input['keg_id'],
                'rt_id' => $input['rt_id'],
                'foto' => $foto->storeAs('', $nama,'public'),
                'keterangan' => $input['keterangan']
            ]);
        }


        Flash::success('Dokumentasi saved successfully.');

        return redirect(route('dokumentasis.index'));
    }

    /**
     * Display the specified dokumentasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            Flash::error('Dokumentasi not found');

            return redirect(route('dokumentasis.index'));
        }

        return view('dokumentasis.show')->with('dokumentasi', $dokumentasi);
    }

    /**
     * Show the form for editing the specified dokumentasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            Flash::error('Dokumentasi not found');

            return redirect(route('dokumentasis.index'));
        }

        return view('dokumentasis.edit')->with('dokumentasi', $dokumentasi);
    }

    /**
     * Update the specified dokumentasi in storage.
     *
     * @param int $id
     * @param UpdatedokumentasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedokumentasiRequest $request)
    {
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            Flash::error('Dokumentasi not found');

            return redirect(route('dokumentasis.index'));
        }
        $dokumentasi = $this->dokumentasiRepository->update([$request->all(), $id]);
        foreach ($request->foto as $index => $foto) {
            $keg = Kegiatan::where('id',$input['keg_id'])->value('nama_keg');
            $rt = Rt::where('id',$input['rt_id'])->value('nama_rt');
            $nama = '\\img\\dok\\'.$index.'_'.implode(' ', array_slice(explode(' ', $keg), 0, 3)).'_RT_'.$rt.'.'.$foto->getClientOriginalExtension();
            $path = '\\img\\dok';
            $foto->move($path,$foto);
            $foto = $nama;
            $foto->storeAs('', $nama,'dok');
            $dokumentasi->update(['foto' => $foto,$id]);
        }

        Flash::success('Dokumentasi updated successfully.');

        return redirect(route('dokumentasis.index'));
    }

    /**
     * Remove the specified dokumentasi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            Flash::error('Dokumentasi not found');

            return redirect(route('dokumentasis.index'));
        }

        $this->dokumentasiRepository->delete($id);

        Flash::success('Dokumentasi deleted successfully.');

        return redirect(route('dokumentasis.index'));
    }
}
