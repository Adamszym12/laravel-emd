<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('admin.manageUsers', compact('users'));
    }

    public function delete(Request $request)
    {
        User::destroy($request->get('id'));
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }

    public function update(Request $request)
    {
        $department = User::findOrFail($request->get('id'));
        $department->name = $request->get('name');
        $department->description = $request->get('surname');
        $department->description = $request->get('email');
        $department->description = $request->get('phone');
        $department->description = $request->get('description');
        $department->description = $request->get('password');
        $department->save();
        return redirect()->back()->with(['status' => 'User updated successfully.']);
    }
}
