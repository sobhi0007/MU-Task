<?php

namespace App\Providers;

use App\RepositoryPattern\CommentRepo;
use Illuminate\Support\ServiceProvider;
use App\RepositoryPattern\CommentRepoInterface;

class CommentRepoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CommentRepoInterface::class , CommentRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
