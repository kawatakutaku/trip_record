<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\IBaseRepository;
use App\Repositories\Memo\IMemoResponseRepository;
use App\Repositories\Memo\MemoResponseRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IMemoResponseRepository::class, MemoResponseRepository::class);
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
    }
}
