<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->can('viewAny-comments');
    }


    public function view(User $user, Comment $comment)
    {
        return $user->can('view-comments');
    }


    public function create(User $user)
    {
        return $user->can('create-comments');
    }


    public function delete(User $user, Comment $comment)
    {
        if ($user->id === $comment->user_id){
            return Response::allow();
        }
    }



}
