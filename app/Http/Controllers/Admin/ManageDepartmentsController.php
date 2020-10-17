<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Throwable;

class ManageDepartmentsController extends Controller
{
    /**
     * Display departments manager.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $departments = Department::all();
        $users = User::all();
        return view('admin.manageDepartments', compact([
            'departments',
            'users'
        ]));
    }

    /**
     * Remove empty department
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        try {
            Department::destroy($request->get('id'));
    } catch (Throwable $e) {
            return redirect()->back()->withErrors(['msg' => 'Department contains users, detach users first']);
    }
        return redirect()->back()->with(['status' => 'Department deleted successfully.']);
    }

    /**
     * Show the form for editing department.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->save();
        return redirect()->back()->with(['status' => 'Department updated successfully.']);
    }

    /**
     * Attach users to department
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUsersToDepartment(Request $request){
        $data = $request->all();
        $decoded = json_decode($data['addUsersDataInput'], true);
        $department = Department::findOrFail($decoded['departmentId']);
        $department->users()->sync($decoded['selectedIds']);
        return redirect()->back()->with(['status' => 'Users added successfully.']);
    }

    /**
     * Get all users form department
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUsersFromDepartment(Request $request){
        $users = (Department::findOrFail($request->get('departmentId'))->users)->pluck('id');
        return response()->json([$users]);
    }
}
