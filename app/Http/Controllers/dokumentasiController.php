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
        $dokumentasis = $this->dokumentasiRepository->all();

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
        $input['foto']->move(public_path('storage\\img\\dok'), Auth::user()->name.'.'.$input['foto']->getClientOriginalExtension());


        $dokumentasi = $this->dokumentasiRepository->create($input);
        $dokumentasi->foto = '\img\dok\\'.Auth::user()->name.'.'.$input['foto']->getClientOriginalExtension();
        $dokumentasi->save();


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

        $dokumentasi = $this->dokumentasiRepository->update($request->all(), $id);

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
