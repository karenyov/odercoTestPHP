<?php

namespace App\Providers;

use App\Repositories\EloquentRepositoryInterface; 
use App\Repositories\TransportadoraRepositoryInterface; 
use App\Repositories\Eloquent\TransportadoraRepository;
use App\Repositories\CotacaoFreteRepositoryInterface; 
use App\Repositories\Eloquent\CotacaoFreteRepository;
use App\Repositories\Eloquent\BaseRepository; 
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TransportadoraRepositoryInterface::class, TransportadoraRepository::class);
        $this->app->bind(CotacaoFreteRepositoryInterface::class, CotacaoFreteRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}