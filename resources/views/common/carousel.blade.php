
<div class="col-md-12 carousel__slider--index">
  <div class="carousel__slider owl-carousel owl-theme">
    @for ($i = 1; $i < 4; $i++)
      <img class="carousel__img" src="assets/images/slider/slide{{ $i }}_500x.jpg">
    @endfor
  </div>
</div>


<script>
  var owlSlider = $('.carousel__slider');
  owlSlider.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    dots: true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
  });


  $('.lomas__carousel--customNextBtn').click(function() {
    owlLoMas.trigger('next.owl.carousel', [500]);
  });
  $('.lomas__carousel--customPrevBtn').click(function() {
    owlLoMas.trigger('prev.owl.carousel', [500]);
  });
</script>