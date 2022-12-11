<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Slim\App;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = array(
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Team::class =>TeamPolicy::class
    );

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Politica de creacion para team
        Gate::define('create-team','App\Policies\TeamPolicy@create');
        Gate::define('edit-team','App\Policies\TeamPolicy@edit');
        Gate::define('update-team','App\Policies\TeamPolicy@update');
        Gate::define('delete-team','App\Policies\TeamPolicy@delete');

//        Gate::define('create-team',function (Team $teams, User $user){
//           return $user->roles() == ['admin','superadmin'];
//        });




    }
}
