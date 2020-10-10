<?php

namespace App\Providers;

use App\Services\Albums\Repositories\AlbumRepository;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;
use App\Services\Groups\Repositories\GroupRepository;
use App\Services\Groups\Repositories\GroupRepositoryInterface;
use App\Services\Singers\Repositories\SingerRepository;
use App\Services\Singers\Repositories\SingerRepositoryInterface;
use App\Services\Songs\Repositories\SongRepository;
use App\Services\Songs\Repositories\SongRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class MusicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(AlbumRepositoryInterface::class, AlbumRepository::class);
        $this->app->bind(SingerRepositoryInterface::class, SingerRepository::class);
        $this->app->bind(SongRepositoryInterface::class, SongRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
