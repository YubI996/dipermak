<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedokumentasiAPIRequest;
use App\Http\Requests\API\UpdatedokumentasiAPIRequest;
use App\Models\dokumentasi;
use App\Repositories\dokumentasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class dokumentasiController
 * @package App\Http\Controllers\API
 */

class dokumentasiAPIController extends AppBaseController
{
    /** @var  dokumentasiRepository */
    private $dokumentasiRepository;

    public function __construct(dokumentasiRepository $dokumentasiRepo)
    {
        $this->dokumentasiRepository = $dokumentasiRepo;
    }

    /**
     * Display a listing of the dokumentasi.
     * GET|HEAD /dokumentasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumentasis = $this->dokumentasiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dokumentasis->toArray(), 'Dokumentasis retrieved successfully');
    }

    /**
     * Store a newly created dokumentasi in storage.
     * POST /dokumentasis
     *
     * @param CreatedokumentasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedokumentasiAPIRequest $request)
    {
        $input = $request->all();

        $dokumentasi = $this->dokumentasiRepository->create($input);

        return $this->sendResponse($dokumentasi->toArray(), 'Dokumentasi saved successfully');
    }

    /**
     * Display the specified dokumentasi.
     * GET|HEAD /dokumentasis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var dokumentasi $dokumentasi */
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            return $this->sendError('Dokumentasi not found');
        }

        return $this->sendResponse($dokumentasi->toArray(), 'Dokumentasi retrieved successfully');
    }

    /**
     * Update the specified dokumentasi in storage.
     * PUT/PATCH /dokumentasis/{id}
     *
     * @param int $id
     * @param UpdatedokumentasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedokumentasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var dokumentasi $dokumentasi */
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            return $this->sendError('Dokumentasi not found');
        }

        $dokumentasi = $this->dokumentasiRepository->update($input, $id);

        return $this->sendResponse($dokumentasi->toArray(), 'dokumentasi updated successfully');
    }

    /**
     * Remove the specified dokumentasi from storage.
     * DELETE /dokumentasis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var dokumentasi $dokumentasi */
        $dokumentasi = $this->dokumentasiRepository->find($id);

        if (empty($dokumentasi)) {
            return $this->sendError('Dokumentasi not found');
        }

        $dokumentasi->delete();

        return $this->sendSuccess('Dokumentasi deleted successfully');
    }
}
