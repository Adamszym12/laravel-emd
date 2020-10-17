<?php


namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    public function show($id){
        $department = Department::findOrFail($id);
        if (!$department->users->contains(auth()->user()->id)) {
            abort(403);
        }
        $users = User::all();
        return view('department', compact([
            'department'
        ]));
    }
}
