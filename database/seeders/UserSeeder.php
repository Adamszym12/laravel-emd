<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'surname' => 'Suradmin',
            'email' => 'admin@wp.pl',
            'phone' => '662280993',
            'description' => 'Dearest affixed enquire on explain opinion he. Reached who the mrs joy offices pleased',
            'password' => Hash::make('admin'),
        ]);
        $user->assignRole('admin');
        for ($i=0; $i < 300; $i++) {
            $user = User::create([
                'name' => 'User'.$i,
                'surname' => 'SurUser'.$i,
                'email' => 'user'.$i.'@wp.pl',
                'phone' => '123123123',
                'description' => 'Dearest affixed enquire on explain opinion he. Reached who the mrs joy offices pleased',
                'password' => Hash::make('user'),
            ]);
            $user->assignRole('admin');
        }
    }
}
