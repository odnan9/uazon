<!-- Authentication Links -->
<div class="shoppingcart__dropdown shoppingcart__dropdown--open">
  <a class="shoppingcart__dropdown--toggle" data-toggle="shoppingcart__dropdown" href="#">
    <i class="fa fa-shopping-cart"></i>
      Carrito
    <i class="fa fa-angle-down flechadespliegue"></i>
  </a>
  <div class="shoppingcart__dropdown-menu">
    <form method="GET" action="{{url('cart')}}">
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
          Iniciar compra
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  $(function () {
    $('.shoppingcart__dropdown').hover(
      function () {
        $('.shoppingcart__dropdown-menu', this).stop(true, true).fadeIn(50);
        $(this).toggleClass('shoppingcart__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      },
      function () {
        $('.shoppingcart__dropdown-menu', this).stop(true, true).fadeOut(50);
        $(this).toggleClass('shoppingcart__dropdown--open');
        $('.flechadespliegue').toggleClass('fa-angle-down');
        $('.flechadespliegue').toggleClass('fa-angle-up');
      });
  });
</script>