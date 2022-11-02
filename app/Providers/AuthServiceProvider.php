<?php

namespace App\Providers;

use App\Models\Additional;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Response;
use App\Policies\AdditionalPolicy;
use App\Policies\AssignmentPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\LessonPolicy;
use App\Policies\ResponsePolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
        Response::class => ResponsePolicy::class,
        Comment::class => CommentPolicy::class,
        Category::class => CategoryPolicy::class,
        Lesson::class => LessonPolicy::class,
        Assignment::class => AssignmentPolicy::class,
        Additional::class => AdditionalPolicy::class
    ];


    public function boot()
    {
        $this->registerPolicies();


        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });



    }
}

