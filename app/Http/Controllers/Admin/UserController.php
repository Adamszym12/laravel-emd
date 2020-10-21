<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $departments = Department::all();
        return view('admin.manage_users', compact('users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserPostRequest $request)
    {
        $user = new User();
        //set role
        $user->assignRole('user');

        $user->fill($request->all());
        $user->password = Hash::make($request->get('password'));
        $user->profile_picture = Storage::disk('local')->put('/public/avatars', $request->file('profileImage'));
        // Persist user record to database
        $user->save();
        return redirect()->back()->with(['status' => 'User created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user_profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user_profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserPostRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserPostRequest $request,User $user)
    {

        $user->fill($request->all());
        // Storage image to public/avatars
        if($request->has('profileImage')){
            Storage::delete($user->profile_picture);
            $user->profile_picture = Storage::disk('local')->put('/public/avatars', $request->file('profileImage'));
        }
        $user->save();
        return redirect()->back()->with(['status' => 'User updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        //delete image
        Storage::disk('public')->delete($user->profile_picture);
        $user->delete();
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }
}
