<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekotaAPIRequest;
use App\Http\Requests\API\UpdatekotaAPIRequest;
use App\Models\kota;
use App\Repositories\kotaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kotaController
 * @package App\Http\Controllers\API
 */

class kotaAPIController extends AppBaseController
{
    /** @var  kotaRepository */
    private $kotaRepository;

    public function __construct(kotaRepository $kotaRepo)
    {
        $this->kotaRepository = $kotaRepo;
    }

    /**
     * Display a listing of the kota.
     * GET|HEAD /kotas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kotas = $this->kotaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kotas->toArray(), 'Kotas retrieved successfully');
    }

    /**
     * Store a newly created kota in storage.
     * POST /kotas
     *
     * @param CreatekotaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekotaAPIRequest $request)
    {
        $input = $request->all();

        $kota = $this->kotaRepository->create($input);

        return $this->sendResponse($kota->toArray(), 'Kota saved successfully');
    }

    /**
     * Display the specified kota.
     * GET|HEAD /kotas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        return $this->sendResponse($kota->toArray(), 'Kota retrieved successfully');
    }

    /**
     * Update the specified kota in storage.
     * PUT/PATCH /kotas/{id}
     *
     * @param int $id
     * @param UpdatekotaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekotaAPIRequest $request)
    {
        $input = $request->all();

        /** @var kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota = $this->kotaRepository->update($input, $id);

        return $this->sendResponse($kota->toArray(), 'kota updated successfully');
    }

    /**
     * Remove the specified kota from storage.
     * DELETE /kotas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kota $kota */
        $kota = $this->kotaRepository->find($id);

        if (empty($kota)) {
            return $this->sendError('Kota not found');
        }

        $kota->delete();

        return $this->sendSuccess('Kota deleted successfully');
    }
}
