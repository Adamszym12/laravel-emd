<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserController extends Controller
{
    use UploadImageTrait;

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
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
}
