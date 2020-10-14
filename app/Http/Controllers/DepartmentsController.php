<?php


namespace App\Http\Controllers;


use App\Models\Department;

class DepartmentsController extends Controller
{
    public function show(){
        $departments = Department::all();
        return view('departments' , compact('departments'));
    }
}
