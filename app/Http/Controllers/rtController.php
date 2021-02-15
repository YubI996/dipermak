<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatertRequest;
use App\Http\Requests\UpdatertRequest;
use App\Repositories\rtRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class rtController extends AppBaseController
{
    /** @var  rtRepository */
    private $rtRepository;

    public function __construct(rtRepository $rtRepo)
    {
        $this->rtRepository = $rtRepo;
    }

    /**
     * Display a listing of the rt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rts = $this->rtRepository->all()->sortbyDesc('created_at');

        return view('rts.index')
            ->with('rts', $rts);
    }

    /**
     * Show the form for creating a new rt.
     *
     * @return Response
     */
    public function create()
    {
        return view('rts.create');
    }

    /**
     * Store a newly created rt in storage.
     *
     * @param CreatertRequest $request
     *
     * @return Response
     */
    public function store(CreatertRequest $request)
    {
        $input = $request->all();

        $rt = $this->rtRepository->create($input);

        Flash::success('Rt saved successfully.');

        return redirect(route('rts.index'));
    }

    /**
     * Display the specified rt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        return view('rts.show')->with('rt', $rt);
    }

    /**
     * Show the form for editing the specified rt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        return view('rts.edit')->with('rt', $rt);
    }

    /**
     * Update the specified rt in storage.
     *
     * @param int $id
     * @param UpdatertRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatertRequest $request)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        $rt = $this->rtRepository->update($request->all(), $id);

        Flash::success('Rt updated successfully.');

        return redirect(route('rts.index'));
    }

    /**
     * Remove the specified rt from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rt = $this->rtRepository->find($id);

        if (empty($rt)) {
            Flash::error('Rt not found');

            return redirect(route('rts.index'));
        }

        $this->rtRepository->delete($id);

        Flash::success('Rt deleted successfully.');

        return redirect(route('rts.index'));
    }
}
