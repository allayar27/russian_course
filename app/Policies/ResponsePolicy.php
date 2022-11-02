<?php

namespace App\Policies;

use App\Models\Response;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\Types\True_;

class ResponsePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->can('viewAny-responses');
    }


    public function view(User $user, Response $response)
    {
        if ($user->id === $response->user_id){
            return \Illuminate\Auth\Access\Response::allow();
        }

    }


    public function create(User $user)
    {
        return $user->can('create-responses');
    }


    public function update(User $user, Response $response)
    {
       if ($user->id === $response->user_id){
           return \Illuminate\Auth\Access\Response::allow();
       }

    }


    public function delete(User $user, Response $response)
    {
        if ($user->id === $response->user_id){
            return \Illuminate\Auth\Access\Response::allow();
        }

    }



}
