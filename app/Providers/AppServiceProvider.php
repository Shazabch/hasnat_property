<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // share conditions to only header views
        view()->composer('partials.header', function ($view){
            $conditions = \App\Models\Condition::published()->ordered()->take(12)->get();
            // chunk it by 4
            $conditions = $conditions->chunk(4);
            $view->with('conditions_chunks', $conditions);
        });

        view()->composer(['partials.footer', 'website.home','partials.header'], function ($view) {
            $dashboard_expertises = \App\Models\Expertise::published()->showOnDashboard()->ordered()->take(6)->get();
             $view->with('dashboard_expertises', $dashboard_expertises);

             $menu_expertises = \App\Models\Expertise::published()->ordered()->take(12)->get();
             // chunk it by 4
             $menu_expertises = $menu_expertises->chunk(4);
             $view->with('menu_expertises', $menu_expertises);
        });

        view()->composer(['website.common.tech-methods'], function ($view) {
            $tech_and_methods = \App\Models\Expertise::technologies();
            $view->with('tech_and_methods', $tech_and_methods);
        });

        // share with all views
        view()->composer('*', function ($view) {
           $phone1 = [
            'label' => '+(92) 321 7888807',
            'value' => '+923217888807',
           ];
           $phone2 = [
            'label' => '',
            'value' => '',
           ];

           $email1 = 'hasnaatqureshi@gmail.com';
           $email2 = 'info@hasnatproperties.com';

           $address_line_1 = 'Plaza no,102-B First Floor,';
           $address_line_2 = 'Sector C commerical,';
           $address_line_3 = 'Bahria Town Lahore';

           $view->with('phone1', $phone1);
           $view->with('phone2', $phone2);
           $view->with('email1', $email1);
           $view->with('email2', $email2);
           $view->with('address_line_1', $address_line_1);
           $view->with('address_line_2', $address_line_2);
           $view->with('address_line_3', $address_line_3);
        });
    }
}
