<?php


namespace App\Http\Controllers;


use App\Models\User;

class EmployeesController extends Controller
{
    public function show(){
        $users = User::all();
        return view('employees' , compact('users'));
    }
}
