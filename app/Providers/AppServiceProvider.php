<?php

namespace App\Providers;

use App\Models\Book;
use App\Policies\BookPolicy;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LogoutResponse;

class AppServiceProvider extends ServiceProvider
{
  protected array $policies = [
    Book::class => BookPolicy::class,
  ];

  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
      public function toResponse($request)
      {
        return redirect('/data_perpustakaan');
      }
    });
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    /*
     * The function 'Builder::defaultStringLength(125);' sets the default string length for columns in the database table schema to 125 characters.
     * This is useful for defining the maximum size of string type columns in your database without needing to manually set it for each column.
    */
    Builder::defaultStringLength(125);
//    $this->registerPolicies();
  }
}
