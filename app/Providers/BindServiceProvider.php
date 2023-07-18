<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\FornecedorRepoInterface;
use App\Repos\FornecedorRepo;
use App\Contracts\ClienteRepoInterface;
use App\Repos\ClienteRepo;
use App\Contracts\CompraRepoInterface;
use App\Repos\CompraRepo;
use App\Contracts\VendaRepoInterface;
use App\Repos\VendaRepo;
use App\Contracts\FormaPagRepoInterface;
use App\Repos\FormaPagRepo;
use App\Contracts\UserRepoInterface;
use App\Repos\UserRepo;
use App\Contracts\FinanceiroRepoInterface;
use App\Repos\FinanceiroRepo;
use App\Contracts\VendedorRepoInterface;
use App\Repos\VendedorRepo;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind(VendedorRepoInterface::class, VendedorRepo::class);
        $this->app->bind(FinanceiroRepoInterface::class, FinanceiroRepo::class);
        $this->app->bind(UserRepoInterface::class, UserRepo::class);
        $this->app->bind(FormaPagRepoInterface::class, FormaPagRepo::class);
        $this->app->bind(VendaRepoInterface::class, VendaRepo::class);
        $this->app->bind(CompraRepoInterface::class, CompraRepo::class);
        $this->app->bind(FornecedorRepoInterface::class, FornecedorRepo::class);
        $this->app->bind(ClienteRepoInterface::class, ClienteRepo::class);
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
