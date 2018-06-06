<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Database\libros;
use App\Database\pedidos;
use App\Database\pedidos_libros;
use Cart;
use Session;
use Auth;

class shoppingCartController extends Controller
{
  public function cart() {
    $user_id = Session::getId();
    Cart::restore($user_id);
    if (!Auth::guest()) {
      $user_id = Auth::getUser()['email'];
      Cart::restore($user_id);
    }

    if (Request::isMethod('post')) {
      $libros_id = Request::get('libros_id');
      $libro = libros::find($libros_id);
      Cart::add(array('id' => $libros_id, 'name' => $libro['titulo'], 'qty' => 1, 'price' => $libro['precio']));
      Cart::store($user_id);

      $cart = Cart::content();
      return $cart;
    }

    if (Request::get('libros_id') && (Request::get('increment')) == 1) {
      $rowId = Cart::search(function($cartItem, $rowId) { return $cartItem->id == Request::get('libros_id');});
      $item = $rowId->first();

      Cart::update($item->rowId, $item->qty + 1);
    }

    if (Request::get('libros_id') && (Request::get('decrease')) == 1) {
      $rowId = Cart::search(function($cartItem, $rowId) { return $cartItem->id == Request::get('libros_id');});
      $item = $rowId->first();

      Cart::update($item->rowId, $item->qty - 1);
      if (Cart::count() == 0) {
        Cart::destroy();
      }
    }

    if (Request::get('libros_id') && (Request::get('remove')) == 1) {
      $rowId = Cart::search(function($cartItem, $rowId) { return $cartItem->id == Request::get('libros_id');});
      $item = $rowId->first();

      Cart::remove($item->rowId);
      if (Cart::count() == 0) {
        Cart::destroy();
      }
    }

    if (Request::get('destroy') == 1) {
      Cart::destroy();
    }

    if (Cart::count() > 0) {
      $cart = Cart::content();
      Cart::store($user_id);
      return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    } else {
      return \redirect('home');
    }
  }

  public function preparePurchase() {
    $user_id = Session::getId();
    Cart::restore($user_id);
    if (!Auth::guest()) {
      $user_id = Auth::getUser()['email'];
      Cart::restore($user_id);
    }

    $metodoPago = Request::get('metodoPago');

    $articulos = [];

    if (Auth::guest()) {
      $usuarioLogueado = 0;
    } else {
      $usuarioLogueado = Auth::getUser()['id'];
    }

    $idPedido = pedidos::create(array('estado' => 0, 'total' => Cart::subtotal(), 'fecha' => now(), 'fk_users' => $usuarioLogueado));

    foreach (Cart::content() as $itemInCart) {
      $articulos = array('fk_pedidos' => $idPedido['pedidos_id'], 'fk_libros' => $itemInCart->id, 'cantidad' => $itemInCart->qty, 'precio' => $itemInCart->subtotal);
      pedidos_libros::create($articulos);
    }

    if ($metodoPago == 'paypal') {
      Cart::store($user_id);
      return view('paypal', array('idPedido' => $idPedido, 'total' => Cart::subtotal(), 'cliente' => $usuarioLogueado, 'opcion' => 'Terminar Compra'));
    } else {
      return \redirect('home');
    }
  }

  public function compraok() {
    $user_id = Session::getId();
    Cart::restore($user_id);
    if (!Auth::guest()) {
      $user_id = Auth::getUser()['email'];
      Cart::restore($user_id);
    }
    Cart::destroy();
    return view('compraok', array('post' => Request::post()));
  }

  public function compraerror() {
    $user_id = Session::getId();
    Cart::restore($user_id);
    if (!Auth::guest()) {
      $user_id = Auth::getUser()['email'];
      Cart::restore($user_id);
    }
    return view('compraerror', array('post' => Request::post()));
  }
}
