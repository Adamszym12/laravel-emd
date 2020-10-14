<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class CreateDepartmentController extends Controller
{
    public function create()
    {
        return view('admin.createDepartment');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // Create new department
        Department::create($request->all());

        return redirect()->back()->with(['status' => 'Department created successfully.']);
    }
}
