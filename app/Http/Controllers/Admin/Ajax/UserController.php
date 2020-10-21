<?php


namespace App\Http\Controllers\Admin\Ajax;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $departments = $user->departments->pluck('id');
        return response()->json([$departments->all()]);
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
        $departments = $request->json()->all();
        $user->departments()->sync($departments);
        return response()->json(['Departments attached to user']);
    }
}
