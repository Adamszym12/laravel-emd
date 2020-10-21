<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '662280993',
            'description' => 'Dearest affixed enquire on explain opinion he. Reached who the mrs joy offices pleased',
            'password' => Hash::make('admin'),
            'profile_picture' => 'storage/avatars/admin.png'
        ]);
        $user->assignRole('admin');
        for ($i=2; $i < 302; $i++) {
            $user = User::create([
                'name' => 'User'.$i,
                'surname' => 'User'.$i,
                'email' => 'user'.$i.'@example.com',
                'phone' => '123123123',
                'description' => 'Dearest affixed enquire on explain opinion he. Reached who the mrs joy offices pleased',
                'password' => Hash::make('user'),
                'profile_picture' => 'storage/avatars/user.png'
            ]);
            $user->assignRole('user');
        }
    }
}
