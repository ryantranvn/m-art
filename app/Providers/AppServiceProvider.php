<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!App::runningInConsole()) {
            app('view')->composer(['layouts.admin', 'adminbsb.*'], function ($view) {
                $action = app('request')->route()->getAction();
                $controller = class_basename($action['controller']);
                list($controller, $action) = explode('@', $controller);
                $controller = str_replace('controller', '', strtolower($controller));

                $view->with(compact('controller', 'action'));
            });

            app('view')->composer(['layouts.website', 'website.*'], function ($view) {
                $action = app('request')->route()->getAction();
                $controller = class_basename($action['controller']);
                list($controller, $action) = explode('@', $controller);
                $controller = str_replace('controller', '', strtolower($controller));

                // image alt
                $imageAlt = 'Bulk';

                $view->with(compact('controller', 'action', 'imageAlt'));
            });
        }

        DB::listen(function ($query) {
            $contents = "SQL : (".date("Y-m-d h:i:s").")" . $query->sql . "\n";
            $contents .= "Binndings : \n";
            foreach ($query->bindings as $value) {
                $contents .= $value . "\n";
            }

            Storage::prepend('test-sql.txt', $contents);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
