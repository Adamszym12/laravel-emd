<?php


namespace App\Http\Controllers;


use App\Http\Requests\UpdateUserPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user_profile', compact('user'));
    }

    public function update(UpdateUserPostRequest $request)
    {
        $user = Auth::User();
        $user->fill($request->all());
        // Storage image to public/avatars
        if ($request->hasFile('profileImage')) {
            Storage::delete($user->profile_picture);
            $user->profile_picture = "/storage/avatars/" . basename(Storage::disk('local')->putFile('/public/avatars', $request->file('profileImage')));
        }
        $user->save();
        return redirect()->back()->with(['status' => 'User created successfully.']);
    }
}
