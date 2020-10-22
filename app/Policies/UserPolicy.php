<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update($currentUser,$user)
    {
        if($currentUser->hasRole('admin')||$currentUser->id == $user->id){
            return true;
        }
        return false;
    }
}
