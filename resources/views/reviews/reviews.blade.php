@extends('layouts.app')

@section('content')
  <div id="container_criticas" class="container_libros container">
    @foreach ($listaPedidos as $key => $libro)
      @if (!($key % 2))
        <div class="libros__row row">
          @endif
          <div class="col-md-2">
            <div class="libros__item">
              <a href="{{route('review', [$libro->libros_id])}}">
                <img class="libros__img" src="/assets/images/libros/{{$libro->libros_id}}/{{$libro->libros_id}}_x300.jpg">
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="libros__titulo">
              <span><strong><a href="{{route('review', [$libro->libros_id])}}">Critica de {{$libro->titulo}}</a></strong></span>
            </div>

            <div class="libros__autor">
              <a href="{{ route('autores', [\App\Database\libros::find($libro->libros_id)->autores()->pluck('autores_id')[0]]) }}"> {{ \App\Database\libros::find($libro->libros_id)->autores()->pluck('nombre')[0] }} </a>
            </div>
            <div class="libros__editorial">
            <span>
              {{ $libro->editorial }}
            </span>
            </div>
            <form id="criticasCartForm{{$libro->libros_id}}" action="{{url('cart')}}">
              <input type="hidden" name="libros_id" value="{{$libro->libros_id}}">
              <input type="hidden" name="key" value="{{$key}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="lomas__btn">
                <i class="fa fa-shopping-cart" style="color: #990073"></i>
                <strong>
                  {{$libro->precio}} €
                </strong>
              </button>
            </form>
            <div class="libros__masinfo">
              <a href="{{route('libro', [$libro->libros_id])}}">(más informacion del libro)</a>
            </div>
          </div>
          @if (($key % 2))
        </div>
        <hr style="height: 0.1%">
      @endif
    @endforeach
  </div>

<script>
  $(document).ready(function () {
    $('#container_criticas form').each(function() {
      $(this).submit(function (event) {
        event.preventDefault();
        var libros_id = $(this).find("input[name='libros_id']").val();
        var key = $(this).find("input[name='key']").val();
        var _token = $(this).find("input[name='_token']").val();
        url = $(this).attr("action");
        var posting = $.post( url, {libros_id: libros_id, _token: _token} );
        posting.done(function( data ) {
          console.log(data);
          var content = $( data ).find( "#content" );
          $( "#result" ).empty().append( content );
        });

        // Animación que manda la imagen del libro al carrito
        if (key % 2 === 0) {
          var itemImg = $(this).parent().parent().find('img:even').eq(0);
        } else {
          var itemImg = $(this).parent().parent().find('img:odd').eq(0);
        }
        flyToElement($(itemImg), $('.cart__animation'));
      });
    });
  });

  function flyToElement(flyer, flyingTo) {
    var $func = $(this);
    var divider = 3;
    var flyerClone = $(flyer).clone();
    $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider);
    var gotoY = $(flyingTo).offset().top;

    $(flyerClone).animate({
        opacity: 0.4,
        left: gotoX,
        top: gotoY,
        width: $(flyer).width()/divider,
        height: $(flyer).height()/divider
      }, 700,
      function () {
        $(flyingTo).fadeOut('fast', function () {
          $(flyingTo).fadeIn('fast', function () {
            $(flyerClone).fadeOut('fast', function () {
              $(flyerClone).remove();
            });
          });
        });
      });
  }
</script>
@endsection
