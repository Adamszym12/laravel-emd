<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    use UploadImageTrait;

    public function show(Request $request, $id)
    {
        if (auth()->user()->id != $id) {
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->id != $id) {
            abort(403);
        }
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'profileImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = User::findOrFail($id);
        $user->fill([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'phone' => $request->get('surname'),
            'description' => $request->get('description'),
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
