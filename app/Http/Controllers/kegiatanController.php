<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekegiatanRequest;
use App\Http\Requests\UpdatekegiatanRequest;
use App\Repositories\kegiatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Carbon\Carbon;


class kegiatanController extends AppBaseController
{
    /** @var  kegiatanRepository */
    private $kegiatanRepository;

    public function __construct(kegiatanRepository $kegiatanRepo)
    {
        $this->kegiatanRepository = $kegiatanRepo;
    }

    /**
     * Display a listing of the kegiatan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kegiatans = $this->kegiatanRepository->all()->sortbyDesc('created_at');

        return view('kegiatans.index')
            ->with('kegiatans', $kegiatans);
    }

    /**
     * Show the form for creating a new kegiatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kegiatans.create');
    }

    /**
     * Store a newly created kegiatan in storage.
     *
     * @param CreatekegiatanRequest $request
     *
     * @return Response
     */
    public function store(CreatekegiatanRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $kegiatan = $this->kegiatanRepository->create($input);

        Flash::success('Kegiatan saved successfully.');

        return redirect(route('kegiatans.index'));
    }

    /**
     * Display the specified kegiatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Flash::error('Kegiatan not found');

            return redirect(route('kegiatans.index'));
        }

        return view('kegiatans.show')->with('kegiatan', $kegiatan);
    }

    /**
     * Show the form for editing the specified kegiatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Flash::error('Kegiatan not found');

            return redirect(route('kegiatans.index'));
        }

        return view('kegiatans.edit')->with('kegiatan', $kegiatan);
    }

    /**
     * Update the specified kegiatan in storage.
     *
     * @param int $id
     * @param UpdatekegiatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekegiatanRequest $request)
    {
        $kegiatan = $this->kegiatanRepository->find($id);
        
        if (empty($kegiatan)) {
            Flash::error('Kegiatan not found');
            
            return redirect(route('kegiatans.index'));
        }
        $approval = isset($request->approval) ? true : false;
        $request->request->add(['approval' => $approval]);
        // dd($request);
        $kegiatan = $this->kegiatanRepository->update($request->all(), $id);

        Flash::success('Kegiatan updated successfully.');

        return redirect(route('kegiatans.index'));
    }

    /**
     * Remove the specified kegiatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        if (empty($kegiatan)) {
            Flash::error('Kegiatan not found');

            return redirect(route('kegiatans.index'));
        }

        $this->kegiatanRepository->delete($id);

        Flash::success('Kegiatan deleted successfully.');

        return redirect(route('kegiatans.index'));
    }
}
