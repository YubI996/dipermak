<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepartisipasiRequest;
use App\Http\Requests\UpdatepartisipasiRequest;
use App\Repositories\partisipasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class partisipasiController extends AppBaseController
{
    /** @var  partisipasiRepository */
    private $partisipasiRepository;

    public function __construct(partisipasiRepository $partisipasiRepo)
    {
        $this->partisipasiRepository = $partisipasiRepo;
    }

    /**
     * Display a listing of the partisipasi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $partisipasis = $this->partisipasiRepository->OrderBy('created_at', 'DESC')->get();
        $partisipasis = $this->partisipasiRepository->all()->sortbyDesc('created_at');

        return view('partisipasis.index')
            ->with('partisipasis', $partisipasis);
    }

    /**
     * Show the form for creating a new partisipasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('partisipasis.create');
    }

    /**
     * Store a newly created partisipasi in storage.
     *
     * @param CreatepartisipasiRequest $request
     *
     * @return Response
     */
    public function store(CreatepartisipasiRequest $request)
    {
        $input = $request->all();

        $partisipasi = $this->partisipasiRepository->create($input);

        Flash::success('Partisipasi saved successfully.');

        return redirect(route('partisipasis.index'));
    }

    /**
     * Display the specified partisipasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            Flash::error('Partisipasi not found');

            return redirect(route('partisipasis.index'));
        }

        return view('partisipasis.show')->with('partisipasi', $partisipasi);
    }

    /**
     * Show the form for editing the specified partisipasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            Flash::error('Partisipasi not found');

            return redirect(route('partisipasis.index'));
        }

        return view('partisipasis.edit')->with('partisipasi', $partisipasi);
    }

    /**
     * Update the specified partisipasi in storage.
     *
     * @param int $id
     * @param UpdatepartisipasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepartisipasiRequest $request)
    {
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            Flash::error('Partisipasi not found');

            return redirect(route('partisipasis.index'));
        }

        $partisipasi = $this->partisipasiRepository->update($request->all(), $id);

        Flash::success('Partisipasi updated successfully.');

        return redirect(route('partisipasis.index'));
    }

    /**
     * Remove the specified partisipasi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partisipasi = $this->partisipasiRepository->find($id);

        if (empty($partisipasi)) {
            Flash::error('Partisipasi not found');

            return redirect(route('partisipasis.index'));
        }

        $this->partisipasiRepository->delete($id);

        Flash::success('Partisipasi deleted successfully.');

        return redirect(route('partisipasis.index'));
    }
}
