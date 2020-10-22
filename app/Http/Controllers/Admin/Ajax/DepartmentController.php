<?php


namespace App\Http\Controllers\Admin\Ajax;


use App\Http\Requests\DepartmentRequest;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    public function index(Department $department)
    {
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
        DB::beginTransaction();
        try {
            $users = $request->json()->all();
            $department->users()->sync($users);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Users attached to department'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Users attached failed'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return JsonResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        DB::beginTransaction();
        try {
            $department->fill($request->all());
            $department->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Department updated successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Update failed'
            ]);
        }
    }
}
