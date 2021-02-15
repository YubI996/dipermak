<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekecamatanRequest;
use App\Http\Requests\UpdatekecamatanRequest;
use App\Repositories\kecamatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class kecamatanController extends AppBaseController
{
    /** @var  kecamatanRepository */
    private $kecamatanRepository;

    public function __construct(kecamatanRepository $kecamatanRepo)
    {
        $this->kecamatanRepository = $kecamatanRepo;
    }

    /**
     * Display a listing of the kecamatan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kecamatans = $this->kecamatanRepository->all()->sortbyDesc('created_at');

        return view('kecamatans.index')
            ->with('kecamatans', $kecamatans);
    }

    /**
     * Show the form for creating a new kecamatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kecamatans.create');
    }

    /**
     * Store a newly created kecamatan in storage.
     *
     * @param CreatekecamatanRequest $request
     *
     * @return Response
     */
    public function store(CreatekecamatanRequest $request)
    {
        $input = $request->all();

        $kecamatan = $this->kecamatanRepository->create($input);

        Flash::success('Kecamatan saved successfully.');

        return redirect(route('kecamatans.index'));
    }

    /**
     * Display the specified kecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        return view('kecamatans.show')->with('kecamatan', $kecamatan);
    }

    /**
     * Show the form for editing the specified kecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        return view('kecamatans.edit')->with('kecamatan', $kecamatan);
    }

    /**
     * Update the specified kecamatan in storage.
     *
     * @param int $id
     * @param UpdatekecamatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekecamatanRequest $request)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        $kecamatan = $this->kecamatanRepository->update($request->all(), $id);

        Flash::success('Kecamatan updated successfully.');

        return redirect(route('kecamatans.index'));
    }

    /**
     * Remove the specified kecamatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        $this->kecamatanRepository->delete($id);

        Flash::success('Kecamatan deleted successfully.');

        return redirect(route('kecamatans.index'));
    }
}
