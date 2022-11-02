<?php

namespace App\Policies;

use App\Models\Additional;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdditionalPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
       return $user->can('viewAny-additionals');
    }


    public function view(?User $user, Additional $additional)
    {
       return $user->can('view-additionals');
    }


    public function create(User $user)
    {
       return $user->can('create-additionals');
    }


    public function update(User $user, Additional $additional)
    {
       return $user->can('edit-additionals');
    }


    public function delete(User $user, Additional $additional)
    {
       return $user->can('delete-additionals');
    }


}
