<div class="col-md-1">
  <a>
    <i class='fa fa-chevron-left fa-5x lomas__carousel--customPrevBtn'></i>
  </a>
</div>
<div class="col-md-10 owl-carousel__index">
  <div id="carousel__lomas" class="carousel__lomas owl-carousel owl-theme">
    @foreach($lomaslibros as $lomaslibro)
      <div class="item lomas__item">
        <img class="lomas__img" src="assets/images/libros/{{$lomaslibro->libros_id}}/{{$lomaslibro->libros_id}}_x300.jpg">
        <div class="lomas__img--fade">
          <div class="overlay-content">
            <h3 class="top">{{$lomaslibro->titulo}}</h3>
            <form id="lomasCartForm{{$lomaslibro->libros_id}}" action="{{url('cart')}}">
              <input type="hidden" name="libros_id" value="{{$lomaslibro->libros_id}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button id='lomas__button{{$lomaslibro->libros_id}}' class="lomas__btn" type="submit">
                <i class="fa fa-shopping-cart" style="color: #990073"></i>
                  <strong>
                    {{$lomaslibro->precio}} €
                  </strong>
              </button>
            </form>
          </div>
        </div>
        <div class="lomas__titulo">
          <strong>{{$lomaslibro->titulo}}</strong>
        </div>
      </div>
    @endforeach
  </div>
</div>
<div class="col-md-1">
  <a>
    <i class='fa fa-chevron-right fa-5x lomas__carousel--customNextBtn'></i>
  </a>
</div>

<div id="result"></div>

<script>
  var owlLoMas = $('.carousel__lomas');

  owlLoMas.owlCarousel({
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

  $('.lomas__carousel--customNextBtn').click(function() {
    owlLoMas.trigger('next.owl.carousel', [500]);
  });
  $('.lomas__carousel--customPrevBtn').click(function() {
    owlLoMas.trigger('prev.owl.carousel', [500]);
  });

  $(document).ready(function () {
    $('#carousel__lomas form').each(function() {
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