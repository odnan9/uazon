<!-- Main navigation -->
<div class="row">
  <div class="col-md-1 offset-3">
    <div class="navigation__div--click">
      <a class="navigation__item " href="{{ route('libros') }}">Libros</a>
    </div>
  </div>
  <div class="col-md-1">
    <div class="navigation__div--click">
      <a class="navigation__item" href="{{ route('autores') }}">Autores</a>
    </div>
  </div>
  <div class="col-md-1">
    <div class="navigation__div--click">
      <a class="navigation__item" href="{{ route('lomasleido') }}">Lo más leído</a>
    </div>
  </div>
  <div class="col-md-1">
    <div class="navigation__div--click">
      <a class="navigation__item" href="{{ route('reviews') }}">Críticas</a>
    </div>
  </div>
  <div class="col-md-1">
    <div class="navigation__div--click">
      <a class="navigation__item" href="{{ route('contacto') }}">Contacto</a>
    </div>
  </div>
</div>

{{--<script>--}}
  {{--$(function () {--}}
    {{--$('.navigation__div--click').hover(--}}
      {{--function () {--}}
        {{--$(this).toggleClass('navigation__menuitem--background-color');--}}
        {{--$(this).find('.navigation__item').toggleClass('navigation__menuitem--background-color');--}}
      {{--},--}}
      {{--function () {--}}
        {{--$(this).toggleClass('navigation__menuitem--background-color');--}}
        {{--$(this).find('.navigation__item').toggleClass('navigation__menuitem--background-color');--}}
      {{--});--}}
    {{--$('.navigation__div--click').click(--}}
      {{--function () {--}}
        {{--location.href = $(this).find('.navigation__item').attr('href');--}}
      {{--}--}}
    {{--);--}}
  {{--});--}}
{{--</script>--}}