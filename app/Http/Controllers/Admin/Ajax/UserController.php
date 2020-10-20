<?php


namespace App\Http\Controllers\Admin\Ajax;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDepartmentsFromUser(User $user){
        $departments = $user->departments->pluck('id');
        return response()->json([$departments]);
    }

    /**
     * Attach departments to users
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addDepartmentsToUser(Request $request, User $user)
    {
        $departments = $request->json()->all();
        $user->departments()->sync($departments);
        return redirect()->back()->with(['status' => 'Users added successfully.']);
    }
}
