<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateuserRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Repositories\userRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Hash;
use Response;
use App\Models\User;

class userController extends AppBaseController
{
    /** @var  userRepository */
    private $userRepository;

    public function __construct(userRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all()->sortbyDesc('created_at');

        return view('users.index')
        ->with('users', $users);
    }
    
    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param CreateuserRequest $request
     *
     * @return Response
     */
    public function store(CreateuserRequest $request)
    {
        $input = $request->all();
        $input['foto']->move(public_path('storage\\img\\foto'), Auth::user()->name.'.'.$input['foto']->getClientOriginalExtension());
        // $input['foto']->storeAs(('storage\\img\\foto'),Auth::user()->name);
        // dd($input['foto']->hashName());
        $user = $this->userRepository->create($input);
        $user->foto = '\img\foto\\'.Auth::user()->name.'.'.$input['foto']->getClientOriginalExtension();
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($user->foto);
        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param int $id
     * @param UpdateuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        // dd($request);
        $move = $request->foto->move(public_path('storage\\img\\foto\\'), $request->name.'.'.$request->foto->getClientOriginalExtension());
        // dd($move);
            $userr = User::findorfail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'rt_id'  => $request->rt_id,
                'foto' => '\\img\\foto\\'.$request->name.'.'.$request->foto->getClientOriginalExtension()
            ]);
        // $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
