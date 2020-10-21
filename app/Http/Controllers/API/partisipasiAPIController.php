<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepartisipasiAPIRequest;
use App\Http\Requests\API\UpdatepartisipasiAPIRequest;
use App\Models\partisipasi;
use App\Repositories\partisipasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class partisipasiController
 * @package App\Http\Controllers\API
 */

class partisipasiAPIController extends AppBaseController
{
    /** @var  partisipasiRepository */
    private $partisipasiRepository;

    public function __construct(partisipasiRepository $partisipasiRepo)
    {
        $this->partisipasiRepository = $partisipasiRepo;
    }

    /**
     * Display a listing of the partisipasi.
     * GET|HEAD /partisipasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $partisipasis = $this->partisipasiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($partisipasis->toArray(), 'Partisipasis retrieved successfully');
    }

    /**
     * Store a newly created partisipasi in storage.
     * POST /partisipasis
     *
     * @param CreatepartisipasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepartisipasiAPIRequest $request)
    {
        $input = $request->all();

        $partisipasi = $this->partisipasiRepository->create($input);

        return $this->sendResponse($partisipasi->toArray(), 'Partisipasi saved successfully');
    }

    /**
     * Display the specified partisipasi.
     * GET|HEAD /partisipasis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var partisipasi $partisipasi */
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            return $this->sendError('Partisipasi not found');
        }

        return $this->sendResponse($partisipasi->toArray(), 'Partisipasi retrieved successfully');
    }

    /**
     * Update the specified partisipasi in storage.
     * PUT/PATCH /partisipasis/{id}
     *
     * @param int $id
     * @param UpdatepartisipasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepartisipasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var partisipasi $partisipasi */
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            return $this->sendError('Partisipasi not found');
        }

        $partisipasi = $this->partisipasiRepository->update($input, $id);

        return $this->sendResponse($partisipasi->toArray(), 'partisipasi updated successfully');
    }

    /**
     * Remove the specified partisipasi from storage.
     * DELETE /partisipasis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var partisipasi $partisipasi */
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            return $this->sendError('Partisipasi not found');
        }

        $partisipasi->delete();

        return $this->sendSuccess('Partisipasi deleted successfully');
    }
}
