<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatertAPIRequest;
use App\Http\Requests\API\UpdatertAPIRequest;
use App\Models\rt;
use App\Repositories\rtRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class rtController
 * @package App\Http\Controllers\API
 */

class rtAPIController extends AppBaseController
{
    /** @var  rtRepository */
    private $rtRepository;

    public function __construct(rtRepository $rtRepo)
    {
        $this->rtRepository = $rtRepo;
    }

    /**
     * Display a listing of the rt.
     * GET|HEAD /rts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rts = $this->rtRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($rts->toArray(), 'Rts retrieved successfully');
    }

    /**
     * Store a newly created rt in storage.
     * POST /rts
     *
     * @param CreatertAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatertAPIRequest $request)
    {
        $input = $request->all();

        $rt = $this->rtRepository->create($input);

        return $this->sendResponse($rt->toArray(), 'Rt saved successfully');
    }

    /**
     * Display the specified rt.
     * GET|HEAD /rts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var rt $rt */
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            return $this->sendError('Rt not found');
        }

        return $this->sendResponse($rt->toArray(), 'Rt retrieved successfully');
    }

    /**
     * Update the specified rt in storage.
     * PUT/PATCH /rts/{id}
     *
     * @param int $id
     * @param UpdatertAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatertAPIRequest $request)
    {
        $input = $request->all();

        /** @var rt $rt */
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            return $this->sendError('Rt not found');
        }

        $rt = $this->rtRepository->update($input, $id);

        return $this->sendResponse($rt->toArray(), 'rt updated successfully');
    }

    /**
     * Remove the specified rt from storage.
     * DELETE /rts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var rt $rt */
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            return $this->sendError('Rt not found');
        }

        $rt->delete();

        return $this->sendSuccess('Rt deleted successfully');
    }
}
