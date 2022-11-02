<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->can('viewAny-users');
    }


    public function view(User $user, User $model)
    {
        return $user->can('view-users');
    }


    public function create(User $user)
    {
        return $user->can('create-users');
    }


    public function update(User $user, User $model)
    {
        return  $user->can('edit-users');
    }


    public function delete(User $user, User $model)
    {
        return $user->can('delete-users');
    }



}
