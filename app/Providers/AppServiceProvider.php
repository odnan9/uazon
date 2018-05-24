<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Cart;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // Compartimos el contenido de carrito con todas las vistas.
    $cart = Cart::content();
    View::share('cart', $cart);
    Session::save($cart);

    \Blade::directive('copyright', function(){
       return "<?php echo 'ProwebUazon ".date('Y')." &copy; Todos los derechos reservados';?>";
    });

    \Blade::if('odd', function($index) {
       return ($index % 2)==0;
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
