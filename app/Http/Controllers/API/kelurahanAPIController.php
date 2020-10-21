<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekelurahanAPIRequest;
use App\Http\Requests\API\UpdatekelurahanAPIRequest;
use App\Models\kelurahan;
use App\Repositories\kelurahanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kelurahanController
 * @package App\Http\Controllers\API
 */

class kelurahanAPIController extends AppBaseController
{
    /** @var  kelurahanRepository */
    private $kelurahanRepository;

    public function __construct(kelurahanRepository $kelurahanRepo)
    {
        $this->kelurahanRepository = $kelurahanRepo;
    }

    /**
     * Display a listing of the kelurahan.
     * GET|HEAD /kelurahans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kelurahans = $this->kelurahanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kelurahans->toArray(), 'Kelurahans retrieved successfully');
    }

    /**
     * Store a newly created kelurahan in storage.
     * POST /kelurahans
     *
     * @param CreatekelurahanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekelurahanAPIRequest $request)
    {
        $input = $request->all();

        $kelurahan = $this->kelurahanRepository->create($input);

        return $this->sendResponse($kelurahan->toArray(), 'Kelurahan saved successfully');
    }

    /**
     * Display the specified kelurahan.
     * GET|HEAD /kelurahans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        return $this->sendResponse($kelurahan->toArray(), 'Kelurahan retrieved successfully');
    }

    /**
     * Update the specified kelurahan in storage.
     * PUT/PATCH /kelurahans/{id}
     *
     * @param int $id
     * @param UpdatekelurahanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekelurahanAPIRequest $request)
    {
        $input = $request->all();

        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        $kelurahan = $this->kelurahanRepository->update($input, $id);

        return $this->sendResponse($kelurahan->toArray(), 'kelurahan updated successfully');
    }

    /**
     * Remove the specified kelurahan from storage.
     * DELETE /kelurahans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        $kelurahan->delete();

        return $this->sendSuccess('Kelurahan deleted successfully');
    }
}
