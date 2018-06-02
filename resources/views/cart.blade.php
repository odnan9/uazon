@extends('layouts.app')

@section('content')
  <div class="container__cart">
    <div class="cart__row">
      <div class="col-md-6 offset-3">
      @if(count($cart))
      <table class="cart__table">
        <thead>
        <tr class="cart_menu">
          <td class="image"></td>
          <td class="description">Título del libro</td>
          <td class="price">Precio</td>
          <td class="quantity">Cantidad</td>
          <td class="total">Total</td>
          <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $item)
        <tr>
          <td class="cart__image">
            <img class="libros__img" src="/assets/images/libros/{{$item->id}}/{{$item->id}}_x100.jpg">
          </td>
          <td class="cart_description">
            <h4><a href="">{{$item->name}}</a></h4>
            <p>Web ID: {{$item->id}}</p>
          </td>
          <td class="cart_price">
            <p>${{$item->price}}</p>
          </td>
          <td class="cart_quantity">
            <div class="cart_quantity_button">
              <a class="cart_quantity_up" href="{{url("cart?libros_id=$item->id&_token=csrf_token()&increment=1")}}"><i class="fa fa-plus-square"></i></a>
              <span class="cart_quantity_input" name="quantity" value="" autocomplete="off" size="2">{{$item->qty}}</span>
              <a class="cart_quantity_down" href="{{url("cart?libros_id=$item->id&_token=csrf_token()&decrease=1")}}"><i class="fa fa-minus-square"></i></a>
            </div>
          </td>
          <td class="cart_total">
            <p class="cart_total_price">${{$item->subtotal}}</p>
          </td>
          <td class="cart_delete">
            <a class="cart_quantity_delete" href="{{url("cart?libros_id=$item->id&_token=csrf_token()&remove=1")}}"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
        @else
        <p>You have no items in the shopping cart</p>
        @endif
        </tbody>
      </table>
      </div>
    </div>
  </div>
@endsection