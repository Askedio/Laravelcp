<?php
namespace Askedio\Laravelcp\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class LaravelcpServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Askedio\Laravelcp\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the resource namespaces.
	 *
	 * @return void
	 */
  public function boot()
  {
		Lang::addNamespace('LaravelCP', realpath(__DIR__.'/../Resources/Lang'));
    parent::boot($router);
  }

	/**
	 * Register the resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
	  View::addNamespace('LaravelCP', realpath(__DIR__.'/../Resources/Views'));
	}
}
