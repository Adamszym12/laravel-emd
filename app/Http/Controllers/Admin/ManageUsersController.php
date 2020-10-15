<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;

class ManageUsersController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('admin.manageUsers', compact('users'));
    }
}
