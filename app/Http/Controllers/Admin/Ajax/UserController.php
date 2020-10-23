<?php


namespace App\Http\Controllers\Admin\Ajax;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPostRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        $departments = $user->departments->pluck('id');
        return response()->json([$departments]);
    }

    /**
     * Attach departments to users
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function store(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $departments = $request->json()->all();
            $user->departments()->sync($departments);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Departments attached to user successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Departments attached failed'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserPostRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UpdateUserPostRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->fill($request->all());
            // Storage image to public/avatars
            if ($request->hasFile('profileImage')) {
                Storage::delete($user->profile_picture);
                $user->profile_picture = "/storage/avatars/".basename(Storage::disk('local')->putFile('/public/avatars', $request->file('profileImage')));
            }
            $user->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'User updated successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([
                'status' => 'success',
                'message' => 'User updated successfully'
            ]);
        }
    }
}
