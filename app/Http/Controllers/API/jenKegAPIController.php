<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatejenKegAPIRequest;
use App\Http\Requests\API\UpdatejenKegAPIRequest;
use App\Models\jenKeg;
use App\Repositories\jenKegRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class jenKegController
 * @package App\Http\Controllers\API
 */

class jenKegAPIController extends AppBaseController
{
    /** @var  jenKegRepository */
    private $jenKegRepository;

    public function __construct(jenKegRepository $jenKegRepo)
    {
        $this->jenKegRepository = $jenKegRepo;
    }

    /**
     * Display a listing of the jenKeg.
     * GET|HEAD /jenKegs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jenKegs = $this->jenKegRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jenKegs->toArray(), 'Jenis Kegiatans retrieved successfully');
    }

    /**
     * Store a newly created jenKeg in storage.
     * POST /jenKegs
     *
     * @param CreatejenKegAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatejenKegAPIRequest $request)
    {
        $input = $request->all();

        $jenKeg = $this->jenKegRepository->create($input);

        return $this->sendResponse($jenKeg->toArray(), 'Jenis Kegiatan saved successfully');
    }

    /**
     * Display the specified jenKeg.
     * GET|HEAD /jenKegs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var jenKeg $jenKeg */
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            return $this->sendError('Jenis Kegiatan not found');
        }

        return $this->sendResponse($jenKeg->toArray(), 'Jenis Kegiatan retrieved successfully');
    }

    /**
     * Update the specified jenKeg in storage.
     * PUT/PATCH /jenKegs/{id}
     *
     * @param int $id
     * @param UpdatejenKegAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejenKegAPIRequest $request)
    {
        $input = $request->all();

        /** @var jenKeg $jenKeg */
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            return $this->sendError('Jenis Kegiatan not found');
        }

        $jenKeg = $this->jenKegRepository->update($input, $id);

        return $this->sendResponse($jenKeg->toArray(), 'jenKeg updated successfully');
    }

    /**
     * Remove the specified jenKeg from storage.
     * DELETE /jenKegs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var jenKeg $jenKeg */
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            return $this->sendError('Jenis Kegiatan not found');
        }

        $jenKeg->delete();

        return $this->sendSuccess('Jenis Kegiatan deleted successfully');
    }
}
