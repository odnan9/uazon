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
            {{--<form method="POST" action="{{url('cart')}}">--}}
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
      });
    });
  });
</script>
