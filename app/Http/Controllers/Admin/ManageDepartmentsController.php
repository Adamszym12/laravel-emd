<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class ManageDepartmentsController extends Controller
{
    public function show()
    {
        $departments = Department::all();
        $users = User::all();
        return view('admin.manageDepartments', compact([
            'departments',
            'users'
        ]));
    }

    public function delete(Request $request)
    {
        Department::destroy($request->get('id'));
        return redirect()->back()->with(['status' => 'Department deleted successfully.']);
    }

    public function update(Request $request)
    {
        $department = Department::findOrFail($request->get('id'));
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->save();
        return redirect()->back()->with(['status' => 'Department updated successfully.']);
    }

    public function addUsersToDepartment(Request $request){
        $data = $request->all();
        $decoded = json_decode($data['addUsersDataInput'], true);
        $department = Department::findOrFail($decoded['departmentId']);
        $department->users()->attach($decoded['selectedIds']);
        $department->users()->detach($decoded['deselectedIds']);
        return redirect()->back()->with(['status' => 'Users added successfully.']);
    }

    public function getUsersFromDepartment(Request $request){
        $users = (Department::findOrFail($request->get('departmentId'))->users)->pluck('id');
        return response()->json([$users]);
    }
}
