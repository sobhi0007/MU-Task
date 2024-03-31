<?php

namespace App\Providers;

use App\RepositoryPattern\PostRepo;
use Illuminate\Support\ServiceProvider;
use App\RepositoryPattern\PostRepoInterface;

class PostRepoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepoInterface::class , PostRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
