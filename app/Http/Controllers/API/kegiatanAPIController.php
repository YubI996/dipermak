<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekegiatanAPIRequest;
use App\Http\Requests\API\UpdatekegiatanAPIRequest;
use App\Models\kegiatan;
use App\Repositories\kegiatanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kegiatanController
 * @package App\Http\Controllers\API
 */

class kegiatanAPIController extends AppBaseController
{
    /** @var  kegiatanRepository */
    private $kegiatanRepository;

    public function __construct(kegiatanRepository $kegiatanRepo)
    {
        $this->kegiatanRepository = $kegiatanRepo;
    }

    /**
     * Display a listing of the kegiatan.
     * GET|HEAD /kegiatans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kegiatans = $this->kegiatanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kegiatans->toArray(), 'Kegiatans retrieved successfully');
    }

    /**
     * Store a newly created kegiatan in storage.
     * POST /kegiatans
     *
     * @param CreatekegiatanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekegiatanAPIRequest $request)
    {
        $input = $request->all();

        $kegiatan = $this->kegiatanRepository->create($input);

        return $this->sendResponse($kegiatan->toArray(), 'Kegiatan saved successfully');
    }

    /**
     * Display the specified kegiatan.
     * GET|HEAD /kegiatans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kegiatan $kegiatan */
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            return $this->sendError('Kegiatan not found');
        }

        return $this->sendResponse($kegiatan->toArray(), 'Kegiatan retrieved successfully');
    }

    /**
     * Update the specified kegiatan in storage.
     * PUT/PATCH /kegiatans/{id}
     *
     * @param int $id
     * @param UpdatekegiatanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekegiatanAPIRequest $request)
    {
        $input = $request->all();

        /** @var kegiatan $kegiatan */
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            return $this->sendError('Kegiatan not found');
        }

        $kegiatan = $this->kegiatanRepository->update($input, $id);

        return $this->sendResponse($kegiatan->toArray(), 'kegiatan updated successfully');
    }

    /**
     * Remove the specified kegiatan from storage.
     * DELETE /kegiatans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kegiatan $kegiatan */
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            return $this->sendError('Kegiatan not found');
        }

        $kegiatan->delete();

        return $this->sendSuccess('Kegiatan deleted successfully');
    }
}
