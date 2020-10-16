<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function show()
    {
        $departments = Department::all();
        $users = User::all();
        return view('admin.manageUsers', compact([
            'departments',
            'users'
        ]));
    }

    public function delete(Request $request)
    {
        User::destroy($request->get('id'));
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->get('id'));
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->description = $request->get('description');
        $user->save();
        return redirect()->back()->with(['status' => 'User updated successfully.']);
    }

    public function addDepartmentsToUser(Request $request)
    {
        $data = $request->all();
        $decoded = json_decode($data['addDepartmentsDataInput'], true);
        $department = User::findOrFail($decoded['userId']);
        $department->departments()->attach($decoded['selectedIds']);
        $department->departments()->detach($decoded['deselectedIds']);
        return redirect()->back()->with(['status' => 'Users added successfully.']);
    }

    public function getDepartmentsFromUser(Request $request)
    {
        $departments = (User::findOrFail($request->get('userId'))->departments)->pluck('id');
        return response()->json([$departments]);
    }
}
