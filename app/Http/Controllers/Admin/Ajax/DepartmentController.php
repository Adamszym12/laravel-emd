<?php


namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function getUsersFromDepartment(Department $department){
        $departments = $department->departments->pluck('id');
        return response()->json([$departments]);
    }

    /**
     * Attach departments to departments
     *
     * @param Request $request
     * @param Department $department
     * @return JsonResponse
     */
    public function addUsersToDepartment(Request $request, Department $department)
    {
        $users = $request->json()->all();
        $department->users()->sync($users);
        return response()->json(['success']);
    }
}
