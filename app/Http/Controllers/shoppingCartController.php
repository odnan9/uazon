<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Database\libros;
use Cart;

class shoppingCartController extends Controller
{
  public function cart() {
    if (Request::isMethod('post')) {
      $libros_id = Request::get('libros_id');
      $libros = new libros();
      $libro = $libros->find($libros_id);
      Cart::add(array('id' => $libros_id, 'name' => $libro['titulo'], 'qty' => 1, 'price' => $libro['precio']));
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
    }

    if (Request::get('libros_id') && (Request::get('remove')) == 1) {
      $rowId = Cart::search(function($cartItem, $rowId) { return $cartItem->id == Request::get('libros_id');});
      $item = $rowId->first();

      Cart::remove($item->rowId);
    }

    if (Request::get('destroy') == 1) {
      Cart::destroy();
    }

    if (Cart::count() > 0) {
      $cart = Cart::content();
      return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    } else {
      return \redirect('home');
    }
  }
}
