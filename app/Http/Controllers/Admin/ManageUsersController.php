<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    /**
     * Display users manager.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $departments = Department::all();
        $users = User::all();
        return view('admin.manageUsers', compact([
            'departments',
            'users'
        ]));
    }

    /**
     * Remove user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->departments()->detach();
        User::destroy($id);
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }

    /**
     * Show the form for editing user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->description = $request->get('description');
        $user->save();
        return redirect()->back()->with(['status' => 'User updated successfully.']);
    }

    /**
     * Attach departments to users
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addDepartmentsToUser(Request $request)
    {
        $data = $request->all();
        $decoded = json_decode($data['addDepartmentsDataInput'], true);
        $department = User::findOrFail($decoded['userId']);
        $department->departments()->attach($decoded['selectedIds']);
        $department->departments()->detach($decoded['deselectedIds']);
        return redirect()->back()->with(['status' => 'Users added successfully.']);
    }

    /**
     * Attach get departments from  user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDepartmentsFromUser(Request $request)
    {
        $departments = (User::findOrFail($request->get('userId'))->departments)->pluck('id');
        return response()->json([$departments]);
    }

    /**
     * Display all users list.
     *
     * @return \Illuminate\Http\Response
     */
    public function showList(){
        $users = User::all();
        return view('userList' , compact('users'));
    }
}
