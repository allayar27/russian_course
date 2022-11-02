<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        $user->can('viewAny-assignments');
    }


    public function view(User $user, Assignment $assignment)
    {
        return $user->can('view-assignments');
    }


    public function create(User $user)
    {
        return $user->can('create-assignments');
    }


    public function update(User $user, Assignment $assignment)
    {
       return $user->can('edit-assignments');
    }


    public function delete(User $user, Assignment $assignment)
    {
       return $user->can('delete-assignments');
    }


}
