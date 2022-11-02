<?php

namespace App\Providers;

use App\Services\AssignmentService;
use App\Services\Contracts\AssignmentContract;
use App\Services\Contracts\LessonContract;
use App\Services\LessonService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(LessonContract::class, function ($app) {
            return new LessonService();
        });
        $this->app->bind(AssignmentContract::class, function ($app) {
            return new AssignmentService();
        });
    }


    public function boot()
    {
        //
    }
}
