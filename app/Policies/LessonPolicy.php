<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
       return $user->can('viewAny-lessons');
    }


    public function view(User $user, Lesson $lesson)
    {
       return $user->can('view-lessons');
    }


    public function create(User $user)
    {
       return $user->can('create-lessons');
    }


    public function update(User $user, Lesson $lesson)
    {
       return $user->can('edit-lessons');
    }


    public function delete(User $user, Lesson $lesson)
    {
       return $user->can('delete-lessons');
    }


}
