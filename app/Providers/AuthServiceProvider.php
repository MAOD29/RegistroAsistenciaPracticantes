<?php

namespace App\Providers;
use App\User;
use App\Profesor;
use App\Alumno;
use App\Policies\Userpolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => Userpolicy::class,
        Profesor::class => Userpolicy::class,
        Alumno::class => Userpolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
