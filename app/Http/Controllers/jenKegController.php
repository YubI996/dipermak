<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatejenKegRequest;
use App\Http\Requests\UpdatejenKegRequest;
use App\Repositories\jenKegRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class jenKegController extends AppBaseController
{
    /** @var  jenKegRepository */
    private $jenKegRepository;

    public function __construct(jenKegRepository $jenKegRepo)
    {
        $this->jenKegRepository = $jenKegRepo;
    }

    /**
     * Display a listing of the jenKeg.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jenKegs = $this->jenKegRepository->all()->sortbyDesc('created_at');

        return view('jen_kegs.index')
            ->with('jenKegs', $jenKegs);
    }

    /**
     * Show the form for creating a new jenKeg.
     *
     * @return Response
     */
    public function create()
    {
        return view('jen_kegs.create');
    }

    /**
     * Store a newly created jenKeg in storage.
     *
     * @param CreatejenKegRequest $request
     *
     * @return Response
     */
    public function store(CreatejenKegRequest $request)
    {
        $input = $request->all();

        $jenKeg = $this->jenKegRepository->create($input);

        Flash::success('Jen Keg saved successfully.');

        return redirect(route('jenKegs.index'));
    }

    /**
     * Display the specified jenKeg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            Flash::error('Jen Keg not found');

            return redirect(route('jenKegs.index'));
        }

        return view('jen_kegs.show')->with('jenKeg', $jenKeg);
    }

    /**
     * Show the form for editing the specified jenKeg.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            Flash::error('Jen Keg not found');

            return redirect(route('jenKegs.index'));
        }

        return view('jen_kegs.edit')->with('jenKeg', $jenKeg);
    }

    /**
     * Update the specified jenKeg in storage.
     *
     * @param int $id
     * @param UpdatejenKegRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejenKegRequest $request)
    {
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            Flash::error('Jen Keg not found');

            return redirect(route('jenKegs.index'));
        }

        $jenKeg = $this->jenKegRepository->update($request->all(), $id);

        Flash::success('Jen Keg updated successfully.');

        return redirect(route('jenKegs.index'));
    }

    /**
     * Remove the specified jenKeg from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenKeg = $this->jenKegRepository->find($id);

        if (empty($jenKeg)) {
            Flash::error('Jen Keg not found');

            return redirect(route('jenKegs.index'));
        }

        $this->jenKegRepository->delete($id);

        Flash::success('Jen Keg deleted successfully.');

        return redirect(route('jenKegs.index'));
    }
}
