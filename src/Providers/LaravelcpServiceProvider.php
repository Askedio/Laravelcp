<?php

namespace Askedio\Laravelcp\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;
use Askedio\Laravelcp\Helpers\NavigationHelper;

class LaravelcpServiceProvider extends ServiceProvider
{
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    App::register('Collective\Html\HtmlServiceProvider');
    App::register('Askedio\Laravelcp\Providers\RBACServiceProvider');

  }




  /**
   * Register routes, translations, views and publishers.
   *
   * @return void
   */
public function boot(\Illuminate\Routing\Router $router)
  {




    $router->middleware('auth', 'Askedio\Laravelcp\Http\Middleware\Authenticate');
    $router->middleware('auth.basic', 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth');
    $router->middleware('guest', 'Askedio\Laravelcp\Http\Middleware\RedirectIfAuthenticated');
    $router->middleware('role', 'Askedio\Laravelcp\Http\Middleware\VerifyRole');
    $router->middleware('permission', 'Askedio\Laravelcp\Http\Middleware\VerifyPermission');

    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
    $loader->alias('Html', 'Collective\Html\HtmlFacade');
    $loader->alias('Form', 'Collective\Html\FormFacade');
    $loader->alias('Nav', 'Askedio\Laravelcp\Helpers\NavigationHelper');

    Config::set('auth.model', 'Askedio\Laravelcp\Models\User');


    if (! $this->app->routesAreCached()) {
      require realpath(__DIR__.'/../Http/routes.php');
    }

    $this->loadTranslationsFrom(realpath(__DIR__.'/../Resources/Lang'), 'lcp');

    $this->loadViewsFrom(realpath(__DIR__.'/../Resources/Views'), 'lcp');

    NavigationHelper::Add(['nav' => 'main', 'sort' => '0',  'link' => url('/dashboard'), 'title' => trans('lcp::nav.dashboard'), 'icon' => 'fa-dashboard']);


    $this->publishes([
      realpath(__DIR__.'/../Resources/Views') => base_path('resources/views/vendor/askedio/laravelcp'),
    ], 'views');

    $this->publishes([
      realpath(__DIR__.'/../Resources/Assets') => public_path('assets'),
    ], 'public');

    $this->publishes([
      realpath(__DIR__.'/../Resources/Config') => config_path('')
    ], 'config');

    $this->publishes([
      realpath(__DIR__.'/../Resources/Migrations') => database_path('migrations')
    ], 'migrations');

    $this->publishes([
      realpath(__DIR__.'/../Resources/Seeds') => database_path('seeds')
    ], 'seeds');

  }
}