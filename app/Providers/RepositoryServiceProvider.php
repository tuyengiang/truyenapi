<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StoreRepository::class, \App\Repositories\StoreRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ChapterRepository::class, \App\Repositories\ChapterRepositoryEloquent::class);
        //$this->app->bind(\App\Repositories\ChapterContentRepository::class, \App\Repositories\ChapterContentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AuthorRepository::class, \App\Repositories\AuthorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryStoreRepository::class, \App\Repositories\CategoryStoreRepositoryEloquent::class);
        //:end-bindings:
    }
}
