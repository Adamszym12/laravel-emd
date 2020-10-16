<?php


namespace App\Http\Controllers;


use App\Models\User;

class UserProfileController
{
    public function show(){
        $user = User::findOrFail(1);
        return view('profile' , compact('user'));
    }

    public function update(){

    }
}
