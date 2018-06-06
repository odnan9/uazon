<div class="col-md-1">
  <a>
    <i class='fa fa-chevron-left fa-5x novedades__carousel--customPrevBtn'></i>
  </a>
</div>
<div class="col-md-10 owl-carousel__index">
  <div id="carusel__novedades" class="carusel__novedades owl-carousel owl-theme">
    @foreach($novedades as $novedad)
      <div class="item novedades__item">
        <img class="novedades__img" src="assets/images/libros/{{$novedad['libros_id']}}/{{$novedad['libros_id']}}_x300.jpg">
        <div class="novedades__img--fade">
          <div class="overlay-content">
            <h3 class="top">{{$novedad['titulo']}}</h3>
            <form id="novedadesCartForm{{$novedad['libros_id']}}" action="{{url('cart')}}">
              <input type="hidden" name="libros_id" value="{{$novedad['libros_id']}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="lomas__btn">
                <i class="fa fa-shopping-cart" style="color: #990073"></i>
                <strong>
                  {{$novedad['precio']}} €
                </strong>
              </button>
            </form>
          </div>
        </div>
        <div class="novedades__titulo">
          <strong>{{$novedad['titulo']}}</strong>
        </div>
      </div>
    @endforeach
  </div>
</div>
<div class="col-md-1">
  <a>
    <i class='fa fa-chevron-right fa-5x novedades__carousel--customNextBtn'></i>
  </a>
</div>

<div id="result"></div>

<script>
  var owlNovedades = $('.carusel__novedades');

  owlNovedades.owlCarousel({
    loop:false,
    dots: false,
    margin:50,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:3
      },
      1000:{
        items:5
      }
    }
  });

  $('.novedades__carousel--customNextBtn').click(function() {
    owlNovedades.trigger('next.owl.carousel', [500]);
  });
  $('.novedades__carousel--customPrevBtn').click(function() {
    owlNovedades.trigger('prev.owl.carousel', [500]);
  });

  $(document).ready(function () {
    $('#carusel__novedades form').each(function() {
      $(this).submit(function (event) {
        event.preventDefault();
        var libros_id = $(this).find("input[name='libros_id']").val();
        var _token = $(this).find("input[name='_token']").val();
        url = $(this).attr("action");
        var posting = $.post( url, {libros_id: libros_id, _token: _token} );
        posting.done(function( data ) {
          console.log(data);
          var content = $( data ).find( "#content" );
          $( "#result" ).empty().append( content );
        });

        // Animación que manda la imagen del libro al carrito
        var itemImg = $(this).parent().parent().parent().find('img').eq(0);
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