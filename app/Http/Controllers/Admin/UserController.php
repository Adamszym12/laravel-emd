<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use App\Models\User;
use App\Models\Department;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $departments = Department::all();
        return view('admin.manage_users', compact('users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPostRequest $request)
    {
        $user = new User();
        //set role
        $user->assignRole('user');

        //fill user
        $user->fill([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'phone' => $request->get('surname'),
            'description' => $request->get('description'),
            'password' => Hash::make($request->get('password')),
        ]);


        //add profile image
        if ($request->has('profileImage')) {
            // Get image file
            $image = $request->file('profileImage');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/uploads/avatars/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadImage($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_picture = $filePath;
        }

        // Persist user record to database
        $user->save();

        return redirect()->back()->with(['status' => 'User created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user_profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserPostRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserPostRequest $request,User $user)
    {
        $user->fill($request->all());
        $user->save();
        return redirect()->back()->with(['status' => 'User updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        //delete image
        Storage::disk('public')->delete($user->profile_picture);
        $user->delete();
        return redirect()->back()->with(['status' => 'User deleted successfully.']);
    }
}
