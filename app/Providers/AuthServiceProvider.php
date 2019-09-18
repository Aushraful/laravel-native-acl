<?php

namespace App\Providers;

use Gate;
use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
//        User::class => UserPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

        //
        if (Schema::hasTable('permissions')) {
            Permission::get()->map(function($permission){
                Gate::define($permission->slug, function($user) use ($permission){
                    return $user->hasPermissionTo($permission);
                });
            });
        }
    }
}
