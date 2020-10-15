<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class ManageDepartmentsController extends Controller
{
    public function show()
    {
        $departments = Department::all();
        return view('admin.manageDepartments', compact('departments'));
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
}
