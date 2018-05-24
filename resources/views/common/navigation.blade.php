<!-- Main navigation -->
<div class="row">
  <div class="col-md-1 offset-3 navigation__div--click">
    <a class="navigation__item " href="{{ route('libros') }}">los libros</a>
  </div>
  <div class="col-md-1 navigation__div--click">
    <a class="navigation__item" href="{{ route('autores') }}">los autores</a>
  </div>
  <div class="col-md-1 navigation__div--click">
    <a class="navigation__item" href="{{ route('lomasleido') }}">lo más leído</a>
  </div>
  <div class="col-md-1 navigation__div--click">
    <a class="navigation__item" href="{{ route('reviews') }}">nuestras críticas</a>
  </div>
  <div class="col-md-1 navigation__div--click">
    <a class="navigation__item" href="{{ route('contacto') }}">contáctanos</a>
  </div>
  <div class="col-md-1 navigation__div--click">
    <a class="navigation__item" href="{{ route('contacto') }}">FAQ</a>
  </div>
</div>

<script>
  $(function () {
    $('.navigation__div--click').hover(
      function () {
        $(this).toggleClass('navigation__menuitem--background-color');
        $(this).find('.navigation__item').toggleClass('navigation__menuitem--background-color');
      },
      function () {
        $(this).toggleClass('navigation__menuitem--background-color');
        $(this).find('.navigation__item').toggleClass('navigation__menuitem--background-color');
      });
    $('.navigation__div--click').click(
      function () {
        location.href = $(this).find('.navigation__item').attr('href');
      }
    );
  });
</script>