<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $departments = Department::with('users')->get();
        return view('admin.manage_departments', compact(['users', 'departments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        // Create new department
        Department::create($request->all());

        return redirect()->back()->with(['status' => 'Department created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Department $department)
    {
        return view('department', compact('department'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $department
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }
}
