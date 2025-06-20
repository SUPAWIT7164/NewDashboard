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
        'App\Models\Role' => 'BalajiDharma\LaravelAdminCore\Policies\RolePolicy',
        'App\Models\Permission' => 'BalajiDharma\LaravelAdminCore\Policies\PermissionPolicy',
        'App\Models\User' => 'BalajiDharma\LaravelAdminCore\Policies\UserPolicy',
        'BalajiDharma\LaravelCategory\Models\Category' => 'BalajiDharma\LaravelAdminCore\Policies\CategoryPolicy',
        'BalajiDharma\LaravelCategory\Models\CategoryType' => 'BalajiDharma\LaravelAdminCore\Policies\CategoryTypePolicy',
        'BalajiDharma\LaravelMenu\Models\Menu' => 'BalajiDharma\LaravelAdminCore\Policies\MenuPolicy',
        'BalajiDharma\LaravelMenu\Models\MenuItem' => 'BalajiDharma\LaravelAdminCore\Policies\MenuItemPolicy',
        'Plank\Mediable\Media' => 'BalajiDharma\LaravelAdminCore\Policies\MediaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Allow all actions for all users
        Gate::before(function ($user, $ability) {
            return true;
        });
    }
}
