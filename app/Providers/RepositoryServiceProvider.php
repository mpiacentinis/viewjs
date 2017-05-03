<?php

namespace viewjs\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\viewjs\Repositories\ProdutoRepository::class, \viewjs\Repositories\ProdutoRepositoryEloquent::class);
        $this->app->bind(\viewjs\Repositories\PromocaoRepository::class, \viewjs\Repositories\PromocaoRepositoryEloquent::class);
        $this->app->bind(\viewjs\Repositories\ItensPromocaoRepository::class, \viewjs\Repositories\ItensPromocaoRepositoryEloquent::class);
        //:end-bindings:
    }
}
