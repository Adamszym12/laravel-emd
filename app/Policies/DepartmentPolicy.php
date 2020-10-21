<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Department  $department
     * @return mixed
     */
    public function show(User $user, Department $department)
    {
        if($user->hasRole('admin')|| $department->users->contains($user)){
            return true;
        }
        return false;
    }
}
