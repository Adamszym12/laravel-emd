<?php


namespace App\Http\Controllers;


use App\Models\User;

class UserProfileController extends Controller
{

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
}
