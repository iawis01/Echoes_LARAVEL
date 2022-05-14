<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-only', function($user){
            if($user->user_type == "Student"){
                return true;
            }
            return false;
        });

        Gate::define('admin-only', function($user){
            if($user->user_type == "Admin"){
                return true;
            }
            return false;
        });

        Gate::define('teacher-only', function($user){
            if($user->user_type == "Teacher"){
                return true;
            }
            return false;
        });
        
    }
}
