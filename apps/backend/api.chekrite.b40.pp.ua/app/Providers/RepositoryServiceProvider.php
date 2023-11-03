<?php

namespace App\Providers;

use App\Repositories\Eloquent\TaskRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    public function boot()
    {
        //
    }
}
