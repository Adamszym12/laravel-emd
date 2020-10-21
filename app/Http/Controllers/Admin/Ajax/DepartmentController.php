<?php


namespace App\Http\Controllers\Admin\Ajax;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(Department $department){
        $users = $department->users->pluck('id');
        return response()->json([$users]);
    }

    /**
     * Attach users to departments
     *
     * @param Request $request
     * @param Department $department
     * @return JsonResponse
     */
    public function store(Request $request, Department $department)
    {
        $users = $request->json()->all();
        $department->users()->sync($users);
        return response()->json(['success']);
    }
}
