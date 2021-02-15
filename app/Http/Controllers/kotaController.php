<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekotaRequest;
use App\Http\Requests\UpdatekotaRequest;
use App\Repositories\kotaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class kotaController extends AppBaseController
{
    /** @var  kotaRepository */
    private $kotaRepository;

    public function __construct(kotaRepository $kotaRepo)
    {
        $this->kotaRepository = $kotaRepo;
    }

    /**
     * Display a listing of the kota.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kotas = $this->kotaRepository->all()->sortbyDesc('created_at');

        return view('kotas.index')
            ->with('kotas', $kotas);
    }

    /**
     * Show the form for creating a new kota.
     *
     * @return Response
     */
    public function create()
    {
        return view('kotas.create');
    }

    /**
     * Store a newly created kota in storage.
     *
     * @param CreatekotaRequest $request
     *
     * @return Response
     */
    public function store(CreatekotaRequest $request)
    {
        $input = $request->all();

        $kota = $this->kotaRepository->create($input);

        Flash::success('Kota saved successfully.');

        return redirect(route('kotas.index'));
    }

    /**
     * Display the specified kota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        return view('kotas.show')->with('kota', $kota);
    }

    /**
     * Show the form for editing the specified kota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        return view('kotas.edit')->with('kota', $kota);
    }

    /**
     * Update the specified kota in storage.
     *
     * @param int $id
     * @param UpdatekotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekotaRequest $request)
    {
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        $kota = $this->kotaRepository->update($request->all(), $id);

        Flash::success('Kota updated successfully.');

        return redirect(route('kotas.index'));
    }

    /**
     * Remove the specified kota from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            Flash::error('Kota not found');

            return redirect(route('kotas.index'));
        }

        $this->kotaRepository->delete($id);

        Flash::success('Kota deleted successfully.');

        return redirect(route('kotas.index'));
    }
}
