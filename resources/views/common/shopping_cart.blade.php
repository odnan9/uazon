<!-- Authentication Links -->
<div class="cart__animation shoppingcart__dropdown shoppingcart__dropdown--open">
  <a class="shoppingcart__dropdown--toggle" data-toggle="shoppingcart__dropdown" href="{{url('cart')}}">
    <span class="fa-layers fa-fw">
      <i class="fa fa-shopping-cart"></i>
      <span class="fa fa-layers-counter"><?php Cart::count() ?></span>
    </span>
      Carrito
    <i class="fa fa-angle-down flechadespliegue"></i>
  </a>
  <div class="shoppingcart__dropdown-menu">
    <form method="GET" action="{{url('cart')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <fieldset class="shoppingcart__fieldset--border">
        @if(count($cart))
        <span class="shoppingcart__header">Libros en carrito</span>
        <ul>
          @foreach($cart as $item)
          <li class="shoppingcart__items">{{$item->name}}</li>
          @endforeach
        </ul>
        @else
          <p>El carro está vacío</p>
        @endif
        <a class="shoppingcart__forgetpassword" href="{{url("cart?destroy=1")}}" style="width: 100%">
          ¿Borrar carrito?
        </a>
      </fieldset>
      <div class="form-group">
        <button class="shoppingcart__login-button" type="submit">
          Ir al carrito
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $(function () {
    $('.shoppingcart__dropdown').hover(
      function () {
        $('.shoppingcart__dropdown-menu', this).stop(true, true).fadeIn(400);
        $(this).toggleClass('shoppingcart__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      },
      function () {
        $('.shoppingcart__dropdown-menu', this).stop(true, true).fadeOut(400);
        $(this).toggleClass('shoppingcart__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      });
  });
</script>