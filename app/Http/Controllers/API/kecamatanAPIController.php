<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekecamatanAPIRequest;
use App\Http\Requests\API\UpdatekecamatanAPIRequest;
use App\Models\kecamatan;
use App\Repositories\kecamatanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kecamatanController
 * @package App\Http\Controllers\API
 */

class kecamatanAPIController extends AppBaseController
{
    /** @var  kecamatanRepository */
    private $kecamatanRepository;

    public function __construct(kecamatanRepository $kecamatanRepo)
    {
        $this->kecamatanRepository = $kecamatanRepo;
    }

    /**
     * Display a listing of the kecamatan.
     * GET|HEAD /kecamatans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kecamatans = $this->kecamatanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kecamatans->toArray(), 'Kecamatans retrieved successfully');
    }

    /**
     * Store a newly created kecamatan in storage.
     * POST /kecamatans
     *
     * @param CreatekecamatanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekecamatanAPIRequest $request)
    {
        $input = $request->all();

        $kecamatan = $this->kecamatanRepository->create($input);

        return $this->sendResponse($kecamatan->toArray(), 'Kecamatan saved successfully');
    }

    /**
     * Display the specified kecamatan.
     * GET|HEAD /kecamatans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kecamatan $kecamatan */
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            return $this->sendError('Kecamatan not found');
        }

        return $this->sendResponse($kecamatan->toArray(), 'Kecamatan retrieved successfully');
    }

    /**
     * Update the specified kecamatan in storage.
     * PUT/PATCH /kecamatans/{id}
     *
     * @param int $id
     * @param UpdatekecamatanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekecamatanAPIRequest $request)
    {
        $input = $request->all();

        /** @var kecamatan $kecamatan */
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            return $this->sendError('Kecamatan not found');
        }

        $kecamatan = $this->kecamatanRepository->update($input, $id);

        return $this->sendResponse($kecamatan->toArray(), 'kecamatan updated successfully');
    }

    /**
     * Remove the specified kecamatan from storage.
     * DELETE /kecamatans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kecamatan $kecamatan */
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            return $this->sendError('Kecamatan not found');
        }

        $kecamatan->delete();

        return $this->sendSuccess('Kecamatan deleted successfully');
    }
}
