<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Department;

class ManageDepartmentsController extends Controller
{
    public function show()
    {
        $departments = Department::all();
        return view('admin.manageDepartments', compact('departments'));
    }

}
